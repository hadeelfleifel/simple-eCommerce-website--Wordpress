<?php
/**
 * Displays the searchform
 *
 * @package Pasal-ecommerce
 * @since Pasal Ecommerce 1.0
 */
?>
<form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	<?php
		$pasal_ecommerce_settings = pasal_ecommerce_get_theme_options();
		$pasal_ecommerce_search_form = $pasal_ecommerce_settings['pasal_ecommerce_search_text'];
		if($pasal_ecommerce_search_form !='Search &hellip;'): ?>
	<label>
	<input type="search" name="s" class="search-field" placeholder="<?php echo esc_attr($pasal_ecommerce_search_form); ?>" autocomplete="off"> </label>
	<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
	<?php else: ?>
	<label>	
	<input type="search" name="s" class="search-field" placeholder="<?php esc_attr_e( 'Search &hellip;', 'pasal-ecommerce' ); ?>" autocomplete="off"> </label>
	<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
	<?php endif; ?>
</form> <!-- end .search-form -->