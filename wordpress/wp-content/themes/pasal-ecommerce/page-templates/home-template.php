<?php
/**
 *
 *
 * Template Name: Home
 *
 **/
get_header();
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    get_template_part('template-parts/product', 'categories');
    get_template_part('template-parts/recent', 'product');
}
get_template_part('template-parts/cta', 'section');
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))))
    get_template_part('template-parts/feature', 'product');
get_template_part('template-parts/blog', 'section');

get_footer();