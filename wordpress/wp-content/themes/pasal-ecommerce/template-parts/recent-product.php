<?php $pasal_ecommerce_settings = pasal_ecommerce_get_theme_options();
$shortcode = $pasal_ecommerce_settings['pasal_ecommerce_product_recent_prod_shortcode'];
?>
<div class="pasal-recent-product">
    <div class="container">
        <?php
        $pasal_ecommerce_product_recent_prod_title = $pasal_ecommerce_settings['pasal_ecommerce_product_recent_prod_title'];
        if (!empty($pasal_ecommerce_product_recent_prod_title)): ?>
            <div class="featured-title txt-center">
                <h2><?php echo esc_html($pasal_ecommerce_product_recent_prod_title); ?></h2></div>
        <?php
        endif;
        if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))):
            if($shortcode)
            echo do_shortcode($shortcode);
        endif; ?>
    </div>
</div>