<?php
/**
 * My VK Component Posts Class of Lightning Pro Child
 *
 * @package Lightning Pro Child
 */

if ( class_exists( 'VK_Component_Posts' ) ) {
	/**
	 * My VK Component Posts.
	 */
	class VK_Component_Posts_Relate extends VK_Component_Posts {

		/**
		 * Count
		 *
		 * @var integer $count count.
		 */
		public static $count = 0;

		/**
		 * Get Loop.
		 *
		 * @param object $wp_query WP Query.
		 * @param array  $options Options.
		 * @param array  $options_loop Loop Option.
		 */
		public static function get_loop( $wp_query, $options, $options_loop = array() ) {

			$options_loop_dafault = array(
				'class_loop_outer' => '',
			);
			$options_loop         = wp_parse_args( $options_loop, $options_loop_dafault );

			$loop        = '';
			$loop_infeed = '';
			if ( $wp_query->have_posts() ) :

				$outer_class = '';
				if ( $options_loop['class_loop_outer'] ) {
					$outer_class = ' ' . $options_loop['class_loop_outer'];
				}

				$loop .= '<div class="vk_posts' . $outer_class . '">';

				while ( $wp_query->have_posts() ) {
					$wp_query->the_post();
					global $post;
					$loop .= self::get_view( $post, $options );
					self::$count++;
					$loop .= apply_filters( 'lightning_media_relate_infeed', $loop_infeed );
				}
			endif;

			$loop .= '</div>';

			wp_reset_postdata();
			return $loop;
		}

		/**
		 * The Loop.
		 *
		 * @param object $wp_query WP Query.
		 * @param array  $options Options.
		 * @param array  $options_loop Loop Option.
		 */
		public static function the_loop( $wp_query, $options, $options_loop = array() ) {
			echo wp_kses_post( self::get_loop( $wp_query, $options, $options_loop ) );
		}
	}
}
