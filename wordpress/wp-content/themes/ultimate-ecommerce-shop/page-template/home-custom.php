<?php
/**
 * Template Name: Home Custom Page
 */
?>

<?php get_header(); ?>

<?php do_action( 'ultimate_ecommerce_shop_above_slider' ); ?>

<?php /** slider section **/ ?>
<?php if( get_theme_mod('ultimate_ecommerce_shop_slider_hide') != ''){ ?>
  <section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel"> 
      <?php $pages = array();
        for ( $count = 1; $count <= 3; $count++ ) {
          $mod = intval( get_theme_mod( 'ultimate_ecommerce_shop_slidersettings_page' . $count ));
          if ( 'page-none-selected' != $mod ) {
            $pages[] = $mod;
          }
        }
        if( !empty($pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
      ?>
      <div class="carousel-inner" role="listbox">
        <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <img src="<?php the_post_thumbnail_url('full'); ?>"/>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <h2><?php the_title(); ?></h2>
                <!-- <p><?php the_excerpt();?></p> -->
                <div class="more-btn">              
                  <a href="<?php the_permalink(); ?>"><?php esc_html_e('EXPLORE NOW','ultimate-ecommerce-shop'); ?></a>
                </div>
              </div>
            </div>
          </div>
        <?php $i++; endwhile; 
        wp_reset_postdata();?>
      </div>
      <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
      endif;?>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-left"></i></span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-right"></i></i></span>
      </a>
    </div>  
    <div class="clearfix"></div>
  </section>
<?php }?>

<?php do_action( 'ultimate_ecommerce_shop_after_slider' ); ?>

<?php if( get_theme_mod('ultimate_ecommerce_shop_product_title') != ''){ ?>
  <section id="top_products">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <?php $pages = array();
            $mod = intval( get_theme_mod( 'ultimate_ecommerce_shop_product_title'));
            if ( 'page-none-selected' != $mod ) {
              $pages[] = $mod;
            }
          if( !empty($pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="title-sec">
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <p><?php the_excerpt(); ?></p>
                </div>
              <?php endwhile; 
              wp_reset_postdata();?>
            <?php else : ?>
            <div class="no-postfound"></div>
            <?php endif;
          endif;?>
        </div>
        <div class="col-lg-9 col-md-9">
          <?php $pages = array();
            
            $mod = absint( get_theme_mod( 'ultimate_ecommerce_shop_top_products' ));
              if ( 'page-none-selected' != $mod ) {
                $pages[] = $mod;
              }
            if( !empty($pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                while ( $query->have_posts() ) : $query->the_post(); ?>
                  <?php the_content(); ?>
                <?php endwhile; ?>
              <?php else : ?>
                <div class="no-postfound"></div>
            <?php endif;
          endif;
          wp_reset_postdata()?>
        </div>
      </div>
    </div>
  </section>
<?php }?>

<?php do_action( 'ultimate_ecommerce_shop_below_top_product' ); ?>

<div id="main-content" class="container-fluid">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>