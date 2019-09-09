<?php
/**
 * WooCommerce General Settings
 *
 * @author      WooThemes
 * @category    Admin
 * @package     WooCommerce/Admin
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'WC_Custom_Currencies_Settings' ) ) :

/**
 * WC_Admin_Settings_General
 */
class WC_Custom_Currencies_Settings extends WC_Settings_Page {

	/**
	 * For PayPal
	 */
	public $supported_currencies;

	/**
	 * PayPal currencies but for use in select boxes
	 */
	public $currencies_options;

	/**
	 * The custom currencies that the user has entered in our page
	 */
	public $saved_currencies;

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->id    = 'currency';
		$this->label = __( 'Currency', 'woocommerce_custom_currency' );

		$this->supported_currencies = apply_filters( 'woocommerce_paypal_supported_currencies', array( 'AUD', 'BRL', 'CAD', 'MXN', 'NZD', 'HKD', 'SGD', 'USD', 'EUR', 'JPY', 'TRY', 'NOK', 'CZK', 'DKK', 'HUF', 'ILS', 'MYR', 'PHP', 'PLN', 'SEK', 'CHF', 'TWD', 'THB', 'GBP', 'RMB' ) );

		foreach( $this->supported_currencies as $c ) {
			$this->currencies_options[ $c ] = $c;
		}

		$this->saved_currencies = WooCommerceCustomCurrencies::get_custom_currencies();
		

		add_filter( 'woocommerce_settings_tabs_array', array( $this, 'add_settings_page' ), 20 );
		add_action( 'woocommerce_settings_' . $this->id, array( $this, 'output' ) );
		add_action( 'woocommerce_settings_save_' . $this->id, array( $this, 'save' ) );

		// Settings page tabs
		add_action( 'woocommerce_sections_' . $this->id, array( $this, 'output_sections' ) );

		// Custom currencies field
		add_action( 'woocommerce_admin_field_extra_currencies', array( $this, 'generate_extra_currencies_html' ) );
		// Save custom currencies field
		add_action( 'woocommerce_update_option_extra_currencies', array( $this, 'save_extra_currencies' ) );

	}

	/**
	 * Get sections
	 *
	 * @return array
	 */
	public function get_sections() {

		$sections = array(
			''          => __( 'PayPal Options', 'woocommerce_custom_currency' ),
			'override_currencies' => __( 'Override Currencies', 'woocommerce_custom_currency' ),
			'extra_currencies' => __( 'Extra Currencies', 'woocommerce_custom_currency' )
		);

		return apply_filters( 'woocommerce_get_sections_' . $this->id, $sections );
	}

	/**
	 * Output the settings
	 */
	public function output() {
		global $current_section;

		$settings = $this->get_settings( $current_section );

 		WC_Admin_Settings::output_fields( $settings );
	}

	/**
	 * Save settings
	 */
	public function save() {
		global $current_section;

		$settings = $this->get_settings( $current_section );
		WC_Admin_Settings::save_fields( $settings );
	}

	/**
	 * Get settings array
	 *
	 * @return array
	 */
	public function get_settings( $current_section = '' ) {
		
		if( empty( $current_section ) )
			$current_section = 'default';

		$settings = call_user_func( array( $this, $current_section . '_settings' ) );

		return $settings;

	}

	function default_settings() {
		$currency_code_options = get_woocommerce_currencies();

		foreach ( $currency_code_options as $code => $name ) {
			$currency_code_options[ $code ] = $name . ' (' . get_woocommerce_currency_symbol( $code ) . ')';
		}

		$settings = apply_filters( 'woocommerce_custom_currencies_default_settings', array(

			array( 'title' => __( 'PayPal Settings', 'woocommerce_custom_currency' ), 'type' => 'title', 'desc' => 'Control PayPal conversions.', 'id' => 'custom_currency_options' ),

			array(
				'title'    => __( 'Enable PayPal conversions', 'woocommerce_custom_currency' ),
				'desc'     => __( 'Enable conversions to PayPal.', 'woocommerce_custom_currency' ),
				'id'       => 'woocommerce_custom_currency_enable_paypal',
				'default'  => 'yes',
				'type'     => 'checkbox',
				'desc_tip' =>  true,
			),

			array(
				'title'    => __( 'Conversion Currency', 'woocommerce_custom_currency' ),
				'desc'     => __( 'The currency to convert so that PayPal accepts payment.', 'woocommerce_custom_currency' ),
				'id'       => 'woocommerce_custom_currency_paypal_currency',
				'default'  => 'USD',
				'type'     => 'select',
				'options'  => $this->currencies_options,
				'desc_tip' =>  true,
			),

			array(
				'title'    => __( 'Conversion rate', 'woocommerce_custom_currency' ),
				'desc'     => __( 'The conversion rate to use while converting the prices to PayPal.', 'woocommerce_custom_currency' ),
				'id'       => 'woocommerce_custom_currency_rate',
				'css'      => 'min-width:150px;',
				'default'  => '1.0',
				'type'     => 'text',
				'desc_tip' =>  true,
			),

			array( 'type' => 'sectionend', 'id' => 'custom_currency_options'),

		) );

		return apply_filters( 'woocommerce_get_settings_' . $this->id, $settings, 'default' );
	}

	function override_currencies_settings() {

		$custom_currency = get_option( 'woocommerce_custom_currency_code', '' );

		$existing_currencies = get_woocommerce_currencies();

		$settings = apply_filters( 'woocommerce_custom_currencies_override_settings', array(

			array( 'title' => __( 'Override Currencies', 'woocommerce_custom_currency' ), 'type' => 'title', 'desc' => 'Control the symbols of the existing currencies from this page.', 'id' => 'custom_currency_options' ),

		) );

		foreach( $existing_currencies as $currency_code => $currency_label ) {

			// Do not consider our custom currency
			if( $currency_code == $custom_currency )
				continue;

			$settings[] = array(
				'title'    => $currency_label . ' ( ' . $currency_code . ' ) ' . __( ' symbol', 'woocommerce_custom_currency' ),
				'desc'     => __( 'Leave empty to use ', 'woocommerce_custom_currency' ) . get_woocommerce_currency_symbol( $currency_code ),
				'id'       => 'woocommerce_custom_currency_override_' . $currency_code,
				'css'      => 'min-width:150px;',
				'default'  => '',
				'type'     => 'text',
				'desc_tip' =>  true,
			);

		}

		$settings[] = array( 'type' => 'sectionend', 'id' => 'custom_currency_options');

		return apply_filters( 'woocommerce_get_settings_' . $this->id, $settings, 'override' );

	}

	function extra_currencies_settings() {

		$settings = apply_filters( 'woocommerce_custom_currencies_extra_settings', array(

			array( 'title' => __( 'Extra Currencies', 'woocommerce_custom_currency' ), 'type' => 'title', 'desc' => 'Using the following table you can easily add as much currencies as you want.', 'id' => 'custom_currency_options' ),

		) );

		$settings[] = array(
			'title' => 'Unlimited Currencies',
			'type'  => 'extra_currencies',
			'id'    => 'extra_currencies'
		);

		$settings[] = array( 'type' => 'sectionend', 'id' => 'custom_currency_options');

		return apply_filters( 'woocommerce_get_settings_' . $this->id, $settings, 'extra_currencies' );

	}

	public function generate_extra_currencies_html( $value ) {
		
		ob_start();
		?>
		
		<tr valign="top">
			<th scope="row" class="titledesc">
				<label>Custom Currencies</label>
				<p class="description">
					This functionality is considered a beta version.
				</p>
			</th>
			<td class="forminp">
				<div style="margin-bottom:10px;">
					<button type="button" class="button primary add_currency">Add a currency</button>
				</div>
				<table class="wc_currencies widefat" cellspacing="0">
					<thead>
						<tr>
							<th class="name">Currency Label</th>
							<th class="id">Currency Symbol</th>
							<th class="status">Currency Code</th>
							<th></th>
						</tr>
					</thead>
					<tbody class="wc_currencies">
						<?php 
							for( $i = 0; $i < count( $this->saved_currencies->labels ); $i++ ):

								$currency = array();
								$currency[ 'label' ] = $this->saved_currencies->labels[ $i ];
								$currency[ 'code' ] = $this->saved_currencies->codes[ $i ];
								$currency[ 'symbol' ] = $this->saved_currencies->symbols[ $i ];

								WooCommerceCustomCurrencies::template( 'currency_row', $currency, false );

							endfor;
						?>
					</tbody>
					<tfoot>
						<tr>
							<th class="name">Currency Label</th>
							<th class="id">Currency Symbol</th>
							<th class="status">Currency Code</th>
							<th></th>
						</tr>
					</tfoot>
				</table>
			</td>
		</tr>

		<?php

		echo ob_get_clean();
	}

	function save_extra_currencies( $value ) {

		$fields = array(
			'labels',
			'symbols',
			'codes'
		);

		$error = false;


		foreach( $fields as $f ) {
			
			if( !empty( $_POST[ $f ] ) && !is_array( $_POST[ $f ] ) ) {
				WC_Admin_Settings::add_error( "Couldn't save. Please try again" );
				$error = true;
				continue;
			}

		}

		if( $error )
			return;

		foreach( $fields as $f ) {

			if( empty( $_POST[ $f ] ) )
				$_POST[ $f ] = array();

			$this->saved_currencies->{$f} = $_POST[ $f ];

			update_option( '_wc_custom_currencies_' . $f, $_POST[ $f ] );
		}



	}



}

endif;

return new WC_Custom_Currencies_Settings();
