<?php
/**
 * Output Attributes Functions of Lightning Pro Child
 *
 * @package Lightning Pro Child
 */

/**
 * My Lightning IS Get the Class Name.
 *
 * @param string $class_names classes.
 */
function my_lightning_get_the_class_names( $class_names ) {
	$class_names['mainSection']   = 'mainSection';
	$class_names['sideSection-1'] = 'subSection sideSection sidebar-1';
	$class_names['sideSection-2'] = 'subSection sideSection sidebar-2';
	$options                      = get_option( 'lightning_theme_options' );

	if ( lightning_is_layout_onecolumn() ) {
		if ( lightning_is_subsection_display() ) {
			$class_names['siteContent'] .= ' one-column';
		} else {
			$class_names['siteContent'] .= ' one-column-no-sidebar';
		}
	} elseif ( lightning_is_layout_two_column() ) {
		// 2 column
		// sidebar-position.
		if ( isset( $options['sidebar_position'] ) && 'left' === $options['sidebar_position'] ) {
			$class_names['siteContent'] .= ' two-column-left';
		} else {
			$class_names['siteContent'] .= ' two-column-right';
		}
	} else {
		if ( isset( $options['sidebar_position'] ) && 'left' === $options['sidebar_position'] ) {
			$class_names['siteContent'] .= ' three-column-lr-l';
		} else {
			$class_names['siteContent'] .= ' three-column-lr-r';
		}
	}
	return $class_names;
}
add_filter( 'lightning_get_the_class_names', 'my_lightning_get_the_class_names' );
