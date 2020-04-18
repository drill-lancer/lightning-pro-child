<?php
/**
 * After Setup Theme Functions of Lightning Pro Child
 *
 * @package Lightning Pro Child
 */

/**
 * Lightning After Setup Theme.
 */
function lightning_after_setup_theme() {
	if ( function_exists( 'lmu_do_loop_layout_change_bs4' ) && function_exists( 'my_media_post_bs4_loop' ) ) {
		remove_action( 'lightning_extend_loop', 'lmu_do_loop_layout_change_bs4' );
	}
}
add_action( 'after_setup_theme', 'lightning_after_setup_theme' );
