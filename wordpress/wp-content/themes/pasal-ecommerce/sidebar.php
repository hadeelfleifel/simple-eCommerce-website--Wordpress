<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pasal-ecommerce
 */

if ( ! is_active_sidebar( 'pasal_ecommerce_main_sidebar' ) ) {
    return;
}
?>

<aside class="widget-area">
    <?php dynamic_sidebar( 'pasal_ecommerce_main_sidebar' ); ?>
</aside><!-- #secondary -->
