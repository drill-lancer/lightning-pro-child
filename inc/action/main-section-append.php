<?php
/**
 * Main Section Apppend Action Function of Lightning Pro Child
 *
 * @package Lightning Pro Child
 */

/**
 * Add Actions into Main Section Append
 */
function lightning_main_section_append_action() {
	if ( is_active_sidebar( 'main-section-append' ) ) {
		dynamic_sidebar( 'main-section-append' );
	}
}
add_action( 'lightning_mainSection_append', 'lightning_main_section_append_action' );
