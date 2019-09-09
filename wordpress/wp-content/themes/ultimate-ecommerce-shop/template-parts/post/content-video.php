<?php
/**
 * The template part for displaying Video
 * @package Ultimate Ecommerce Shop 
 * @subpackage ultimate_ecommerce_shop
 * @since 1.0
 */
?>

<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $video = false;

  // Only get video from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
  }
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-wrap">
    <div class="box-image">
      <?php
        if ( ! is_single() ) {

          // If not a single post, highlight the video file.
          if ( ! empty( $video ) ) {
            foreach ( $video as $video_html ) {
              echo '<div class="entry-video">';
                echo $video_html;
              echo '</div>';
            }
          };?>
        <span class="entry-date"><?php the_date(); ?></span>
      <?php };?>
    </div>    
    <div class="post-main">
      <h3 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h3>
      <div class="adminbox">        
        <i class="fas fa-user"></i><span class="entry-author"> <?php the_author(); ?> </span>
        <i class="fas fa-comments"></i><span class="entry-comments"><?php comments_number( __('0 Comments','ultimate-ecommerce-shop'), __('0 Comments','ultimate-ecommerce-shop'), __('0 % Comments','ultimate-ecommerce-shop')); ?>
        </span>
      </div>    
      <div class="new-text">
        <?php the_excerpt();?>
      </div>
      <div class="continue-read">
        <a href="<?php the_permalink(); ?>"><span><?php esc_html_e('READ MORE...','ultimate-ecommerce-shop'); ?></span></a>
      </div>
    </div>
  </div>
</div>