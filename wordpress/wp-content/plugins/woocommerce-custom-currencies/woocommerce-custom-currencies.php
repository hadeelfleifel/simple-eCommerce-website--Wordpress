<?php

/*
Plugin Name: WooCommerce Custom Currencies
Description: Adds your custom currency to woocommerce
Plugin URI: http://www.galalaly.me
Author: Galal Aly
Author URI: http://www.galalaly.me
Version: 2.1
License: GPL2
*/

/*

    Copyright (C) 2014  Galal Aly  contact@galalaly.me

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if( !defined( 'ABSPATH' ) ) exit;

class WooCommerceCustomCurrencies
{

	public $dir;
	public $url;

	function __construct() {

		$this->dir = plugin_dir_path( __FILE__ );
		$this->url = plugin_dir_url( __FILE__ );
		
		// Settings Page
		add_filter( 'woocommerce_get_settings_pages', array( $this, 'settings_page' ) );

		// Conversions
		add_filter( 'woocommerce_paypal_args', array( $this, 'apply_conversion' ) );

		// Add the custom currency to list of WC currencies
		add_filter( 'woocommerce_currencies', array( $this, 'add_currency_to_wc' ) );

		// Allow PayPal Gateway with the custom currency
		add_filter( 'woocommerce_paypal_supported_currencies', array( $this, 'add_currency_to_paypal' ) );

		// When the request is back, hook before the gateway to undo the conversions
		add_filter( 'woocommerce_get_order_currency', array( $this, 'undo_currency_for_gateway' ), 1, 2 );
		add_filter( 'woocommerce_order_amount_total', array( $this, 'undo_gross_for_gateway' ), 1, 2 );

		// WooCommerce symbol
		add_filter( 'woocommerce_currency_symbol', array( $this, 'currency_symbol' ), 10, 2 );

		// Scripts
		add_action( 'init', array( $this, 'enqueue' ) );

	}

	function enqueue() {

		if( isset( $_GET[ 'page' ] ) && isset( $_GET[ 'tab' ] ) && isset( $_GET[ 'section' ] ) && $_GET[ 'section' ] == 'extra_currencies' ) {
			wp_enqueue_style( 'woocommerce-custom-currencies', $this->url . 'assets/woocommerce-custom-currencies.css' );
			wp_enqueue_script( 'woocommerce-custom-currencies', $this->url . 'assets/woocommerce-custom-currencies.js', array( 'jquery' ) );

			$currency_row = WooCommerceCustomCurrencies::template( 'currency_row', null, true );

			wp_localize_script( 'woocommerce-custom-currencies', 'wc_custom_currencies', array(
				'currency_row' => $currency_row
			) );
		}

	}

	function settings_page( $settings ) {
		$settings[] = include( $this->dir . 'settings/class-wc-custom-currencies.php' );

		return $settings;
	}

	function apply_conversion( $paypal_args ) {

		$custom_currencies = get_option( '_wc_custom_currencies_codes', array() );

		if( ! in_array( get_woocommerce_currency(), $custom_currencies ) )
			return;

		$paypal_currency = get_option( 'woocommerce_custom_currency_paypal_currency', 'USD' );

		// Change currency to be sent to PayPal to the custom currency
		$paypal_args[ 'currency_code' ] = $paypal_currency;

		$conversion_rate = get_option( 'woocommerce_custom_currency_rate', 1.0 );

		foreach( $paypal_args as $key => $value ) {
			
			if( strpos( $key, 'amount_' ) !== false ) {
				$paypal_args[ $key ] = $value * floatval( $conversion_rate ); // convert
			}

		}

		return $paypal_args;
	}

	function add_currency_to_wc( $wc_currencies ) {

		// We need to get the array of custom currencies and add it here to woocommerce
		$custom_currencies_data = self::get_custom_currencies();

		if( empty( $custom_currencies_data->labels ) )
			return;

		for( $i = 0; $i < count( $custom_currencies_data->labels ); $i++ ) {
			$label = empty( $custom_currencies_data->labels[ $i ] ) ? $custom_currencies_data->codes[ $i ] : $custom_currencies_data->labels[ $i ];
			$wc_currencies[ $custom_currencies_data->codes[ $i ] ] = $label;
		}

		return $wc_currencies;

	}

	function add_currency_to_paypal( $paypal_currencies ) {

		// Add all currencies to PayPal
		$custom_currencies = get_option( '_wc_custom_currencies_codes', array() );

		if( !empty( $custom_currencies ) ) {
			$paypal_currencies = array_merge( $paypal_currencies, $custom_currencies );
		}

		return $paypal_currencies;

	}

	function undo_currency_for_gateway( $currency, $order_obj ) {
		
		$paypal_currency = get_option( 'woocommerce_custom_currency_paypal_currency', 'USD' );

		$custom_currencies = get_option( '_wc_custom_currencies_codes', array() );

		// If the currency is not a custom currency, don't touch
		if( ! in_array( $currency, $custom_currencies ) )
			return $currency;

		// If the mc_currency is empty, don't touch
		if( empty( $_POST[ 'mc_currency' ] ) )
			return $currency;

		// Undo currency for the gateway to validate
		return $paypal_currency;

	}

	function undo_gross_for_gateway( $total, $order_obj ) {

		$paypal_currency = get_option( 'woocommerce_custom_currency_paypal_currency', 'USD' );

		$custom_currencies = get_option( '_wc_custom_currencies_codes', array() );

		$currency = get_woocommerce_currency();

		if( $order_obj->get_order_currency() != $paypal_currency )
			return $total;

		if( ! in_array( $currency, $custom_currencies ) )
			return $currency;

		if( empty( $_POST[ 'mc_gross' ] ) )
			return $total;

		// Revert prices back
		$conversion_rate = get_option( 'woocommerce_custom_currency_rate', 1.0 );
		$total = $total * floatval( $conversion_rate );

		return $total;

	}

	function currency_symbol( $currency_symbol, $currency ) {

		$custom_currencies = get_option( '_wc_custom_currencies_codes', array() );
		
		// If the currency is NOT a custom currency
		if( ! in_array( $currency, $custom_currencies ) ) {
			// check for override
			$custom_symbol = get_option( 'woocommerce_custom_currency_override_' . $currency, false );
			// if no override do not alter the symbol
			if( empty( $custom_symbol ) )
				return $currency_symbol;

			// if we reach here then the currency's symbol was overriden
			return $custom_symbol;

		}

		// Get the custom currency's index, and return appropriate symbol
		$index = array_search( $currency, $custom_currencies );

		$custom_currencies_symbols = get_option( '_wc_custom_currencies_symbols' );

		// Caution
		if( empty( $custom_currencies_symbols ) || empty( $custom_currencies_symbols[ $index ] ) )
			return $currency_symbol;

		return $custom_currencies_symbols[ $index ];

	}

	public static function template( $name, $args, $return = false ) {

		$file = dirname( __FILE__ ) . '/templates/' . $name . '.php';

		if( !file_exists( $file ) )
			return 'N/A';
		
		if( $return ) {
			
			ob_start();
			include( $file );
			return ob_get_clean();

		} else {
			include( $file );
		}


	}

	public static function get_custom_currencies() {
		
		$obj = new stdClass;
		
		$obj->labels = get_option( '_wc_custom_currencies_labels', array() );
		$obj->codes = get_option( '_wc_custom_currencies_codes', array() );
		$obj->symbols = get_option( '_wc_custom_currencies_symbols', array() );

		return $obj;

	}

	public static function currency_data( $var, $data ) {

		return empty( $data[ $var ] ) ? '' : $data[ $var ];

	}

}

new WooCommerceCustomCurrencies;

?>