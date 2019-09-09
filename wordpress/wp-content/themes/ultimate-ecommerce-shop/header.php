<?php
/**
 * Display Header.
 * @package Ultimate Ecommerce Shop
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'ultimate-ecommerce-shop' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
  get_template_part( 'template-parts/header/top', 'bar' );

  get_template_part( 'template-parts/header/site', 'branding' );
  
?>
  <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','ultimate-ecommerce-shop'); ?></a></div>
<?php

  get_template_part( 'template-parts/navigation/site', 'nav' );
  
?>