<?php
/**
 * My Media Post BS4 Loop of Lightning Pro Child
 *
 * @package Lightning Pro Child
 */

if ( class_exists( 'VK_Component_Posts_Loop' ) ) {
	/**
	 * My Media Post BS4 Loop.
	 */
	function my_media_post_bs4_loop() {
		$vk_post_type_archive = get_option( 'vk_post_type_archive' );

		$post_type      = lightning_get_post_type();
		$post_type_slug = $post_type['slug'];
		$post_type_slug = ( is_author() ) ? 'author' : $post_type['slug'];

		$flag = lmu_is_loop_layout_change_bs4_flag_bs4( $post_type_slug );
		if ( $flag ) {

			$customize_options = $vk_post_type_archive[ $post_type_slug ];
			// Get default option.
			$customize_options_default = Lightning_Media_Posts_BS4::options_default_post_type();
			// Markge options.
			$options = wp_parse_args( $customize_options, $customize_options_default );

			$class_outer = '';
			if ( ! empty( VK_Component_Posts_Loop::get_col_size_classes( $options ) ) ) {
				$options['class_outer'] = VK_Component_Posts_Loop::get_col_size_classes( $options );
			}

			$patterns = Lightning_Media_Posts_BS4::patterns();

			$options_loop = array(
				'class_loop_outer' => 'vk_posts-postType-' . $post_type_slug . ' ' . $patterns[ $options['layout'] ]['class_posts_outer'],
			);
			global $wp_query;
			VK_Component_Posts_Loop::the_loop( $wp_query, $options, $options_loop );
		}
	}
	add_action( 'lightning_extend_loop', 'my_media_post_bs4_loop' );
}

