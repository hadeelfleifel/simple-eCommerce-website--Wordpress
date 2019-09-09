<?php
/**
 * @package Pasal-ecommerce
 * @since Pasal Ecommerce 1.0
 */
?>
<?php
/************************* Pasal Ecommerce FOOTER DETAILS **************************************/
if (! function_exists('pasal_ecommerce_site_footer')) {
	function pasal_ecommerce_site_footer() {
		$pasal_ecommerce_settings = pasal_ecommerce_get_theme_options();
		if ( is_active_sidebar( 'pasal_ecommerce_footer_options' ) ) :
			dynamic_sidebar( 'pasal_ecommerce_footer_options' );
		else:
			echo '<div class="copyright">';
			echo esc_html__('Theme by ', 'pasal-ecommerce');
		 	echo '<a href="'.esc_url('https://codethemes.co/').'" target="_blank">'. ' ' .esc_html__('Code Themes', 'pasal-ecommerce').'</a>';
		 	 ?>
		</div>
		<?php endif;
	}
	add_action( 'pasal_ecommerce_sitegenerator_footer', 'pasal_ecommerce_site_footer');
}