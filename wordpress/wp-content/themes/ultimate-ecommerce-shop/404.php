<?php
/**
 * Display 404 page
 * @package Ultimate Ecommerce Shop
 */

get_header(); ?>

<div id="main-content">
    <div class="container-fluid">
        <h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'ultimate-ecommerce-shop' ), esc_html__( 'Not Found', 'ultimate-ecommerce-shop' ) ) ?></h1>
        <p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn', 'ultimate-ecommerce-shop' ); ?></p>
        <p class="text-404"><?php esc_html_e( 'Dont worry it happens to the best of us.', 'ultimate-ecommerce-shop' ); ?></p>
        <div class="read-moresec">
            <a href="<?php echo esc_url( home_url() ); ?>" class="button hvr-sweep-to-right"><?php esc_html_e( 'Return to the home page', 'ultimate-ecommerce-shop' ); ?></a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php get_footer(); ?>