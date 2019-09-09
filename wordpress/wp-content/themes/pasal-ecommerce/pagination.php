<?php
/**
 * The template for displaying pagination.
 *
 * @package Pasal-ecommerce
 * @since Pasal Ecommerce 1.0
 */
$pasal_ecommerce_settings = pasal_ecommerce_get_theme_options();
if ( !class_exists( 'Jetpack') || class_exists( 'Jetpack') && !Jetpack::is_module_active( 'infinite-scroll' )){
	echo '<div class="container">';
	if ( function_exists('wp_pagenavi' ) ) :
		wp_pagenavi();
	else:
	global $wp_query;
		if ( $wp_query->max_num_pages > 1 ) : ?>
		<ul class="default-wp-page clearfix">
            <li class="previous">
                <?php previous_posts_link( __( '&laquo; Previous Page', 'pasal-ecommerce'  ) ); ?>
            </li>
			<li class="next">
				<?php next_posts_link( __( 'Next Page &raquo;', 'pasal-ecommerce'  ) ); ?>
			</li>
		</ul>
		<?php  endif;
	endif;
	echo '</div> <!-- end .container -->';
}?>