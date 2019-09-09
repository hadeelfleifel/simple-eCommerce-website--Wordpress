<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pasal-ecommerce
 */

get_header();
$pasal_ecommerce_settings = pasal_ecommerce_get_theme_options();
$check_sidebar = $pasal_ecommerce_settings['pasal_ecommerce_sidebar_display'];
$sidebar_status = $pasal_ecommerce_settings['pasal_ecommerce_sidebar_status'];
$col = pasal_ecommerce_check_sidebar();
$content_col = 12 - $col;
if(($sidebar_status == 'hide-sidebar'))
    $content_col = 12;
?>
    <div class="sec-content section">
        <div class="container">
            <div class="row">
                <?php
                if ($col != 12) {
                    if (in_array('layout-pro/layout-pro.php', apply_filters('active_plugins', get_option('active_plugins'))) && is_active_sidebar('layout_pro_left_sidebar')  && ($sidebar_status == 'show-sidebar') ) {
                        echo '<div class="col-md-4">';
                        dynamic_sidebar('layout_pro_left_sidebar');
                        echo '</div>';
                    }
                }
                ?>
                <div class="col-md-<?php echo esc_attr($content_col); ?>">
                    <main id="main" class="site-main">

                        <?php
                        if (have_posts()) :

                            if (is_home() && !is_front_page()) : ?>
                                <header>
                                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                </header>

                                <?php
                            endif;

                            /* Start the Loop */
                            while (have_posts()) : the_post();

                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part('template-parts/content', get_post_format());

                            endwhile;

                            the_posts_navigation();

                        else :

                            get_template_part('template-parts/content', 'none');

                        endif; ?>

                    </main><!-- #main -->
                </div>
                <?php
                if ($col != 12) {
                    if (is_active_sidebar('pasal_ecommerce_main_sidebar')  && ($sidebar_status == 'show-sidebar') ) {
                        echo '<div class="col-md-4">';
                        dynamic_sidebar('pasal_ecommerce_main_sidebar');
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
<?php
get_footer();
