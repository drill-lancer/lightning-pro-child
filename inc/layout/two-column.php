<?php
/**
 * 2 column Layout Setting Functions of Lightning Pro Child
 *
 * @package Lightning Pro Child
 */

/**
 * Lightning is Layout Two Column.
 *
 * @since Lightning 9.0.0
 * @return boolean
 */
function lightning_is_layout_two_column() {
	$two_column = false;
	$options    = get_option( 'lightning_theme_options' );
	global $wp_query;
	$array = lightning_layout_target_array();

	foreach ( $array as $key => $value ) {
		if ( call_user_func( $value['function'] ) ) {
			if ( isset( $options['layout'][ $key ] ) ) {
				if ( 'col-two' === $options['layout'][ $key ] ) {
					$two_column = true;
				}
			}
		}
	}

	if ( is_front_page() ) {
		if ( isset( $options['layout']['front-page'] ) ) {
			if ( 'col-two' === $options['layout']['front-page'] ) {
				$two_column = true;
			}
		}
	} elseif ( is_home() && ! is_front_page() ) {

		if ( isset( $options['layout']['archive'] ) ) {

			if ( 'col-two' === $options['layout']['archive'] ) {

				$two_column = true;

			}
		}
	}

	if ( is_singular() ) {
		global $post;
		if ( isset( $post->_lightning_design_setting['layout'] ) ) {
			if ( 'col-two' === $post->_lightning_design_setting['layout'] ) {
				$two_column = true;
			} elseif ( 'col-one-no-subsection' === $post->_lightning_design_setting['layout'] ) {
				$two_column = false;
			} elseif ( 'col-one' === $post->_lightning_design_setting['layout'] ) {
				$two_column = false;
			} else {
				$two_column = false;
			}
		}
	}

	return apply_filters( 'lightning_is_layout_two_column', $two_column );

}
