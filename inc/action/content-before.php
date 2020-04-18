<?php
/**
 * Content Before Action Function of Lightning Pro Child
 *
 * @package Lightning Pro Child
 */

/**
 * Add Actions into The Content Bofore
 */
function lightning_content_before_action() {
	if ( is_active_sidebar( 'content_before' ) ) {
		dynamic_sidebar( 'content_before' );
	}
}
add_action( 'lightning_content_before', 'lightning_content_before_action' );
