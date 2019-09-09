<?php
$pasal_ecommerce_settings = pasal_ecommerce_get_theme_options();
/********************  Pasal Ecommerce THEME OPTIONS ******************************************/
//Support section
    $wp_customize->add_section( 'pasal_ecommerce_theme_support', array(
        'title' => __( 'Support','pasal-ecommerce' ),
        'priority' => 1, // Mixed with top-level-section hierarchy.
    ) );

    $wp_customize->add_setting('pasal_ecommerce_options[support_links]',
        array(
            'type' => 'option',
            'default' => '',
            'sanitize_callback' => 'esc_url',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control(new pasal_ecommerce_Support_Control($wp_customize,'support_links',array(
                'label' => 'Support',
                'section' => 'pasal_ecommerce_theme_support',
                'settings' => 'pasal_ecommerce_options[support_links]',
                'type' => 'pasal-ecommerce-support',
            )
        )
    );


if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    /*        Product Cat   */
    $product_categories = get_terms('product_cat');
    if (is_wp_error($product_categories))
        $product_categories = array();
    $count = count($product_categories);
    if ($count > 0 && !is_wp_error($product_categories)) {
        $select_categories = array();
        $select_categories[''] = __('Select', 'pasal-ecommerce');
        foreach ($product_categories as $product_category) {
            $select_categories[$product_category->term_id] = $product_category->name;
        }
    } else {
        $select_categories = array('' => __('Select', 'pasal-ecommerce'));
    }

    $wp_customize->add_section('pasal_ecommerce_product_categories', array(
        'title' => __('Product Categories', 'pasal-ecommerce'),
        'priority' => 11,
        'panel' => 'layout_pro_options_panel'
    ));
    $wp_customize->add_setting('pasal_ecommerce_theme_options[pasal_ecommerce_product_cat_title]', array(
        'capability' => 'edit_theme_options',
        'default' => $pasal_ecommerce_settings['pasal_ecommerce_product_cat_title'],
        'sanitize_callback' => 'esc_html',
        'type' => 'option',
    ));
    $wp_customize->add_control('pasal_ecommerce_theme_options[pasal_ecommerce_product_cat_title]', array(
        'label' => __('Section Title', 'pasal-ecommerce'),
        'priority' => 1,
        'section' => 'pasal_ecommerce_product_categories',
        'type' => 'text',
    ));

    $wp_customize->add_setting('pasal_ecommerce_theme_options[pasal_ecommerce_product_cat_lists]', array(
        'capability' => 'edit_theme_options',
        'default' => '',
        'sanitize_callback' => 'pasal_ecommerce_sanitize_checkbox',
        'type' => 'option',
    ));
    $wp_customize->add_control(
        new pasal_ecommerce_Customize_Control_Multiple_Select(
            $wp_customize,
            'pasal_ecommerce_theme_options[pasal_ecommerce_product_cat_lists]',
            array(
                'label' => __('Select Category', 'pasal-ecommerce'),
                'section' => 'pasal_ecommerce_product_categories',
                'type' => 'multiple-select',
                'choices' => $select_categories,
            )
        ));

}


	$wp_customize->add_section('pasal_ecommerce_custom_header', array(
		'title' => __('General Options', 'pasal-ecommerce'),
		'priority' => 1,
		'panel' => 'layout_pro_options_panel'
	));
	$wp_customize->add_setting( 'pasal_ecommerce_theme_options[pasal_ecommerce_reset_all]', array(
		'default' => 0,
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'pasal_ecommerce_reset_alls',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( 'pasal_ecommerce_theme_options[pasal_ecommerce_reset_all]', array(
		'priority'=>50,
		'label' => __('Reset all default settings. (Refresh it to view the effect)', 'pasal-ecommerce'),
		'section' => 'pasal_ecommerce_custom_header',
		'type' => 'checkbox',
	));

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    $wp_customize->add_section('pasal_ecommerce_feature_section', array(
        'title' => __('Featured Section', 'pasal-ecommerce'),
        'priority' => 6,
        'panel' => 'layout_pro_options_panel'
    ));

    $wp_customize->add_setting('pasal_ecommerce_theme_options[pasal_ecommerce_product_recent_feat_title]',
        array(
            'type' => 'option',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => $pasal_ecommerce_settings['pasal_ecommerce_product_recent_feat_title'],
        )
    );
    $wp_customize->add_control('pasal_ecommerce_theme_options[pasal_ecommerce_product_recent_feat_title]',
        array(
            'type' => 'text',
            'section' => 'pasal_ecommerce_feature_section',
            'label' => esc_html__('Section Title', 'pasal-ecommerce'),
            'settings' => 'pasal_ecommerce_theme_options[pasal_ecommerce_product_recent_feat_title]'
        )
    );
    $wp_customize->add_setting('pasal_ecommerce_theme_options[pasal_ecommerce_product_recent_feat_shortcode]',
        array(
            'type' => 'option',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => $pasal_ecommerce_settings['pasal_ecommerce_product_recent_feat_shortcode'],
        )
    );
    $wp_customize->add_control('pasal_ecommerce_theme_options[pasal_ecommerce_product_recent_feat_shortcode]',
        array(
            'type' => 'text',
            'section' => 'pasal_ecommerce_feature_section',
            'label' => esc_html__('WooCommerce Product Shortcode', 'pasal-ecommerce'),
            'settings' => 'pasal_ecommerce_theme_options[pasal_ecommerce_product_recent_feat_shortcode]'
        )
    );
}
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    $wp_customize->add_section('pasal_ecommerce_recent_section', array(
        'title' => __('Recent Section', 'pasal-ecommerce'),
        'priority' => 4,
        'panel' => 'layout_pro_options_panel'
    ));

    $wp_customize->add_setting('pasal_ecommerce_theme_options[pasal_ecommerce_product_recent_prod_title]',
        array(
            'type' => 'option',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => $pasal_ecommerce_settings['pasal_ecommerce_product_recent_prod_title'],
        )
    );
    $wp_customize->add_control('pasal_ecommerce_theme_options[pasal_ecommerce_product_recent_prod_title]',
        array(
            'type' => 'text',
            'section' => 'pasal_ecommerce_recent_section',
            'label' => esc_html__('Section Title', 'pasal-ecommerce'),
            'settings' => 'pasal_ecommerce_theme_options[pasal_ecommerce_product_recent_prod_title]'
        )
    );
    $wp_customize->add_setting('pasal_ecommerce_theme_options[pasal_ecommerce_product_recent_prod_shortcode]',
        array(
            'type' => 'option',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => $pasal_ecommerce_settings['pasal_ecommerce_product_recent_prod_shortcode'],
        )
    );
    $wp_customize->add_control('pasal_ecommerce_theme_options[pasal_ecommerce_product_recent_prod_shortcode]',
        array(
            'type' => 'text',
            'section' => 'pasal_ecommerce_recent_section',
            'label' => esc_html__('WooCommerce Product Shortcode', 'pasal-ecommerce'),
            'settings' => 'pasal_ecommerce_theme_options[pasal_ecommerce_product_recent_prod_shortcode]'
        )
    );
}

    $wp_customize->add_section('pasal_ecommerce_cta_section', array(
        'title' => __('CTA Section', 'pasal-ecommerce'),
        'priority' => 5,
        'panel' => 'layout_pro_options_panel'
    ));
    $wp_customize->add_setting('pasal_ecommerce_theme_options[cta_title]', array(
        'capability' => 'edit_theme_options',
        'default' => $pasal_ecommerce_settings['cta_title'],
        'sanitize_callback' => 'esc_html',
        'type' => 'option',
    ));
    $wp_customize->add_control('pasal_ecommerce_theme_options[cta_title]', array(
        'label' => __('Section Title', 'pasal-ecommerce'),
        'priority' => 1,
        'section' => 'pasal_ecommerce_cta_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('pasal_ecommerce_theme_options[cta_description]', array(
        'capability' => 'edit_theme_options',
        'default' => $pasal_ecommerce_settings['cta_description'],
        'sanitize_callback' => 'esc_html',
        'type' => 'option',
    ));
    $wp_customize->add_control('pasal_ecommerce_theme_options[cta_description]', array(
        'label' => __('Section Description', 'pasal-ecommerce'),
        'priority' => 1,
        'section' => 'pasal_ecommerce_cta_section',
        'type' => 'textarea',
    ));
    $wp_customize->add_setting('pasal_ecommerce_theme_options[cta_button]', array(
        'capability' => 'edit_theme_options',
        'default' => $pasal_ecommerce_settings['cta_button'],
        'sanitize_callback' => 'esc_html',
        'type' => 'option',
    ));
    $wp_customize->add_control('pasal_ecommerce_theme_options[cta_button]', array(
        'label' => __('Button Title', 'pasal-ecommerce'),
        'priority' => 1,
        'section' => 'pasal_ecommerce_cta_section',
        'type' => 'text',
    ));
    $wp_customize->add_setting('pasal_ecommerce_theme_options[cta_link]', array(
        'capability' => 'edit_theme_options',
        'default' => $pasal_ecommerce_settings['cta_button'],
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'option',
    ));
    $wp_customize->add_control('pasal_ecommerce_theme_options[cta_link]', array(
        'label' => __('Button Link', 'pasal-ecommerce'),
        'priority' => 1,
        'section' => 'pasal_ecommerce_cta_section',
        'type' => 'text',
    ));

$wp_customize->add_setting('pasal_ecommerce_theme_options[cta_Backgroundimage]',
    array(
        'type' => 'option',
        'default' => $pasal_ecommerce_settings['cta_Backgroundimage'],
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,'pasal_ecommerce_theme_options[cta_Backgroundimage]',
        array(

            'section' => 'pasal_ecommerce_cta_section',
            'label' => esc_html__('Upload Background Image', 'pasal-ecommerce'),
            'settings' => 'pasal_ecommerce_theme_options[cta_Backgroundimage]'
        ) )
);


	/*Blog Section*/

    $wp_customize->add_section('pasal_ecommerce_blogoption', array(
            'title' => __('Blog Options', 'pasal-ecommerce'),
            'priority' => 7,
            'panel' => 'layout_pro_options_panel'
        ));

        $wp_customize->add_setting('pasal_ecommerce_theme_options[blog_description]',
        array(
            'type' => 'option',
            'sanitize_callback' => 'pasal_ecommerce_sanitize_page',
            'default' => $pasal_ecommerce_settings['blog_description'],
        )
    );
    $wp_customize->add_control('pasal_ecommerce_theme_options[blog_description]',
        array(
            'type' => 'dropdown-pages',
            'section' => 'pasal_ecommerce_blogoption',
            'label' => esc_html__('Select Page For Blog Title & Description', 'pasal-ecommerce'),
            'settings' => 'pasal_ecommerce_theme_options[blog_description]'
        )
    );