<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.2
 */

defined('ABSPATH') || exit;

get_header('shop');
$columns      = get_option( 'woocommerce_catalog_columns', 4 );
$pasal_ecommerce_settings = pasal_ecommerce_get_theme_options();
$check_sidebar = $pasal_ecommerce_settings['pasal_ecommerce_sidebar_display'];
$sidebar_status = $pasal_ecommerce_settings['pasal_ecommerce_sidebar_status'];
$content_col = 12;
if(is_active_sidebar('pasal_ecommerce_woocommerce_sidebar') && ($sidebar_status == 'show-sidebar'))
$content_col = 12 - 4;
?>
    <div class="sec-content section">
        <div class="container">
            <div class="row">
                <div class="col-md-<?php echo esc_attr($content_col); ?>">
                <?php
                    /**
                     * Hook: woocommerce_before_main_content.
                     *
                     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                     * @hooked woocommerce_breadcrumb - 20
                     * @hooked WC_Structured_Data::generate_website_data() - 30
                     */
                    do_action('woocommerce_before_main_content');

                    ?>
                    <header class="woocommerce-products-header">
                        <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
                            <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
                        <?php endif; ?>

                        <?php
                        /**
                         * Hook: woocommerce_archive_description.
                         *
                         * @hooked woocommerce_taxonomy_archive_description - 10
                         * @hooked woocommerce_product_archive_description - 10
                         */
                        do_action('woocommerce_archive_description');
                        ?>
                    </header>
                    <?php
                    if (woocommerce_product_loop()) {

                        /**
                         * Hook: woocommerce_before_shop_loop.
                         *
                         * @hooked wc_print_notices - 10
                         * @hooked woocommerce_result_count - 20
                         * @hooked woocommerce_catalog_ordering - 30
                         */
                        do_action('woocommerce_before_shop_loop');

                        woocommerce_product_loop_start();
                        $loop = 1;
                        if (wc_get_loop_prop('total')) {
                            while (have_posts()) {
                                the_post();

                                /**
                                 * Hook: woocommerce_shop_loop.
                                 *
                                 * @hooked WC_Structured_Data::generate_product_data() - 10
                                 */
                                do_action('woocommerce_shop_loop');
                                if( $loop == 1)
                                echo '<div class="row">';
                                wc_get_template_part('content', 'product');
                                $loop++;
                                if($loop>$columns){
                                    echo '</div>';
                                    $loop = 1;
                                }
                            }
                        }

                        woocommerce_product_loop_end();

                        /**
                         * Hook: woocommerce_after_shop_loop.
                         *
                         * @hooked woocommerce_pagination - 10
                         */
                        do_action('woocommerce_after_shop_loop');
                    } else {
                        /**
                         * Hook: woocommerce_no_products_found.
                         *
                         * @hooked wc_no_products_found - 10
                         */
                        do_action('woocommerce_no_products_found');
                    }

                    /**
                     * Hook: woocommerce_after_main_content.
                     *
                     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                     */
                    do_action('woocommerce_after_main_content');

                    /**
                     * Hook: woocommerce_sidebar.
                     *
                     * @hooked woocommerce_get_sidebar - 10
                     */

                    ?>
                    <?php
                    if (($content_col != 12)) {
                        if (is_active_sidebar('pasal_ecommerce_woocommerce_sidebar') && ($sidebar_status == 'show-sidebar')) {
                            echo '<div class="col-md-4">';
                            dynamic_sidebar('pasal_ecommerce_woocommerce_sidebar');
                            echo '</div>';
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
<?php

get_footer('shop');
