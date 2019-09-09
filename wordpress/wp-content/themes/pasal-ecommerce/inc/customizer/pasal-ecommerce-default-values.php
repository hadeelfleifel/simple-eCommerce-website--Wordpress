<?php
if(!function_exists('pasal_ecommerce_get_option_defaults_values')):
	/******************** Pasal Ecommerce DEFAULT OPTION VALUES ******************************************/
	function pasal_ecommerce_get_option_defaults_values() {
		global $pasal_ecommerce_default_values;
		$pasal_ecommerce_default_values = array(
			'pasal_ecommerce_total_features'			=> '3',
			'pasal_ecommerce_disable_features'		=> 0,
			'pasal_ecommerce_sidebar_display'		=> 0,
			'pasal_ecommerce_design_layout' 			=> 'wide-layout',
			'pasal_ecommerce_sidebar_layout_options' => 'right',
			'pasal_ecommerce_header_display'			=> 'header_text',
			'pasal_ecommerce_categories'				=> array(),
			'pasal_ecommerce_excerpt_length'			=> '55',
			'pasal_ecommerce_reset_all' 				=> 0,
			'pasal_ecommerce_search_text' 			=> __('Search &hellip;', 'pasal-ecommerce'),
			'pasal_ecommerce_blog_content_layout'	=> '',
			'pasal_ecommerce_sidebar_status'	=> 'show-sidebar',

			/* Slider Settings */
			'pasal_ecommerce_transition_effect' 		=> 'fade',
			'pasal_ecommerce_transition_delay' 		=> '4',
			'pasal_ecommerce_transition_duration' 	=> '1',
			'pasal_ecommerce_slider_no' 				=> '4',
			'pasal_ecommerce_featured_page_slider_1' 				=> '',
			'pasal_ecommerce_featured_page_slider_2' 				=> '',
			'pasal_ecommerce_featured_page_slider_3' 				=> '',
			'pasal_ecommerce_featured_page_slider_4' 				=> '',
			'pasal_ecommerce_footer_column_section' 	=>'4',
			'pasal_ecommerce_sliderradiobox'            =>'',
			/* Front page feature */
			'pasal_ecommerce_entry_format_blog' 		=> 'show',
			'pasal_ecommerce_entry_meta_blog' 		=> 'show-meta',
			/*Top Bar */
			'pasal_ecommerce_top_bar' 				=>0,			
			/*Social Icons */
			'pasal_ecommerce_top_social_icons' 		=>0,
			'pasal_ecommerce_buttom_social_icons'	=>0,
			'pasal_ecommerce_social_facebook'		=> '',
			'pasal_ecommerce_social_twitter'			=> '',
			'pasal_ecommerce_social_pinterest'		=> '',
			'pasal_ecommerce_social_dribbble'		=> '',
			'pasal_ecommerce_social_instagram'		=> '',
			'pasal_ecommerce_social_flickr'			=> '',
			'pasal_ecommerce_social_googleplus'		=> '',
			'pasal_ecommerce_social_linkedin'		=>'',

			'pasal_ecommerce_featured_block_title' 	=> '',
			/*Contact Us */

			/*Product Cat Title*/
			'pasal_ecommerce_product_cat_title' 		   => __('Featured Categories','pasal-ecommerce'),
			'pasal_ecommerce_product_recent_prod_title' => __('Recent Products','pasal-ecommerce'),
			'pasal_ecommerce_product_recent_feat_title' => __('Featured Products','pasal-ecommerce'),
			'pasal_ecommerce_product_recent_prod_shortcode' => '[recent_products per_page="4" columns="4"]',
			'pasal_ecommerce_product_recent_feat_shortcode' => '[featured_products per_page="8" columns="4"]',
			'pasal_ecommerce_product_cat_lists' 		   => '',
			/*CTA Options*/
			'cta_title'                                   => '',
			'cta_description'                              => '',
			'cta_button'                              => '',
			'cta_link'                              => '',
			'cta_Backgroundimage'                   => '',
			/* Blog Options*/
			'blog_description'                        => '',
			);
		return apply_filters( 'pasal_ecommerce_get_option_defaults_values', $pasal_ecommerce_default_values );
	}
endif;
?>