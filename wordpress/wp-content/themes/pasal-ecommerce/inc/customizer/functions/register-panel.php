<?php
/**
 * Theme Customizer Functions
 *
 * @package Pasal-ecommerce
 * @since Pasal Ecommerce 1.0
 */
/******************** Pasal Ecommerce CUSTOMIZE REGISTER *********************************************/
add_action( 'customize_register', 'pasal_ecommerce_customize_register_options', 20 );
function pasal_ecommerce_customize_register_options( $wp_customize ) {
	$wp_customize->add_panel( 'layout_pro_options_panel', array(
		'priority' => 2,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options', 'pasal-ecommerce' ),
		'description' => '',
	) );
}
add_action( 'customize_register', 'pasal_ecommerce_customize_register_featuredcontent' );
function pasal_ecommerce_customize_register_featuredcontent( $wp_customize ) {
	$wp_customize->add_panel( 'pasal_ecommerce_featuredcontent_panel', array(
		'priority' => 31,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Slider Options', 'pasal-ecommerce' ),
		'description' => '',
	) );
}

add_action( 'customize_register', 'pasal_ecommerce_customize_register_widgets' );
function pasal_ecommerce_customize_register_widgets( $wp_customize ) {
	$wp_customize->add_panel( 'widgets', array(
		'priority' => 33,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Widgets', 'pasal-ecommerce' ),
		'description' => '',
	) );
}

?>