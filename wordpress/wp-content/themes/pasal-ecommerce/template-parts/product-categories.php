<?php
$pasal_ecommerce_settings = pasal_ecommerce_get_theme_options();
$pasal_ecommerce_product_cat_lists = !empty($pasal_ecommerce_settings['pasal_ecommerce_product_cat_lists']) ? $pasal_ecommerce_settings['pasal_ecommerce_product_cat_lists'] : array();
$pasal_ecommerce_product_cat_title = !empty($pasal_ecommerce_settings['pasal_ecommerce_product_cat_title']) ? $pasal_ecommerce_settings['pasal_ecommerce_product_cat_title'] : array();

if (count($pasal_ecommerce_product_cat_lists) > 0) {
?>
<div class="pasal-product-categories">
    <div class="container">
        <?php if (!empty($pasal_ecommerce_product_cat_title)): ?>
            <div class="featured-title txt-center">
                <h2><?php echo esc_html($pasal_ecommerce_product_cat_title); ?></h2></div>
        <?php endif;
        $product_category_post_count = count($pasal_ecommerce_product_cat_lists);
        if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) && (!empty($pasal_ecommerce_product_cat_lists[0]))):
            $prefix = '';
            $product_cat_ids = '';
            for ($i = 0; $i < $product_category_post_count; $i++) {
                if (empty($pasal_ecommerce_product_cat_lists[$i])) {
                    break;
                }
                $product_cat_ids .= $prefix . $pasal_ecommerce_product_cat_lists[$i];
                $prefix = ',';
            }
            echo do_shortcode('[product_categories number="4" columns="4" ids ="' . esc_html($product_cat_ids) . '" ]');
        endif; ?>
    </div>
</div>
<?php
}