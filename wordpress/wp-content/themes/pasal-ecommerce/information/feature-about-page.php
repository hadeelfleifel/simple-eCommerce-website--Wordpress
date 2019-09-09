<?php
/**
 * Lite Manager
 *
 * @package Pasal-ecommerce
 * @since 1.0.12
 */


/**
 * About page class
 */
require_once get_template_directory() . '/information/pasal/class-pasal-ecommerce-about-page.php';

/*
* About page instance
*/
$config = array(
	// Menu name under Appearance.
	'menu_name'           => apply_filters( 'pasal_ecommerce_about_page_filter', __( 'About Pasal Ecommerce', 'pasal-ecommerce' ), 'menu_name' ),
	// Page title.
	'page_name'           => apply_filters( 'pasal_ecommerce_about_page_filter', __( 'About Pasal Ecommerce', 'pasal-ecommerce' ), 'page_name' ),
	// Main welcome title
	/* translators: s - theme name */
	'welcome_title'       => apply_filters( 'pasal_ecommerce_about_page_filter', sprintf( __( 'Welcome to %s! - Version ', 'pasal-ecommerce' ), 'Pasal Ecommerce' ), 'welcome_title' ),
	// Main welcome content
	'welcome_content'     => apply_filters( 'pasal_ecommerce_about_page_filter', esc_html__( 'Pasal eCommerce is free eCommerce WordPress theme suitable for launching any kind of online and digital store. Integrated with the most loved WooCommerce Plugin, no matter in which corner of the world you are, the plugin empowers you to sell things online and attract customers very efficiently. Even though the Pasal eCommerce is theme free WooCommerce WordPress theme, the theme has premium like features that caters all the eCommerce need to create a unique looking and a professional eCommerce website in a matter of minutes. The theme has Right Sidebar, Footer Widgets, Custom WIdgets, 4 Sliders and much more.', 'pasal-ecommerce' ), 'welcome_content' ),
	/**
	 * Tabs array.
	 *
	 * The key needs to be ONLY consisted from letters and underscores. If we want to define outside the class a function to render the tab,
	 * the will be the name of the function which will be used to render the tab content.
	 */
	'tabs'                => array(
		'getting_started'     => __( 'Getting Started', 'pasal-ecommerce' ),
		'recommended_actions' => __( 'Required Actions', 'pasal-ecommerce' ),
		'demo_import'         => __( 'Demo Import', 'pasal-ecommerce' ),
		'recommended_plugins' => __( 'Useful Plugins', 'pasal-ecommerce' ),
		'support'             => __( 'Support', 'pasal-ecommerce' ),
		'changelog'           => __( 'Request Customization Support', 'pasal-ecommerce' ),
		
	),
	// Support content tab.
	'support_content'     => array(
		'first'  => array(
			'title'        => esc_html__( 'Contact Support', 'pasal-ecommerce' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'We want to make sure you have the best experience using Pasal Ecommerce, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Pasal Ecommerce as much as we enjoy creating great products.', 'pasal-ecommerce' ),
			'button_label' => esc_html__( 'Contact Support', 'pasal-ecommerce' ),
			'button_link'  => esc_url( 'https://codethemes.co/support/' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Documentation', 'pasal-ecommerce' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Need more details? Please check our full documentation for detailed information on how to use Pasal Ecommerce.', 'pasal-ecommerce' ),
			'button_label' => esc_html__( 'Read full documentation', 'pasal-ecommerce' ),
			'button_link'  => esc_url('https://docs.codethemes.co/docs/pasal-ecommerce/'),
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'third'  => array(
			'title'        => esc_html__( 'Request Customization Support', 'pasal-ecommerce' ),
			'icon'         => 'dashicons dashicons-portfolio',
			'text'         => esc_html__( 'Want to get the gist on the latest theme changes? Just consult our changelog below to get a taste of the recent fixes and features implemented.', 'pasal-ecommerce' ),
			'button_label' => esc_html__( 'Request Customization Support', 'pasal-ecommerce' ),
			'button_link'  => esc_url( 'https://codethemes.co/support/#customization_support' ),
			'is_button'    => false,
			'is_new_tab'   => false,
		),
	),
	// for demo import
	'demo_import'     => array(
        'freedemo'  => array(
            'image_link' => 'https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pro_demo1/pasal-demo1.jpg',
            'theme_lebel' => 'Electronic Store',
            'demo_link' => 'https://demo.codethemes.co/pasal-ecommerce1/',
            'demo_label' => 'Preview',
            'button_label' => 'Buy Now',
            'button_link'  => 'https://codethemes.co/product/pasal-ecommerce/?add-to-cart=11198',

        ),
         'freedemo2'  => array(
            'image_link' => 'https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pro_demo2/pasal-demo2.jpg',
            'theme_lebel' => 'Clothing Store',
            'demo_link' => 'https://demo.codethemes.co/pasal-ecommerce2/',
            'demo_label' => 'Preview',
            'button_label' => 'Buy Now',
            'button_link'  => 'https://codethemes.co/product/pasal-ecommerce/?add-to-cart=11198',
        ),

         'freedemo3'  => array(
            'image_link' => 'https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pro_demo3/pasal-demo3.jpg',
            'theme_lebel' => 'Food Store',
            'demo_link' => 'https://demo.codethemes.co/pasal-ecommerce3/',
            'demo_label' => 'Preview',
            'button_label' => 'Buy Now',
            'button_link'  => 'https://codethemes.co/product/pasal-ecommerce/?add-to-cart=11198',

        ),
         'freedemo4'  => array(
            'image_link' => 'https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pro_demo4/pasal-demo4.jpg',
            'theme_lebel' => 'Furniture Store',
            'demo_link' => 'https://demo.codethemes.co/pasal-ecommerce4/',
            'demo_label' => 'Preview',
            'button_label' => 'Buy Now',
            'button_link'  => 'https://codethemes.co/product/pasal-ecommerce/?add-to-cart=11198',

        ),
    ),
	// Getting started tab
	'getting_started'     => array(
		'first'  => array(
			'title'               => esc_html__( 'Required actions', 'pasal-ecommerce' ),
			'text'                => esc_html__( 'We have compiled a list of steps for you to take so we can ensure that the experience you have using one of our products is very easy to follow.', 'pasal-ecommerce' ),
			'button_label'        => esc_html__( 'Required actions', 'pasal-ecommerce' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=pasal-ecommerce-welcome&tab=recommended_actions' ) ),
			'is_button'           => false,
			'recommended_actions' => true,
			'is_new_tab'          => false,
		),
		'second' => array(
			'title'               => esc_html__( 'Read full documentation', 'pasal-ecommerce' ),
			'text'                => esc_html__( 'Need more details? Please check our full documentation for detailed information on how to use Pasal Ecommerce.', 'pasal-ecommerce' ),
			'button_label'        => esc_html__( 'Documentation', 'pasal-ecommerce' ),
			'button_link'         => esc_url('https://docs.codethemes.co/docs/pasal-ecommerce/'),
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		'third'  => array(
			'title'               => esc_html__( 'Go to the Customizer', 'pasal-ecommerce' ),
			'text'                => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'pasal-ecommerce' ),
			'button_label'        => esc_html__( 'Go to the Customizer', 'pasal-ecommerce' ),
			'button_link'         => esc_url( admin_url( 'customize.php' ) ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
	),
	// Free vs PRO array.
	
	// Plugins array.
	'recommended_plugins' => array(
		'already_activated_message' => esc_html__( 'Already activated', 'pasal-ecommerce' ),
		'version_label'             => esc_html__( 'Version: ', 'pasal-ecommerce' ),
		'install_label'             => esc_html__( 'Install and Activate', 'pasal-ecommerce' ),
		'activate_label'            => esc_html__( 'Activate', 'pasal-ecommerce' ),
		'deactivate_label'          => esc_html__( 'Deactivate', 'pasal-ecommerce' ),
		'content'                   => array(

			array(
				'slug' => 'loco-translate',
			),
           
            array(
                'slug' => 'jetpack',
            ),
            array(
                'slug' => 'wordpress-seo',
            ),
		),
	),
	// Required actions array.
	'recommended_actions' => array(
		'install_label'    => esc_html__( 'Install and Activate', 'pasal-ecommerce' ),
		'activate_label'   => esc_html__( 'Activate', 'pasal-ecommerce' ),
		'deactivate_label' => esc_html__( 'Deactivate', 'pasal-ecommerce' ),
		'content'          => array(

            'one-click-demo-import'           => array(
                'title'       => 'One Click Demo Import',
                'description' => pasal_ecommerce_get_wporg_plugin_description( 'one-click-demo-import' ),
                'check'       => ( defined( 'OCDM_VERSION' ) || ! pasal_ecommerce_check_passed_time( '259200' ) ),
                'plugin_slug' => 'one-click-demo-import',
                'id'          => 'one-click-demo-import',
                'network'     => 'live',
            ),
            'contact-form-7'           => array(
                'title'       => 'Contact Form 7',
                'description' => pasal_ecommerce_get_wporg_plugin_description( 'contact-form-7' ),
                'check'       => ( defined( 'CONTACT_VERSION' ) || ! pasal_ecommerce_check_passed_time( '259200' ) ),
                'plugin_slug' => 'contact-form-7',
                'id'          => 'contact-form-7',
                'network'     => 'live',
            ),

			'elementor'           => array(
				'title'       => 'Elementor',
				'description' => pasal_ecommerce_get_wporg_plugin_description( 'elementor' ),
				'check'       => ( defined( 'ELEMENTOR_LITE_VERSION' ) || ! pasal_ecommerce_check_passed_time( '259200' ) ),
				'plugin_slug' => 'elementor',
				'id'          => 'elementor',
                'network'     => 'live',
            ),
            'woocommerce'           => array(
				'title'       => 'Woocommerce',
				'description' => pasal_ecommerce_get_wporg_plugin_description( 'woocommerce' ),
				'check'       => ( defined( 'woocommerce' ) || ! pasal_ecommerce_check_passed_time( '259200' ) ),
				'plugin_slug' => 'woocommerce',
				'id'          => 'woocommerce',
                'network'     => 'live',
            ),
            
		),
	),
);
			$protheme = array(
				'title'       => 'Wp Custom Post Type',
				'description' => pasal_ecommerce_get_wporg_plugin_description( 'wp-custom-post-type' ),
				'check'       => ( defined( 'wp-custom-post-type' ) || ! pasal_ecommerce_check_passed_time( '259200' ) ),
				'plugin_slug' => 'wp-custom-post-type',
				'id'          => 'wp-custom-post-type',
			    'network'     => 'live',
			);
	if (in_array('layout-pro/layout-pro.php', apply_filters('active_plugins', get_option('active_plugins')))) {
	    $config['recommended_actions']['content'][1] = $protheme;
	}
pasal_ecommerce_About_Page::init( apply_filters( 'pasal_ecommerce_about_page_array', $config ) );

/*
 * Notifications in customize
 */
require get_template_directory() . '/information/class-pasal-ecommerce-customizer-notify.php';

$config_customizer = array(
	'recommended_plugins'       => array(
		'pasal-ecommerce-companion' => array(
			'recommended' => true,
			/* translators: s - Orbit Fox Companion */
			'description' => sprintf( esc_html__( 'If you want to take full advantage of the options this theme has to offer, please install and activate %s.', 'pasal-ecommerce' ), sprintf( '<strong>%s</strong>', 'Orbit Fox Companion' ) ),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'pasal-ecommerce' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugins', 'pasal-ecommerce' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'pasal-ecommerce' ),
	'activate_button_label'     => esc_html__( 'Activate', 'pasal-ecommerce' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'pasal-ecommerce' ),
);
pasal_ecommerce_Customizer_Notify::init( apply_filters( 'pasal_ecommerce_customizer_notify_array', $config_customizer ) );