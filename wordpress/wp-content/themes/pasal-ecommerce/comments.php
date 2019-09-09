<?php
/**
 * The template for displaying comments.
 *
 * @package Pasal-ecommerce
 * @since Pasal Ecommerce 1.0
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
	<h2 class="comments-title">
		<?php
				$comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'pasal-ecommerce' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s Reply to &ldquo;%2$s&rdquo;',
							'%1$s Replies to &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'pasal-ecommerce'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
	</h2>
	<?php //pasal_ecommerce_comment_nav(); ?>
	<?php 
	if ( ! function_exists( 'pasal_ecomerce_default_comment' ) ) {
	function pasal_ecomerce_default_comment(){
		$comment_args = array(
            'prev_text'          => esc_attr( 'Older comments', 'pasal-ecommerce' ),
            'next_text'          => esc_attr( 'Newer comments', 'pasal-ecommerce' ),
            'screen_reader_text' => ''
        );
		return the_comments_navigation( $comment_args );
		}
	}

	pasal_ecomerce_default_comment();
	?>
	<ol class="comment-list">
	<?php
		wp_list_comments( array(
			'style'       => 'ol',
			'short_ping'  => true,
			'avatar_size' => 56,
		) );
	?>
	</ol> <!-- .comment-list -->
	<?php //pasal_ecommerce_comment_nav();
	pasal_ecomerce_default_comment();
	
	 ?>
	<?php endif; // have_comments() ?>
	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	<p class="no-comments">
	<?php esc_html_e( 'Comments are closed.', 'pasal-ecommerce' ); ?>
	</p>
	<?php endif; ?>
	<?php comment_form(); ?>
</div> <!-- .comments-area -->