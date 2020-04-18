<?php
/**
 * Comment After Action Function of Lightning Pro Child
 *
 * @package Lightning Pro Child
 */

/**
 * Add Actions into Comment After
 */
function lightning_comment_after_action() {
	if ( is_active_sidebar( 'comment_after' ) ) {
		dynamic_sidebar( 'comment_after' );
	}
}
add_action( 'lightning_comment_after', 'lightning_comment_after_action' );
