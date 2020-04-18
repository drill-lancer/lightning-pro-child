<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package _s
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<div class="comment-header mainSection-title">コメント</div>
	<?php if ( have_comments() ) : ?>
		<div class="comments-title">

			<?php
				printf(
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'lightning-pro' ) ),
					esc_html( number_format_i18n( get_comments_number() ) ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			?>
		</div>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through. ?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'lightning-pro' ); ?></h2>
				<div class="nav-links">

					<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'lightning-pro' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'lightning-pro' ) ); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments(
					array(
						'style'      => 'ol',
						'type'       => 'comment',
						'short_ping' => true,
					)
				);
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through. ?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'lightning-pro' ); ?></h2>
				<div class="nav-links">

					<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'lightning-pro' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'lightning-pro' ) ); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation. ?>

	<?php endif; // have_comments. ?>
	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'lightning-pro' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>
</div><!-- #comments -->
