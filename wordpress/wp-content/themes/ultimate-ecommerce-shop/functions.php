<?php
/**
 * Ultimate Ecommerce Shop functions and definitions
 * @package Ultimate Ecommerce Shop
 */


/* Theme Setup */
if ( ! function_exists( 'ultimate_ecommerce_shop_setup' ) ) :

function ultimate_ecommerce_shop_setup() {

	$GLOBALS['content_width'] = apply_filters( 'ultimate_ecommerce_shop_content_width', 640 );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('ultimate-ecommerce-shop-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ultimate-ecommerce-shop' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */

	add_editor_style( array( 'assets/css/editor-style.css', ultimate_ecommerce_shop_font_url() ) );

	// Theme Activation Notice
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'ultimate_ecommerce_shop_activation_notice' );
	}
}
endif; // ultimate_ecommerce_shop_setup
add_action( 'after_setup_theme', 'ultimate_ecommerce_shop_setup' );

// Notice after Theme Activation
function ultimate_ecommerce_shop_activation_notice() {
	echo '<div class="notice notice-success is-dismissible welcome">';
		echo '<h3>'. esc_html__( 'Warm Greetings to you!!', 'ultimate-ecommerce-shop' ) .'</h3>';
		echo '<p>'. esc_html__( ' We are much obliged to you for choosing are Ultimate Ecommerce theme. We promise to present you with all the outstanding features and services of our theme. Please proceed towards the landing page to get started .', 'ultimate-ecommerce-shop' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=ultimate_ecommerce_shop_guide' ) ) .'" class="button button-primary">'. esc_html__( 'Welcome...', 'ultimate-ecommerce-shop' ) .'</a></p>';
	echo '</div>';
}


/*Site URL*/
define('ULTIMATE_ECOMMERCE_SHOP_FREE_THEME_DOC','https://logicalthemes.com/docs/free-ultimate-ecommerce/',
'ultimate-ecommerce-shop');
define('ULTIMATE_ECOMMERCE_SHOP_SUPPORT','https://wordpress.org/support/theme/ultimate-ecommerce-shop/',
'ultimate-ecommerce-shop');
define('ULTIMATE_ECOMMERCE_SHOP_REVIEW','https://wordpress.org/support/theme/ultimate-ecommerce-shop/reviews/#new-post',
'ultimate-ecommerce-shop');
define('ULTIMATE_ECOMMERCE_SHOP_BUY_NOW','https://www.logicalthemes.com/tl-pr/premium-ecommerce-wordpress-theme/',
'ultimate-ecommerce-shop');
define('ULTIMATE_ECOMMERCE_SHOP_LIVE_DEMO','https://logicalthemes.com/ultimate-ecommerce-shop-pro/',
'ultimate-ecommerce-shop');
define('ULTIMATE_ECOMMERCE_SHOP_PRO_DOC','https://logicalthemes.com/docs/ultimate-ecommerce-store-pro/',
'ultimate-ecommerce-shop');
define('ULTIMATE_ECOMMERCE_SHOP_CREDIT','https://www.logicalthemes.com/themes/free-ecommerce-wordpress-theme/','ultimate-ecommerce-shop');
if ( ! function_exists( 'ultimate_ecommerce_shop_credit' ) ) {
	function ultimate_ecommerce_shop_credit(){
		echo "<a href=".esc_url(ULTIMATE_ECOMMERCE_SHOP_CREDIT)." target='_blank'>".esc_html__('Ecommerce WordPress Theme','ultimate-ecommerce-shop')."</a>";
	}
}

/*radio button sanitization*/
function ultimate_ecommerce_shop_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'ultimate_ecommerce_shop_loop_columns');
	if (!function_exists('ultimate_ecommerce_shop_loop_columns')) {
		function ultimate_ecommerce_shop_loop_columns() {
		return 3; // 3 products per row
	}
}

function ultimate_ecommerce_shop_sanitize_dropdown_pages($page_id, $setting) {
	// Ensure $input is an absolute integer.
	$page_id = absint($page_id);
	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ('publish' == get_post_status($page_id)?$page_id:$setting->default);
}

/* Theme Widgets Setup */
function ultimate_ecommerce_shop_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'ultimate-ecommerce-shop' ),
		'description'   => __( 'Appears on blog page sidebar', 'ultimate-ecommerce-shop' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'ultimate-ecommerce-shop' ),
		'description'   => __( 'Appears on posts and pages', 'ultimate-ecommerce-shop' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'ultimate-ecommerce-shop' ),
		'description'   => __( 'Appears on posts and pages', 'ultimate-ecommerce-shop' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Social Icon', 'ultimate-ecommerce-shop' ),
		'description'   => __( 'Appears on header', 'ultimate-ecommerce-shop' ),
		'id'            => 'social-icon',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'ultimate-ecommerce-shop' ),
		'description'   => __( 'Appears in footer', 'ultimate-ecommerce-shop' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'ultimate-ecommerce-shop' ),
		'description'   => __( 'Appears in footer', 'ultimate-ecommerce-shop' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'ultimate-ecommerce-shop' ),
		'description'   => __( 'Appears in footer', 'ultimate-ecommerce-shop' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'ultimate-ecommerce-shop' ),
		'description'   => __( 'Appears in footer', 'ultimate-ecommerce-shop' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'ultimate_ecommerce_shop_widgets_init' );


function ultimate_ecommerce_shop_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Roboto Condensed:400,700';
	$font_family[] = 'Open Sans';
	$font_family[] = 'Overpass';
	$font_family[] = 'Montserrat:300,400,600,700,800,900';
	$font_family[] = 'Playball:300,400,600,700,800,900';
	$font_family[] = 'Alegreya:300,400,600,700,800,900';
	$font_family[] = 'Julius Sans One';
	$font_family[] = 'Arsenal';
	$font_family[] = 'Slabo';
	$font_family[] = 'Lato';
	$font_family[] = 'Overpass Mono';
	$font_family[] = 'Source Sans Pro';
	$font_family[] = 'Raleway';
	$font_family[] = 'Merriweather';
	$font_family[] = 'Droid Sans';
	$font_family[] = 'Rubik';
	$font_family[] = 'Lora';
	$font_family[] = 'Ubuntu';
	$font_family[] = 'Cabin';
	$font_family[] = 'Arimo';
	$font_family[] = 'Playfair Display';
	$font_family[] = 'Quicksand';
	$font_family[] = 'Padauk';
	$font_family[] = 'Muli';
	$font_family[] = 'Inconsolata';
	$font_family[] = 'Bitter';
	$font_family[] = 'Pacifico';
	$font_family[] = 'Indie Flower';
	$font_family[] = 'VT323';
	$font_family[] = 'Dosis';
	$font_family[] = 'Frank Ruhl Libre';
	$font_family[] = 'Fjalla One';
	$font_family[] = 'Oxygen';
	$font_family[] = 'Arvo';
	$font_family[] = 'Noto Serif';
	$font_family[] = 'Lobster';
	$font_family[] = 'Crimson Text';
	$font_family[] = 'Yanone Kaffeesatz';
	$font_family[] = 'Anton';
	$font_family[] = 'Libre Baskerville';
	$font_family[] = 'Bree Serif';
	$font_family[] = 'Gloria Hallelujah';
	$font_family[] = 'Josefin Sans';
	$font_family[] = 'Abril Fatface';
	$font_family[] = 'Varela Round';
	$font_family[] = 'Vampiro One';
	$font_family[] = 'Shadows Into Light';
	$font_family[] = 'Cuprum';
	$font_family[] = 'Rokkitt';
	$font_family[] = 'Vollkorn';
	$font_family[] = 'Francois One';
	$font_family[] = 'Orbitron';
	$font_family[] = 'Patua One';
	$font_family[] = 'Acme';
	$font_family[] = 'Satisfy';
	$font_family[] = 'Josefin Slab';
	$font_family[] = 'Quattrocento Sans';
	$font_family[] = 'Architects Daughter';
	$font_family[] = 'Russo One';
	$font_family[] = 'Monda';
	$font_family[] = 'Righteous';
	$font_family[] = 'Lobster Two';
	$font_family[] = 'Hammersmith One';
	$font_family[] = 'Courgette';
	$font_family[] = 'Permanent Marker';
	$font_family[] = 'Cherry Swash';
	$font_family[] = 'Cormorant Garamond';
	$font_family[] = 'Poiret One';
	$font_family[] = 'BenchNine';
	$font_family[] = 'Economica';
	$font_family[] = 'Handlee';
	$font_family[] = 'Cardo';
	$font_family[] = 'Alfa Slab One';
	$font_family[] = 'Averia Serif Libre';
	$font_family[] = 'Cookie';
	$font_family[] = 'Chewy';
	$font_family[] = 'Great Vibes';
	$font_family[] = 'Coming Soon';
	$font_family[] = 'Philosopher';
	$font_family[] = 'Days One';
	$font_family[] = 'Kanit';
	$font_family[] = 'Shrikhand';
	$font_family[] = 'Tangerine';
	$font_family[] = 'IM Fell English SC';
	$font_family[] = 'Boogaloo';
	$font_family[] = 'Bangers';
	$font_family[] = 'Fredoka One';
	$font_family[] = 'Bad Script';
	$font_family[] = 'Volkhov';
	$font_family[] = 'Shadows Into Light Two';
	$font_family[] = 'Marck Script';
	$font_family[] = 'Sacramento';
	$font_family[] = 'Unica One';
	$font_family[] = 'Poppins';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}	


/* Theme enqueue scripts */
function ultimate_ecommerce_shop_scripts() {
	wp_enqueue_style( 'ultimate-ecommerce-shop-font', ultimate_ecommerce_shop_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');
	wp_enqueue_style( 'ultimate-ecommerce-shop-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'ultimate-ecommerce-shop-style', 'rtl', 'replace' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css' );	 

	// Paragraph
	    $ultimate_ecommerce_shop_paragraph_color = get_theme_mod('ultimate_ecommerce_shop_paragraph_color', '');
	    $ultimate_ecommerce_shop_paragraph_font_family = get_theme_mod('ultimate_ecommerce_shop_paragraph_font_family', '');
	    $ultimate_ecommerce_shop_paragraph_font_size = get_theme_mod('ultimate_ecommerce_shop_paragraph_font_size', '');
	// "a" tag
		$ultimate_ecommerce_shop_atag_color = get_theme_mod('ultimate_ecommerce_shop_atag_color', '');
	    $ultimate_ecommerce_shop_atag_font_family = get_theme_mod('ultimate_ecommerce_shop_atag_font_family', '');
	// "li" tag
		$ultimate_ecommerce_shop_li_color = get_theme_mod('ultimate_ecommerce_shop_li_color', '');
	    $ultimate_ecommerce_shop_li_font_family = get_theme_mod('ultimate_ecommerce_shop_li_font_family', '');
	// H1
		$ultimate_ecommerce_shop_h1_color = get_theme_mod('ultimate_ecommerce_shop_h1_color', '');
	    $ultimate_ecommerce_shop_h1_font_family = get_theme_mod('ultimate_ecommerce_shop_h1_font_family', '');
	    $ultimate_ecommerce_shop_h1_font_size = get_theme_mod('ultimate_ecommerce_shop_h1_font_size', '');
	// H2
		$ultimate_ecommerce_shop_h2_color = get_theme_mod('ultimate_ecommerce_shop_h2_color', '');
	    $ultimate_ecommerce_shop_h2_font_family = get_theme_mod('ultimate_ecommerce_shop_h2_font_family', '');
	    $ultimate_ecommerce_shop_h2_font_size = get_theme_mod('ultimate_ecommerce_shop_h2_font_size', '');
	// H3
		$ultimate_ecommerce_shop_h3_color = get_theme_mod('ultimate_ecommerce_shop_h3_color', '');
	    $ultimate_ecommerce_shop_h3_font_family = get_theme_mod('ultimate_ecommerce_shop_h3_font_family', '');
	    $ultimate_ecommerce_shop_h3_font_size = get_theme_mod('ultimate_ecommerce_shop_h3_font_size', '');
	// H4
		$ultimate_ecommerce_shop_h4_color = get_theme_mod('ultimate_ecommerce_shop_h4_color', '');
	    $ultimate_ecommerce_shop_h4_font_family = get_theme_mod('ultimate_ecommerce_shop_h4_font_family', '');
	    $ultimate_ecommerce_shop_h4_font_size = get_theme_mod('ultimate_ecommerce_shop_h4_font_size', '');
	// H5
		$ultimate_ecommerce_shop_h5_color = get_theme_mod('ultimate_ecommerce_shop_h5_color', '');
	    $ultimate_ecommerce_shop_h5_font_family = get_theme_mod('ultimate_ecommerce_shop_h5_font_family', '');
	    $ultimate_ecommerce_shop_h5_font_size = get_theme_mod('ultimate_ecommerce_shop_h5_font_size', '');
	// H6
		$ultimate_ecommerce_shop_h6_color = get_theme_mod('ultimate_ecommerce_shop_h6_color', '');
	    $ultimate_ecommerce_shop_h6_font_family = get_theme_mod('ultimate_ecommerce_shop_h6_font_family', '');
	    $ultimate_ecommerce_shop_h6_font_size = get_theme_mod('ultimate_ecommerce_shop_h6_font_size', '');


		$custom_css ='
			p,span{
			    color:'.esc_html($ultimate_ecommerce_shop_paragraph_color).'!important;
			    font-family: '.esc_html($ultimate_ecommerce_shop_paragraph_font_family).'!important;
			    font-size: '.esc_html($ultimate_ecommerce_shop_paragraph_font_size).'!important;
			}
			a{
			    color:'.esc_html($ultimate_ecommerce_shop_atag_color).'!important;
			    font-family: '.esc_html($ultimate_ecommerce_shop_atag_font_family).';
			}
			li{
			    color:'.esc_html($ultimate_ecommerce_shop_li_color).'!important;
			    font-family: '.esc_html($ultimate_ecommerce_shop_li_font_family).';
			}
			h1{
			    color:'.esc_html($ultimate_ecommerce_shop_h1_color).'!important;
			    font-family: '.esc_html($ultimate_ecommerce_shop_h1_font_family).'!important;
			    font-size: '.esc_html($ultimate_ecommerce_shop_h1_font_size).'!important;
			}
			h2{
			    color:'.esc_html($ultimate_ecommerce_shop_h2_color).'!important;
			    font-family: '.esc_html($ultimate_ecommerce_shop_h2_font_family).'!important;
			    font-size: '.esc_html($ultimate_ecommerce_shop_h2_font_size).'!important;
			}
			h3{
			    color:'.esc_html($ultimate_ecommerce_shop_h3_color).'!important;
			    font-family: '.esc_html($ultimate_ecommerce_shop_h3_font_family).'!important;
			    font-size: '.esc_html($ultimate_ecommerce_shop_h3_font_size).'!important;
			}
			h4{
			    color:'.esc_html($ultimate_ecommerce_shop_h4_color).'!important;
			    font-family: '.esc_html($ultimate_ecommerce_shop_h4_font_family).'!important;
			    font-size: '.esc_html($ultimate_ecommerce_shop_h4_font_size).'!important;
			}
			h5{
			    color:'.esc_html($ultimate_ecommerce_shop_h5_color).'!important;
			    font-family: '.esc_html($ultimate_ecommerce_shop_h5_font_family).'!important;
			    font-size: '.esc_html($ultimate_ecommerce_shop_h5_font_size).'!important;
			}
			h6{
			    color:'.esc_html($ultimate_ecommerce_shop_h6_color).'!important;
			    font-family: '.esc_html($ultimate_ecommerce_shop_h6_font_family).'!important;
			    font-size: '.esc_html($ultimate_ecommerce_shop_h6_font_size).'!important;
			}

			';
		wp_add_inline_style( 'ultimate-ecommerce-shop-basic-style',$custom_css );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'ultimate-ecommerce-shop-customscripts', get_template_directory_uri() . '/assets/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ultimate_ecommerce_shop_scripts' );

function ultimate_ecommerce_shop_ie_stylesheet(){
	wp_enqueue_style('ultimate-ecommerce-shop-ie', get_template_directory_uri().'/assets/css/ie.css', array('ultimate-ecommerce-shop-basic-style'));
	wp_style_add_data( 'ultimate-ecommerce-shop-ie', 'conditional', 'IE' );
}
add_action('wp_enqueue_scripts','ultimate_ecommerce_shop_ie_stylesheet');

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/custom-widgets/social-profile.php';
require get_template_directory() . '/inc/getting-started/getting-started.php';