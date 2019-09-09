<?php
/**
 * Display all Pasal Ecommerce functions and definitions
 *
 * @package Pasal-ecommerce
 * @since Pasal Ecommerce 1.0
 */

/************************************************************************************************/
if (!function_exists('pasal_ecommerce_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function pasal_ecommerce_setup()
    {
        /**
         * Set the content width based on the theme's design and stylesheet.
         */
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 790;
        }

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Pasal Ecommerce, use a find and replace
         * to change 'pasal-ecommerce' to the name of your theme in all the template files
         */
        load_theme_textdomain('pasal-ecommerce', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');

        /*
         * Let WordPress manage the document title.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');

        register_nav_menus(array(
            'primary' => __('Main Menu', 'pasal-ecommerce'),
        ));

        /*
        * Enable support for custom logo.
        *
        */
        add_theme_support('custom-logo', array(
            'flex-width' => true,
            'flex-height' => true,
        ));

        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        //Indicate widget sidebars can use selective refresh in the Customizer.
        add_theme_support('customize-selective-refresh-widgets');

        /*
         * Switch default core markup for comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'comment-form', 'comment-list', 'gallery', 'caption',
        ));

        /**
         * Add support for the Aside Post Formats
         */
        add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('pasal_ecommerce_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        add_editor_style(get_template_directory() . '/assets/css/editor-style.css');

        /**
         * Making the theme WooCommerce compatible
         */

        
        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
    }
endif; // pasal_ecommerce_setup
add_action('after_setup_theme', 'pasal_ecommerce_setup');

add_image_size('blog-image', 700, 480, true);

/***************************************************************************************/
function pasal_ecommerce_content_width()
{
    if (is_page_template('page-templates/gallery-template.php') || is_attachment()) {
        global $content_width;
        $content_width = 1170;
    }
}

add_action('template_redirect', 'pasal_ecommerce_content_width');

/***************************************************************************************/
if (!function_exists('pasal_ecommerce_get_theme_options')):
    function pasal_ecommerce_get_theme_options()
    {
        return wp_parse_args(get_option('pasal_ecommerce_theme_options', array()), pasal_ecommerce_get_option_defaults_values());
    }
endif;

/***************************************************************************************/
require get_template_directory() . '/inc/customizer/pasal-ecommerce-default-values.php';
require(get_template_directory() . '/inc/settings/pasal-ecommerce-functions.php');
require(get_template_directory() . '/inc/settings/pasal-ecommerce-nav-walker.php');
require(get_template_directory() . '/inc/settings/pasal-ecommerce-common-functions.php');
require(get_template_directory() . '/inc/settings/pasal-ecommerce-tgmp.php');
require(get_template_directory() . '/inc/template-tags.php');
require get_template_directory() . '/inc/jetpack.php';
require get_template_directory() . '/inc/footer-details.php';
require get_template_directory() . '/information/feature-about-page.php';
require get_template_directory() . '/information/pasal-ecommerce-notifications-utils.php' ;


//TGMPA plugin
require get_template_directory() . '/plugin-activation.php';

/************************ Pasal Ecommerce Widgets  *****************************/
require get_template_directory() . '/inc/widgets/widgets-functions/register-widgets.php';

/************************ Pasal Ecommerce Customizer  *****************************/
require get_template_directory() . '/inc/customizer/functions/sanitize-functions.php';
require get_template_directory() . '/inc/customizer/functions/register-panel.php';

function pasal_ecommerce_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '#site-title a',
            'container_inclusive' => false,
            'render_callback' => 'pasal_ecommerce_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector' => '#site-description',
            'container_inclusive' => false,
            'render_callback' => 'pasal_ecommerce_customize_partial_blogdescription',
        ));
    }
    require get_template_directory() . '/inc/customizer/functions/customizer-control.php';
    require get_template_directory() . '/inc/customizer/functions/design-options.php';
    require get_template_directory() . '/inc/customizer/functions/theme-options.php';
    require get_template_directory() . '/inc/customizer/functions/featured-content-customizer.php';

}

require get_template_directory() . '/inc/customizer/functions/class-pro-discount.php';

/**
 * Render the site title for the selective refresh partial.
 * @see pasal_ecommerce_customize_register()
 * @return void
 */
function pasal_ecommerce_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 * @see pasal_ecommerce_customize_register()
 * @return void
 */
function pasal_ecommerce_customize_partial_blogdescription()
{
    bloginfo('description');
}

add_action('customize_register', 'pasal_ecommerce_customize_register');
/**
 * Enqueue script for custom customize control.
 */
function pasal_ecommerce_custom_customize_enqueue()
{
    wp_enqueue_style('pasal-ecommerce-customizer-style', trailingslashit(get_template_directory_uri()) . 'inc/customizer/css/customizer-control.css');
}

add_action('customize_controls_enqueue_scripts', 'pasal_ecommerce_custom_customize_enqueue');


/******************* Pasal Ecommerce Header Display *************************/
if (!function_exists('pasal_ecommerce_the_custom_logo')) {
    function pasal_ecommerce_header_display()
    {
        ?>
        <div id="site-branding">
            <?php if (has_custom_logo()) {

                the_custom_logo();

                echo '<p id="site-description">';
                bloginfo('description');
                echo '</p>';

            } else { ?>
                <h1 id="site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
                       rel="home"> <?php bloginfo('name'); ?> </a>

                </h1>  <!-- end .site-title -->
                <p id="site-description"> <?php bloginfo('description'); ?> </p> <!-- end #site-description -->
            <?php } ?>
        </div> <!-- end #site-branding -->
        <?php
    }

    add_action('pasal_ecommerce_site_branding', 'pasal_ecommerce_header_display');
}


if (!function_exists('pasal_ecommerce_the_custom_logo')) :
    /**
     * Displays the optional custom logo.
     * Does nothing if the custom logo is not available.
     */
    function pasal_ecommerce_the_custom_logo()
    {
        if (function_exists('the_custom_logo')) {
            the_custom_logo();
        }
    }
endif;

/* Header Image */
if (!function_exists('pasal_ecommerce_woocommerce_header_add_to_cart_fragment')) {

    function pasal_ecommerce_header_image_display()
    {
        $pasal_ecommerce_header_image = get_header_image();
        $pasal_ecommerce_settings = pasal_ecommerce_get_theme_options();
        if (!empty($pasal_ecommerce_header_image)) {
            ?>
            <a href="<?php echo esc_url(home_url('/')); ?>"><img
                        src="<?php echo esc_url($pasal_ecommerce_header_image); ?>" class="header-image"
                        width="<?php echo esc_attr(get_custom_header()->width); ?>"
                        height="<?php echo esc_attr(get_custom_header()->height); ?>"
                        alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
            </a>
            <?php
        }
    }
    add_action('pasal_ecommerce_header_image', 'pasal_ecommerce_header_image_display');
}


// for information landing page
define( 'PASAL_ECOMMERCE_VERSION', '1.0.0' );

    function pasal_ecommerce_get_wporg_plugin_description( $slug ) {

        $plugin_transient_name = 'pasal_ecommerce_t_' . $slug;

        $transient = get_transient( $plugin_transient_name );

        if ( ! empty( $transient ) ) {

            return $transient;

        } else {

            $plugin_description = '';

            if ( ! function_exists( 'plugins_api' ) ) {
                require_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );
            }

            $call_api = plugins_api(
                'plugin_information', array(
                    'slug'   => $slug,
                    'fields' => array(
                        'short_description' => true,
                    ),
                )
            );

            if ( ! empty( $call_api ) ) {
                if ( ! empty( $call_api->short_description ) ) {
                    $plugin_description = strtok( $call_api->short_description, '.' );
                }
            }

            set_transient( $plugin_transient_name, $plugin_description, 10 * DAY_IN_SECONDS );

            return $plugin_description;

        }
    }

    function pasal_ecommerce_check_passed_time( $no_seconds ) {
        $activation_time = get_option( 'pasal_ecommerce_time_activated' );
        if ( ! empty( $activation_time ) ) {
            $current_time    = time();
            $time_difference = (int) $no_seconds;
            if ( $current_time >= $activation_time + $time_difference ) {
                return true;
            } else {
                return false;
            }
        }

        return true;
    }


global $pagenow;

if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
    wp_redirect(admin_url('themes.php?page=pasal-ecommerce-welcome'));
}
if (in_array('layout-pro/layout-pro.php', apply_filters('active_plugins', get_option('active_plugins')))) {

if ( ! function_exists ( 'pasal_ecommerce_demo_import_files' ) ) {

    function pasal_ecommerce_demo_import_files()
    {
        return array(
            array(
                'import_file_name' => __('Demo Lite', 'pasal-ecommerce'),
                'import_file_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pasal1.xml'),
                'import_widget_file_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pasal1.wie'),
                'import_customizer_file_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pasal1.dat'),
                'import_preview_image_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/demolite.png'),
                'import_notice' => __( 'After you import this demo, you will have to choose the Home Page separately from customizer.', 'pasal-ecommerce' ),
                'preview_url' => esc_url('https://demo.codethemes.co/pasal-lite/'),
            ),
            
             array(
                'import_file_name' => __('Electronic Store', 'pasal-ecommerce'),
                'import_file_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pro_demo1/content1.xml'),
                'import_widget_file_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pro_demo1/widgets1.wie'),
                'import_customizer_file_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pro_demo1/customizer1.dat'),
                'import_preview_image_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pro_demo1/pasal-demo1.jpg'),
                'import_notice' => __( 'After you import this demo, you will have to choose the Home Page separately from customizer.', 'pasal-ecommerce' ),
                'preview_url' => esc_url('https://demo.codethemes.co/pasal-ecommerce1/'),
            ),

             array(
                'import_file_name' => __('Clothing Store', 'pasal-ecommerce'),
                'import_file_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pro_demo2/Content2.xml'),
                'import_widget_file_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pro_demo2/Widgets2.wie'),
                'import_customizer_file_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pro_demo2/customizer2.dat'),
                'import_preview_image_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pro_demo2/pasal-demo2.jpg'),
                'import_notice' => __( 'After you import this demo, you will have to choose the Home Page separately from customizer.', 'pasal-ecommerce' ),
                'preview_url' => esc_url('https://demo.codethemes.co/pasal-ecommerce2/'),
            ),

             array(
                'import_file_name' => __('Food Store', 'pasal-ecommerce'),
                'import_file_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pro_demo3/Content3.xml'),
                'import_widget_file_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pro_demo3/Widget3.wie'),
                'import_customizer_file_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pro_demo3/Customizer3.dat'),
                'import_preview_image_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pro_demo3/pasal-demo3.jpg'),
                'import_notice' => __( 'After you import this demo, you will have to choose the Home Page separately from customizer.', 'pasal-ecommerce' ),
                'preview_url' => esc_url('https://demo.codethemes.co/pasal-ecommerce3/'),
            ),

             array(
                'import_file_name' => __('Furniture Store', 'pasal-ecommerce'),
                'import_file_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pro_demo4/Content4.xml'),
                'import_widget_file_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pro_demo4/Widget4.wie'),
                'import_customizer_file_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pro_demo4/Customizer4.dat'),
                'import_preview_image_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pro_demo4/pasal-demo4.jpg'),
                'import_notice' => __( 'After you import this demo, you will have to choose the Home Page separately from customizer.', 'pasal-ecommerce' ),
                'preview_url' => esc_url('https://demo.codethemes.co/pasal-ecommerce4/'),
            ),
           
        );
    }

    add_filter('pt-ocdi/import_files', 'pasal_ecommerce_demo_import_files');
}
}
//for pro
if (!in_array('layout-pro/layout-pro.php', apply_filters('active_plugins', get_option('active_plugins')))) {

if ( ! function_exists ( 'pasal_ecommerce_demo_import_files_pro' ) ) {

    function pasal_ecommerce_demo_import_files_pro()
    {
        return array(
            array(
                'import_file_name' => __('Demo Lite', 'pasal-ecommerce'),
                'import_file_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pasal1.xml'),
                'import_widget_file_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pasal1.wie'),
                'import_customizer_file_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/pasal1.dat'),
                'import_preview_image_url' => esc_url('https://codethemes.co/wp-content/uploads/theme_updates/demo_content/pasal/demolite.png'),
                'import_notice' => __( 'After you import this demo, you will have to choose the Home Page separately from customizer.', 'pasal-ecommerce' ),
                'preview_url' => esc_url('https://demo.codethemes.co/pasal-lite/'),
            ),
           
        );
    }

    add_filter('pt-ocdi/import_files', 'pasal_ecommerce_demo_import_files_pro');
}

}
add_filter('woocommerce_currency_symbol', 'pasal_ecommerce_existing_currency_symbol', 10, 2);

function pasal_ecommerce_existing_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'NPR': $currency_symbol = 'NPR '; break;
     }
     return $currency_symbol;
}