<?php
/**
 * Main Section Prepend Action Function of Lightning Pro Child
 *
 * @package Lightning Pro Child
 */

/**
 * Add Actions into Main Section Preend
 */
function lightning_main_section_prepend_action() {
	if ( is_active_sidebar( 'main-section-prepend' ) ) {
		dynamic_sidebar( 'main-section-prepend' );
	}
}
add_action( 'lightning_mainSection_prepend', 'lightning_main_section_prepend_action' );
