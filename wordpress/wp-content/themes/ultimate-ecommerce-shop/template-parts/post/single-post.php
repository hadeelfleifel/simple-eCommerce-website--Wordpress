<?php
/**
 * The template part for displaying Single Post
 * @package Ultimate Ecommerce Shop 
 * @subpackage ultimate_ecommerce_shop
 * @since 1.0
 */
?>
<h1><?php the_title();?></h1>
<div class="adminbox">
	<i class="fas fa-calendar-alt"></i><span class="entry-date"><?php echo esc_html( get_the_date() ); ?></span>
	<i class="fas fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
	<i class="fas fa-comments"></i><span class="entry-comments"> <?php comments_number( __('0 Comment', 'ultimate-ecommerce-shop'), __('0 Comments', 'ultimate-ecommerce-shop'), __('% Comments', 'ultimate-ecommerce-shop') ); ?> </span>
</div>
<?php if(has_post_thumbnail()) { ?>
	<hr>
	<div class="feature-box">	
		<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
	</div>
	<hr>
<?php } 
the_content();

wp_link_pages( array(
	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'ultimate-ecommerce-shop' ) . '</span>',
	'after'       => '</div>',
	'link_before' => '<span>',
	'link_after'  => '</span>',
	'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'ultimate-ecommerce-shop' ) . ' </span>%',
	'separator'   => '<span class="screen-reader-text">, </span>',
) );
	
if ( is_singular( 'attachment' ) ) {
	// Parent post navigation.
	the_post_navigation( array(
		'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'ultimate-ecommerce-shop' ),
	) );
} elseif ( is_singular( 'post' ) ) {
	// Previous/next post navigation.
	the_post_navigation( array(
		'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next page', 'ultimate-ecommerce-shop' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Next post:', 'ultimate-ecommerce-shop' ) . '</span> ' .
			'<span class="post-title">%title</span>',
		'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous page', 'ultimate-ecommerce-shop' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Previous post:', 'ultimate-ecommerce-shop' ) . '</span> ' .
			'<span class="post-title">%title</span>',
	) );
}

echo '<div class="clearfix"></div>';

the_tags();

if ( comments_open() || get_comments_number() ) {
	comments_template();
}
?>
<?php edit_post_link( __( 'Edit', 'ultimate-ecommerce-shop' ), '<span class="edit-link">', '</span>' ); ?>