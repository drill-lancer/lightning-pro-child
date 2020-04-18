<?php
/**
 * Comment Before Action Function of Lightning Pro Child
 *
 * @package Lightning Pro Child
 */

/**
 * Add Actions into Comment Before
 */
function lightning_comment_before_action() {
	get_template_part( 'template-parts/relate', get_post_type() );
	if ( is_active_sidebar( 'comment_before' ) ) {
		dynamic_sidebar( 'comment_before' );
	}
}
add_action( 'lightning_comment_before', 'lightning_comment_before_action' );
