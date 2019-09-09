<?php
/**
 * Theme Customizer Functions
 *
 * @package Pasal-ecommerce
 * @since Pasal Ecommerce 1.0
 */
$pasal_ecommerce_settings = pasal_ecommerce_get_theme_options();
/******************** Pasal Ecommerce LAYOUT OPTIONS ******************************************/

    $wp_customize->add_setting( 'pasal_ecommerce_theme_options[pasal_ecommerce_sidebar_status]', array(
        'default' => $pasal_ecommerce_settings['pasal_ecommerce_sidebar_status'],
        'sanitize_callback' => 'pasal_ecommerce_sanitize_select',
        'type' => 'option',
    ));
    $wp_customize->add_control( 'pasal_ecommerce_theme_options[pasal_ecommerce_sidebar_status]', array(
        'priority'=>45,
        'label' => __('Show / Hide Sidebar', 'pasal-ecommerce'),
        'section' => 'pasal_ecommerce_custom_header',
        'type'	=> 'select',
        'choices' => array(
            'show-sidebar' => __('Show Sidebar','pasal-ecommerce'),
            'hide-sidebar' => __('Hide Sidebar','pasal-ecommerce'),
        ),
    ));

	$wp_customize->add_setting( 'pasal_ecommerce_theme_options[pasal_ecommerce_entry_meta_blog]', array(
		'default' => $pasal_ecommerce_settings['pasal_ecommerce_entry_meta_blog'],
		'sanitize_callback' => 'pasal_ecommerce_sanitize_select',
		'type' => 'option',
	));
	$wp_customize->add_control( 'pasal_ecommerce_theme_options[pasal_ecommerce_entry_meta_blog]', array(
		'priority'=>45,
		'label' => __('Meta for blog page', 'pasal-ecommerce'),
		'section' => 'pasal_ecommerce_custom_header',
		'type'	=> 'select',
		'choices' => array(
		'show-meta' => __('Show Meta','pasal-ecommerce'),
		'hide-meta' => __('Hide Meta','pasal-ecommerce'),
	),
	));
	$wp_customize->add_setting('pasal_ecommerce_theme_options[pasal_ecommerce_design_layout]', array(
		'default'        => $pasal_ecommerce_settings['pasal_ecommerce_design_layout'],
		'sanitize_callback' => 'pasal_ecommerce_sanitize_select',
		'type'                  => 'option',
	));
	$wp_customize->add_control('pasal_ecommerce_theme_options[pasal_ecommerce_design_layout]', array(
	'priority'  =>50,
	'label'      => __('Design Layout', 'pasal-ecommerce'),
	'section'    => 'pasal_ecommerce_custom_header',
	'type'       => 'select',
	'checked'   => 'checked',
	'choices'    => array(
		'wide-layout' => __('Full Width Layout','pasal-ecommerce'),
		'boxed-layout' => __('Boxed Layout','pasal-ecommerce'),
	),
));
?>