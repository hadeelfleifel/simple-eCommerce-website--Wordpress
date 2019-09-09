<?php
/**
 * Custom functions
 *
 * @package Pasal-ecommerce
 * @since Pasal Ecommerce 1.0
 */

/******************** Remove div and replace with ul**************************************/
if (! function_exists('pasal_ecommerce_wp_page_menu')) {
	add_filter('wp_page_menu', 'pasal_ecommerce_wp_page_menu');
	function pasal_ecommerce_wp_page_menu($page_markup) {
		preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
		$divclass   = $matches[1];
		$replace    = array('<div class="'.$divclass.'">', '</div>');
		$new_markup = str_replace($replace, '', $page_markup);
		$new_markup = preg_replace('/^<ul>/i', '<ul class="'.$divclass.'">', $new_markup);
		return $new_markup;
	}
}


/********************* Used wp_page_menu filter hook *********************************************/
if (! function_exists('pasal_ecommerce_wp_page_menu_filter')) {
	function pasal_ecommerce_wp_page_menu_filter($text) {
		$replace = array(
			'current_page_item' => 'current-menu-item',
		);
		$text = str_replace(array_keys($replace), $replace, $text);
		return $text;
	}
	add_filter('wp_page_menu', 'pasal_ecommerce_wp_page_menu_filter');
}

/**************************************************************************************/
if (! function_exists('pasal_ecommerce_get_featured_posts')) {
	function pasal_ecommerce_get_featured_posts() {
		return apply_filters( 'pasal_ecommerce_get_featured_posts', array() );
	}
}
/************ Return bool if there are featured Posts ********************************/
if (! function_exists('pasal_ecommerce_has_featured_posts')) {
	function pasal_ecommerce_has_featured_posts() {
		return ! is_paged() && (bool) pasal_ecommerce_get_featured_posts();
	}
}

/**************************** Display Header Title ***********************************/
if (! function_exists('pasal_ecommerce_display_header_title')) {

    add_filter('get_the_archive_title', 'pasal_ecommerce_display_header_title');
    function pasal_ecommerce_display_header_title($title)
    {
        $format = get_post_format();
        $pasal_ecommerce_settings = pasal_ecommerce_get_theme_options();
        if (is_archive()) {
            if (is_category()) :
                $pasal_ecommerce_header_title = esc_html__('Category: ', 'pasal-ecommerce') . ucfirst(single_cat_title('', FALSE));
            elseif (is_tag()) :
                if ($pasal_ecommerce_settings['pasal_ecommerce_blog_layout'] != 'photography_layout'):
                    $pasal_ecommerce_header_title = esc_html__('Tag: ', 'pasal-ecommerce') . ucfirst(single_tag_title('', FALSE));
                endif;

            elseif (is_author()) :
                the_post();
                $pasal_ecommerce_header_title = esc_html__('Author: ', 'pasal-ecommerce') . ucfirst(get_the_author());
            elseif (is_day()) :
                $pasal_ecommerce_header_title = esc_html__('Day: ', 'pasal-ecommerce') . get_the_date();
            elseif (is_month()) :
                $pasal_ecommerce_header_title = esc_html__('Month: ', 'pasal-ecommerce') . get_the_date('F Y');
            elseif (is_year()) :
                $pasal_ecommerce_header_title = esc_html__('Year: ', 'pasal-ecommerce') . get_the_date('Y');
            elseif ($format == 'audio') :
                $pasal_ecommerce_header_title = esc_html__('Audios', 'pasal-ecommerce');
            elseif ($format == 'aside') :
                $pasal_ecommerce_header_title = esc_html__('Asides', 'pasal-ecommerce');
            elseif ($format == 'image') :
                $pasal_ecommerce_header_title = esc_html__('Images', 'pasal-ecommerce');
            elseif ($format == 'gallery') :
                $pasal_ecommerce_header_title = esc_html__('Galleries', 'pasal-ecommerce');
            elseif ($format == 'video') :
                $pasal_ecommerce_header_title = esc_html__('Videos', 'pasal-ecommerce');
            elseif ($format == 'status') :
                $pasal_ecommerce_header_title = esc_html__('Status', 'pasal-ecommerce');
            elseif ($format == 'quote') :
                $pasal_ecommerce_header_title = esc_html__('Quotes', 'pasal-ecommerce');
            elseif ($format == 'link') :
                $pasal_ecommerce_header_title = esc_html__('links', 'pasal-ecommerce');
            elseif ($format == 'chat') :
                $pasal_ecommerce_header_title = esc_html__('Chats', 'pasal-ecommerce');
            elseif (class_exists('WooCommerce') && (is_shop() || is_product_category())):
                $pasal_ecommerce_header_title = woocommerce_page_title(false);
            elseif (class_exists('bbPress') && is_bbpress()) :
                $pasal_ecommerce_header_title = esc_html(get_the_title());
            else :
                $pasal_ecommerce_header_title = esc_html__('Archive:', 'pasal-ecommerce');
            endif;
        } elseif (is_home()) {
            $pasal_ecommerce_header_title = esc_html(get_the_title(get_option('page_for_posts')));
        } elseif (is_404()) {
            $pasal_ecommerce_header_title = __('Page NOT Found', 'pasal-ecommerce');
        } elseif (is_search()) {
            $search_query = get_search_query();
            $pasal_ecommerce_header_title = sprintf('Search Results for: ' . ucfirst($search_query) . '', 'pasal-ecommerce');
        } elseif (is_page_template()) {
            $pasal_ecommerce_header_title = get_the_title();
        } else {
            $pasal_ecommerce_header_title = get_the_title();
        }
        return $pasal_ecommerce_header_title;

    }
}
/********************* Custom Header setup ************************************/
if (! function_exists('pasal_ecommerce_custom_header_setup')) {
	function pasal_ecommerce_custom_header_setup() {
		$args = array(
			'default-text-color'     => '',
			'default-image'          => '',
			'height'                 => apply_filters( 'pasal_ecommerce_header_image_height', 400 ),
			'width'                  => apply_filters( 'pasal_ecommerce_header_image_width', 2500 ),
			'random-default'         => false,
			'max-width'              => 2500,
			'flex-height'            => true,
			'flex-width'             => true,
			'random-default'         => false,
			'header-text'			 => false,
			'uploads'				 => true,
			'wp-head-callback'       => '',
			'default-image'			 => '',
		);
		add_theme_support( 'custom-header', $args );
	}
	add_action( 'after_setup_theme', 'pasal_ecommerce_custom_header_setup' );
}

if ( ! function_exists( 'pasal_ecommerce_the_featured_video' ) ) {
    function pasal_ecommerce_the_featured_video( $content ) {

        $ori_url = explode( "\n", esc_html( $content ) );
        $url = esc_url( $ori_url[0] );

        $w = get_option( 'embed_size_w' );
        if ( !is_single() )
            $url = str_replace( '448', $w, $url );

        if ( 0 === strpos( $url, 'https://' ) ) {
            $embed_url = wp_oembed_get( esc_url( $url ) );
            print_r($embed_url);
            $content = trim( str_replace( $url, '', esc_html( $content ) ) );
        }
        elseif ( preg_match ( '#^<(script|iframe|embed|object)#i', $url ) ) {
            $h = get_option( 'embed_size_h' );
            echo esc_url( $url );
            if ( !empty( $h ) ) {

                if ( $w === $h ) $h = ceil( $w * 0.75 );
                $url = preg_replace(
                    array( '#height="[0-9]+?"#i', '#height=[0-9]+?#i' ),
                    array( sprintf( 'height="%d"', $h ), sprintf( 'height=%d', $h ) ),
                    $url
                    );
                echo esc_url( $url );
            }

            $content = trim( str_replace( $url, '', $content ) );
        }
    }
}

if (! function_exists('pasal_ecommerce_single_content')) {
    function pasal_ecommerce_single_content($post) {
        $content = trim(  get_post_field('post_content', $post->ID) );
        /*$new_content =  preg_match_all("/\[[^\]]*\]/", $content, $matches);
        if ( has_post_format('gallery')) {
            echo wp_kses_post($post->post_content);
        }
        else {*/
            the_content();
        /*}*/
    }
}
 /* for excerpt*/
if (!function_exists('pasal_ecommerce_get_excerpt')) :
    function pasal_ecommerce_get_excerpt($post_id, $count)
    {
        $title = get_the_title($post_id);
        $content_post = get_post($post_id);
        $excerpt = $content_post->post_content;

        $excerpt = strip_shortcodes($excerpt);
        $excerpt = strip_tags($excerpt);


        $excerpt = preg_replace('/\s\s+/', ' ', $excerpt);
        $excerpt = preg_replace('#\[[^\]]+\]#', ' ', $excerpt);
        $strip = explode(' ', $excerpt);
        foreach ($strip as $key => $single) {
            if (!filter_var($single, FILTER_VALIDATE_URL) === false) {
                unset($strip[$key]);
            }
        }
        $excerpt = implode(' ', $strip);

        $excerpt = substr($excerpt, 0, $count);
        if (strlen($excerpt) >= $count) {
            $excerpt = substr($excerpt, 0, strripos($excerpt, ' '));
            $excerpt = $excerpt . '...';
        }
        if($title)
            return $excerpt;
        else
            return '<a href="'.esc_url(get_the_permalink($post_id)).'">'.$excerpt.'</a>';

    }
endif;

//for woocommerce
if ( ! function_exists( 'woocommerce_template_loop_product_link_open' ) ) {
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function woocommerce_template_loop_product_link_open() {
		global $product;

		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

		echo '<a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">'.'<h2 class="woocommerce-loop-product__title">' . get_the_title() . '</h2>'.'</a>';
	}
}

if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {

    /**
     * Show the product title in the product loop. By default this is an H2.
     */
    function woocommerce_template_loop_product_title() {
        // this function is overritted in woocommerce_template_loop_product_link_open function
    }
}
