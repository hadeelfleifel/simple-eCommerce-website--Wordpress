<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Pasal-ecommerce
 * @since Pasal Ecommerce 1.0
 */
/*********** Pasal Ecommerce ADD THEME SUPPORT FOR INFINITE SCROLL **************************/
if (! function_exists('pasal_ecommerce_jetpack_setup')) {
	function pasal_ecommerce_jetpack_setup() {
		add_theme_support( 'infinite-scroll', array(
			'container' => 'main',
			'footer'    => 'page',
		) );
	}
	add_action( 'after_setup_theme', 'pasal_ecommerce_jetpack_setup' );
}