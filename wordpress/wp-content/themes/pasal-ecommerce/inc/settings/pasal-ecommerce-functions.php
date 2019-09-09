<?php
/**
 * Custom functions
 *
 * @package Pasal-ecommerce
 * @since Pasal Ecommerce 1.0
 */

/******************************** EXCERPT LENGTH *********************************/
if (! function_exists('pasal_ecommerce_excerpt_length')) {
	function pasal_ecommerce_excerpt_length($length) {
		$pasal_ecommerce_settings = pasal_ecommerce_get_theme_options();
		$pasal_ecommerce_excerpt_length = $pasal_ecommerce_settings['pasal_ecommerce_excerpt_length'];
		return absint($pasal_ecommerce_excerpt_length);// this will return 30 words in the excerpt
	}
	add_filter('excerpt_length', 'pasal_ecommerce_excerpt_length');
}

/********************* CONTINUE READING LINKS FOR EXCERPT *********************************/
if (! function_exists('pasal_ecommerce_continue_reading')) {
	function pasal_ecommerce_continue_reading() {
		 return '&hellip; ';
	}
	add_filter('excerpt_more', 'pasal_ecommerce_continue_reading');
}

/***************** USED CLASS FOR BODY TAGS ******************************/
if (! function_exists('pasal_ecommerce_body_class')) {
	function pasal_ecommerce_body_class($classes) {
		$pasal_ecommerce_settings = pasal_ecommerce_get_theme_options();
		$pasal_ecommerce_site_layout = $pasal_ecommerce_settings['pasal_ecommerce_design_layout'];

		if (is_page_template('page-templates/page-template-contact.php')) {
				$classes[] = 'contact';
		}
		if ($pasal_ecommerce_site_layout =='boxed-layout') {
			$classes[] = 'boxed-layout';
		}
		if ($pasal_ecommerce_site_layout =='small-boxed-layout') {
			$classes[] = 'boxed-layout-small';
		}
		$classes[] = 'small_image_blog';
		return $classes;
	}
	add_filter('body_class', 'pasal_ecommerce_body_class');
}

/********************** SCRIPTS FOR DONATE/ UPGRADE BUTTON ******************************/
if (! function_exists('pasal_ecommerce_customize_scripts')) {
	function pasal_ecommerce_customize_scripts() {

		// Load the html5 shiv.
		wp_enqueue_script( 'pasal-ecommerce-html5', get_template_directory_uri() . '/assets/js/html5.min.js', array(), '3.7.3' );
		wp_script_add_data( 'pasal-ecommerce-html5', 'conditional', 'lt IE 9' );
	}
	add_action( 'customize_controls_print_scripts', 'pasal_ecommerce_customize_scripts');
}

/**************************** SOCIAL MENU *********************************************/
if (! function_exists('pasal_ecommerce_social_links')) {
	function pasal_ecommerce_social_links() {

		$pasal_ecommerce_settings 	= pasal_ecommerce_get_theme_options();
		$facebook 				= $pasal_ecommerce_settings['pasal_ecommerce_social_facebook'];
		$twitter 				= $pasal_ecommerce_settings['pasal_ecommerce_social_twitter'];
		$pinterest				= $pasal_ecommerce_settings['pasal_ecommerce_social_pinterest'];
		$dribble 				= $pasal_ecommerce_settings['pasal_ecommerce_social_dribbble'];
		$instagram 				= $pasal_ecommerce_settings['pasal_ecommerce_social_instagram'];
		$flicker 				= $pasal_ecommerce_settings['pasal_ecommerce_social_flickr'];
		$gplus 					= $pasal_ecommerce_settings['pasal_ecommerce_social_googleplus'];
		$linkedin 				= $pasal_ecommerce_settings['pasal_ecommerce_social_linkedin'];

		if(!empty($facebook) || !empty($twitter) || !empty($pinterest) || !empty($dribble) || !empty($dribble) || !empty($instagram) || !empty($flicker) || !empty($gplus) || !empty($linkedin)) :
				?>
				<div class="social-links clearfix">
					<?php
					if( !empty($facebook) ):
						echo '<a target="_blank" href="'.esc_url($facebook).'"><i class="fa fa-facebook"></i></a>';
					endif;
					if( !empty($twitter) ):
						echo '<a target="_blank" href="'.esc_url($twitter).'"><i class="fa fa-twitter"></i></a>';
					endif;
					if( !empty($pinterest) ):
						echo '<a target="_blank" href="'.esc_url($pinterest).'"><i class="fa fa-pinterest-p"></i></a>';
					endif;
					if( !empty($dribble) ):
						echo '<a target="_blank" href="'.esc_url($dribble).'"><i class="fa fa-dribbble"></i></a>';
					endif;
					if( !empty($instagram) ):
						echo '<a target="_blank" href="'.esc_url($instagram).'"><i class="fa fa-instagram"></i></a>';
					endif;
					if( !empty($flicker) ):
						echo '<a target="_blank" href="'.esc_url($flicker).'"><i class="fa fa-flickr"></i></a>';
					endif;
					if( !empty($gplus) ):
						echo '<a target="_blank" href="'.esc_url($gplus).'"><i class="fa fa-google-plus-official"></i></a>';
					endif;
					if( !empty($linkedin) ):
						echo '<a target="_blank" href="'.esc_url($linkedin).'"><i class="fa fa-linkedin"></i></a>';
					endif;
						?>
				</div><!-- end .social-links -->
			<?php
		endif;
	}
	add_action ('pasal_ecommerce_social_links', 'pasal_ecommerce_social_links');
}

/*********************** Pasal Ecommerce PAGE SLIDERS ***********************************/
if (! function_exists('pasal_ecommerce_page_sliders')) {
	function pasal_ecommerce_page_sliders() {
        $pasal_ecommerce_settings = pasal_ecommerce_get_theme_options();
        $banner_pages = array_filter(array(
            $pasal_ecommerce_settings['pasal_ecommerce_featured_page_slider_1'],
            $pasal_ecommerce_settings['pasal_ecommerce_featured_page_slider_2'],
            $pasal_ecommerce_settings['pasal_ecommerce_featured_page_slider_3'],
            $pasal_ecommerce_settings['pasal_ecommerce_featured_page_slider_4']
        ));
        if(count($banner_pages)>0) {
            $get_featured_posts = new WP_Query(array('posts_per_page' => count($banner_pages), 'post_type' => array('page'), 'post__in' => $banner_pages, 'orderby' => 'post__in',));

				echo '<div class="main-slider clearfix"> <div class="layer-slider">';

//				echo '<pre>';
//				print_r($get_featured_posts);
						$i=0;
				while ($get_featured_posts->have_posts()):$get_featured_posts->the_post();
				global $post;
				$attachment_id = get_post_thumbnail_id();
				$image_attributes = wp_get_attachment_image_src($attachment_id,'full');
							$i++;
							$title_attribute       	 	 = apply_filters('the_title', get_the_title($post->ID));
							$excerpt               	 	 = substr(get_the_excerpt(), 0 , 160);
							if (1 == $i) {$classes   	 = "slides show-display";} else { $classes = "slides hide-display";}
									?>
					<div class="<?php echo esc_attr($classes); ?>">
						<div class="image-slider clearfix" title="<?php the_title('', '', false); ?>" style="background-image:url(<?php echo esc_url($image_attributes[0]); ?>)">
							<article class="slider-content clearfix">
					<?php

						if ($title_attribute != '') {
							echo '<h2 class="slider-title"><a href="'.esc_url(get_permalink()).'" title="'.the_title('', '', false).'" rel="bookmark">'.esc_html(get_the_title()).'</a></h2><!-- .slider-title -->';
						}

						if ($excerpt != '') {
							echo '<div class="slider-text">';
							echo '<p>'.esc_html($excerpt).' </p></div><!-- end .slider-text -->';
						}
						echo '<div class="slider-buttons">';
						echo '<a title='.'"'.esc_html(get_the_title()). '"'. ' '.'href="'.esc_url(get_permalink()).'"'.' class="btn-default">'.esc_html__('Read More', 'pasal-ecommerce').'</a>';
						echo '</div><!-- end .slider-buttons -->';
						echo '</article><!-- end .slider-content --> ';
					if ($image_attributes) {
						echo '</div><!-- end .image-slider -->';
					}
					echo '</div><!-- end .slides -->';
				endwhile;
				wp_reset_postdata();
				echo '</div>	  <!-- end .layer-slider -->
						<a class="slider-prev" id="prev2" href="#"><i class="fa fa-angle-left"></i></a> <a class="slider-next" id="next2" href="#"><i class="fa fa-angle-right"></i></a>
	  					<nav class="slider-button"> </nav> <!-- end .slider-button -->
					</div> <!-- end .main-slider -->';


        }
	}
}

/*************************** ENQUEING STYLES AND SCRIPTS ****************************************/
if (! function_exists('pasal_ecommerce_scripts')) {
	function pasal_ecommerce_scripts() {
		$pasal_ecommerce_settings = pasal_ecommerce_get_theme_options();
		wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/assets/css/bootstrap.min.css');
		wp_enqueue_style( 'pasal-ecommerce-style', get_stylesheet_uri() );
		wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/font-awesome/css/font-awesome.min.css');
		wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), false, true);
		wp_enqueue_script('slick-jquery', get_template_directory_uri().'/assets/js/slick.min.js', array('jquery'), false, true);
		wp_enqueue_script('jquery_cycle_all', get_template_directory_uri().'/assets/js/jquery.cycle.all.min.js', array('jquery'), false, true);
//		wp_enqueue_script('pasal-ecommerce-main', get_template_directory_uri().'/assets/js/pasal-ecommerce.js', array('jquery'), false, true);
		wp_enqueue_script('jquery-sticky', get_template_directory_uri().'/assets/sticky/jquery.sticky.min.js', array('jquery'), false, true);
		wp_enqueue_script('jquery-sticky-settings', get_template_directory_uri().'/assets/sticky/sticky-settings.js', array('jquery'), false, true);
		wp_enqueue_script('pasal-ecommerce-slick', get_template_directory_uri().'/assets/js/slick.js', array('jquery'), false, true);
		wp_enqueue_script('pasal-ecommerce-app', get_template_directory_uri().'/assets/js/pasal-ecommerce.js', array('jquery'), false, true);

		wp_style_add_data('IE-9', 'conditional', 'lt IE 9');
		wp_enqueue_style('pasal-ecommerce-responsive', get_template_directory_uri().'/assets/css/responsive.css');
		wp_enqueue_style('slick-css', get_template_directory_uri().'/assets/css/slick.css');

		/********* Adding Multiple Fonts ********************/
		$pasal_ecommerce_googlefont = array();
		array_push( $pasal_ecommerce_googlefont, 'Poppins');
		array_push( $pasal_ecommerce_googlefont, 'Playfair+Display');
		$pasal_ecommerce_googlefonts = implode("|", $pasal_ecommerce_googlefont);
		wp_register_style( 'pasal_ecommerce_google_fonts', '//fonts.googleapis.com/css?family='.$pasal_ecommerce_googlefonts);
		wp_enqueue_style( 'pasal_ecommerce_google_fonts' );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'pasal_ecommerce_scripts' );
}

if (! function_exists('pasal_ecommerce_blog_post_format')) {
	function pasal_ecommerce_blog_post_format($post_format, $post_id) {

		if (is_single()){
			$single_post_format_class = 'single-post-format';
		} else {
			$single_post_format_class = '';
		}

		$pasal_ecommerce_settings = pasal_ecommerce_get_theme_options();

		if($post_format == 'video'){ ?>
			<div class="post-video <?php echo esc_attr($single_post_format_class);?>">
				<div class="post-video-holder">
					<?php
			            $content = trim(  get_post_field('post_content', $post_id) );
			            $new_content =  preg_match_all("/\[[^\]]*\]/", $content, $matches);
			            if( $new_content){
			                echo do_shortcode( $matches[0][0] );
			            }
			            else{
			                echo esc_html( pasal_ecommerce_the_featured_video( $content ) );
			            }
			        ?>
				</div>
			</div>
		<?php
		}
		elseif($post_format == 'audio'){
			?>
				<div class="post-audio <?php echo esc_attr($single_post_format_class);?>">
					<div class="post-audio-holder">
						<?php
							$content = trim(  get_post_field('post_content', $post_id) );
				              $ori_url = explode( "\n", esc_html( $content ) );
				            $new_content =  preg_match_all("/\[[^\]]*\]/", $content, $matches);
				            if( $new_content){
				                echo do_shortcode( $matches[0][0] );
				            }
				            elseif (preg_match ( '#^<(script|iframe|embed|object)#i', $content )) {
				                $regex = '/https?\:\/\/[^\" ]+/i';
				                preg_match_all($regex, $ori_url[0], $matches);
				                $urls = ($matches[0]);
				                 print_r('<iframe src="'.$urls[0].'" width="100%" height="240" frameborder="no" scrolling="no"></iframe>');
				            } elseif (0 === strpos( $content, 'https://' )) {
				                $embed_url = wp_oembed_get( esc_url( $ori_url[0] ) );
				                print_r($embed_url);
				            }
						?>
					</div>
				</div>
			<?php
		}
		elseif ($post_format == 'gallery') {
			//Get the alt and title of the image
				$post_thumbnail_id = get_post_thumbnail_id( $post_id );
				$attachment =  get_post($post_thumbnail_id);
				$gallery = get_post_gallery( $post_id, false );
                 $ids = explode( ",", $gallery['ids'] );
						if( $ids ) {
							?>
						<div class="post-gallery">
							<?php foreach ( $ids as $key => $images ) {
							$link   = wp_get_attachment_url( $images ); ?>
								<div class="post-gallery-item">
									<div class="post-gallery-item-holder" style="background-image: url('<?php echo esc_url( $link); ?>');" alt= "<?php echo esc_attr( $attachment->post_excerpt );?>">
									</div>
								</div>
							<?php
							}
							?>
						</div>
					<?php
						
			}
		}
		else
		{
					if( has_post_thumbnail()) { ?>
						<div class="post-image-content">
							<figure class="post-featured-image">
								<a href="<?php the_permalink();?>" title="<?php echo the_title_attribute('echo=0'); ?>">
								<?php the_post_thumbnail('blog-image'); ?>
								</a>
							</figure><!-- end.post-featured-image  -->
						</div> <!-- end.post-image-content -->
		<?php
					}

		}
}
}

if (! function_exists('pasal_ecommerce_author_description')) {
	function pasal_ecommerce_author_description($author_id) {
		$author_name = get_the_author_meta( 'display_name' );
        $author_firstname = get_the_author_meta( 'first_name' );
        $author_lastname = get_the_author_meta( 'last_name' );
        $author_id = get_the_author_meta( 'ID' );
        $author_description = get_the_author_meta('description', $author_id);
        $author_image = get_avatar($author_id);
		?>
		 <div class="author-bio">
            <div class="row">
                <div class="col-md-2">
                    <div class="author-image">
                        <?php echo wp_kses_post($author_image); ?>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="author-desc">
                        <span class="author-name"><a href="<?php echo esc_url(get_author_posts_url( $author_id));?>"><?php if ( $author_firstname && $author_lastname ) { ?><?php echo esc_html($author_firstname). ' ' . esc_html( $author_lastname); ?><?php } else { echo esc_html($author_name);}?></a></span>
                        <?php if ($author_description) { ?>
                            <p><?php echo wp_kses_post($author_description); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}
if (!function_exists('pasal_ecommerce_check_sidebar')) :
function pasal_ecommerce_check_sidebar(){
        $col = 0;
        if ( in_array('layout-pro/layout-pro.php', apply_filters('active_plugins', get_option('active_plugins'))) && is_active_sidebar('layout_pro_left_sidebar')) {
        $col = $col + 4;
    }
    if( is_active_sidebar('pasal_ecommerce_main_sidebar')){
            $col = $col + 4;
    }
    return $col;
}
endif;




if (!function_exists('pasal_ecommerce_breadcrumb')) {
function pasal_ecommerce_breadcrumb()
{
    $header_image = get_header_image();
    $blog = get_option('show_on_front');
    $blog_page = get_option('page_for_posts');
    $current_author = get_user_by( 'slug', get_query_var( 'author_name' ) );
    ?>
    <div class="inner-banner-wrap"
         <?php if ($header_image) { ?>style="background-image:url(<?php echo esc_url($header_image); ?>)"<?php } ?>>
        <div class="container">
            <div class="row">
                <div class="inner-banner-content">
                    <?php
                    if (is_archive()) {
                        the_archive_title('<h2>', '</h2>');
                    }
                    if ((is_single() || is_page()) && !isset($_GET['rl_favorite'])) {
                        the_title('<h2>', '</h2>');
                    }
                    ?>

                    <div class="header-breadcrumb">

                        <?php
                        if( in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) ) {
                            woocommerce_breadcrumb();
                        }
                        elseif(($blog=='page') && !is_front_page() && is_home()){
                            echo '<h2>'.esc_html(get_the_title($blog_page)).'</h2>';
                        }

                                            else{

                            $delimiter = '';
                            $home = esc_html__( 'Home', 'pasal-ecommerce' ); // text for the 'Home' link
                            $before = '<li>'; // tag before the current crumb
                            $after = '</li>'; // tag after the current crumb
                            echo '<ul class="breadcrumb">';
                            global $post;
                            $homeLink = home_url();
                            echo '<li><a href="' . esc_url($homeLink) . '">' . esc_html($home) . '</a></li>' . wp_kses_post($delimiter) . ' ';
                            if ( is_category() ) {
                                global $wp_query;
                                $cat_obj = $wp_query->get_queried_object();
                                $thisCat = $cat_obj->term_id;
                                $thisCat = get_category( $thisCat );
                                $parentCat = get_category( $thisCat->parent );
                                if ($thisCat->parent != 0)
                                    echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
                                echo wp_kses_post($before) . single_cat_title('', false) . wp_kses_post($after);
                            } elseif (is_day()) {
                                echo '<li><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_attr( get_the_time( 'Y' ) ) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                                echo '<li><a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) )) . '">' . esc_attr( get_the_time('F') ) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                                echo wp_kses_post($before) . esc_attr( get_the_time( 'd' ) ) . wp_kses_post($after);
                            } elseif ( is_month() ) {
                                echo '<li><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_attr( get_the_time( 'Y' ) ) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                                echo wp_kses_post($before) . esc_attr( get_the_time('F') ) . wp_kses_post($after);
                            } elseif ( is_year() ) {
                                echo wp_kses_post($before) . esc_attr( get_the_time( 'Y' ) ) . wp_kses_post($after);
                            } elseif ( is_single() && !is_attachment() ) {
                                if ( get_post_type() != 'post' ) {
                                    $post_type = get_post_type_object( get_post_type() );
                                    $slug = $post_type->rewrite;
                                    echo '<li><a href="' . esc_url( $homeLink ) . '/' . esc_attr($slug['slug']) . '/">' . esc_html($post_type->labels->singular_name) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                                    echo wp_kses_post($before) . esc_html( get_the_title() ) . wp_kses_post($after);
                                } else {
                                    $cat = get_the_category();
                                    $cat = $cat[0];
                                    //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                                    echo wp_kses_post($before) . esc_html( get_the_title() ) . wp_kses_post($after);
                                }

                            } elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
                                $post_type = get_post_type_object(get_post_type());
                                if(!empty($post_type)){
                                    echo wp_kses_post($before) . esc_html($post_type->labels->singular_name) . wp_kses_post($after);
                                }
                            } elseif (is_attachment()) {
                                $parent = get_post($post->post_parent);
                                $cat = get_the_category($parent->ID);
                                echo '<li><a href="' . esc_url(get_permalink($parent)) . '">' . esc_html( $parent->post_title ) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                                echo wp_kses_post($before) . esc_attr( get_the_title() ) . wp_kses_post($after);
                            } elseif ( is_page() && !$post->post_parent ) {
                                echo wp_kses_post($before) . esc_attr( get_the_title() ) . wp_kses_post($after);
                            } elseif ( is_page() && $post->post_parent ) {
                                $parent_id = $post->post_parent;
                                $breadcrumbs = array();
                                while ( $parent_id ) {
                                    $page = get_page($parent_id);
                                    $breadcrumbs[] = '<li><a href="' . esc_url( get_permalink($page->ID) ) . '">' . esc_html(get_the_title($page->ID)) . '</a></li>';
                                    $parent_id = $page->post_parent;
                                }
                                $breadcrumbs = array_reverse($breadcrumbs);
                                foreach ($breadcrumbs as $crumb)
                                    echo wp_kses_post($crumb) . ' ' . wp_kses_post($delimiter) . ' ';
                                echo wp_kses_post($before) . esc_html(get_the_title()) . wp_kses_post($after);
                            } elseif ( is_search() ) {
                                echo wp_kses_post($before) . esc_html__( "Search results for:&nbsp;","pasal-ecommerce" )  .'"'. esc_html(get_search_query()) . '"' . wp_kses_post($after);

                            } elseif ( is_tag() ) {
                                echo wp_kses_post($before) . esc_html__( 'Tag','pasal-ecommerce' ) . single_tag_title( '', false ) . wp_kses_post($after);
                            } elseif ( is_author() ) {
                                global $author;
                                $userdata = get_userdata( $author );
                                echo wp_kses_post($before) . esc_html__( "Articles posted by","pasal-ecommerce" ) .' '. esc_html($userdata->display_name) . wp_kses_post($after);
                            } elseif (is_404()) {
                                echo wp_kses_post($before) . esc_html__( "Error 404","pasal-ecommerce" ) . wp_kses_post($after);
                            }
                                 elseif ( is_page_template('page-templates/template-contact.php')) {
                                echo wp_kses_post($before) . esc_attr( get_the_title() ) . wp_kses_post($after);
                            }
                            }

                        echo '</ul>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
}
