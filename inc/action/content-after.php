<?php
/**
 * Content After Action Function of Lightning Pro Child
 *
 * @package Lightning Pro Child
 */

/**
 * Add Actions into The Content After
 */
function lightning_content_after_action() {
	if ( is_active_sidebar( 'content_after' ) ) {
		dynamic_sidebar( 'content_after' );
	}
}
add_action( 'lightning_content_after', 'lightning_content_after_action' );
