<?php
/**
 * Theme Customizer Functions
 *
 * @package Pasal-ecommerce
 * @since Pasal Ecommerce 1.0
 */
/******************** Pasal Ecommerce SLIDER SETTINGS ******************************************/
$pasal_ecommerce_settings = pasal_ecommerce_get_theme_options();
  if (!in_array('layout-pro/layout-pro.php', apply_filters('active_plugins', get_option('active_plugins')))) {
$wp_customize->add_section( 'pasal_ecommerce_page_post_options', array(
	'title' => __('Slider Option','pasal-ecommerce'),
	'priority' => 1,
	'panel' =>'layout_pro_options_panel'
));
for ( $i=1; $i <= $pasal_ecommerce_settings['pasal_ecommerce_slider_no'] ; $i++ ) {
	$wp_customize->add_setting('pasal_ecommerce_theme_options[pasal_ecommerce_featured_page_slider_'. $i .']', array(
		'default' =>'',
		'sanitize_callback' =>'pasal_ecommerce_sanitize_page',
		'type' => 'option',
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( 'pasal_ecommerce_theme_options[pasal_ecommerce_featured_page_slider_'. $i .']', array(
		'priority' => 220 . $i,
		'label' => __(' Page Slider', 'pasal-ecommerce') . ' ' . $i ,
		'section' => 'pasal_ecommerce_page_post_options',
		'type' => 'dropdown-pages',
	));
}
}