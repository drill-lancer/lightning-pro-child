<?php
/**
 * 3 Column Layout Setting Functions of Lightning Pro Child
 *
 * @package Lightning Pro Child
 */

/**
 * Lightning is Layout Three Column.
 *
 * @since Lightning 9.0.0
 * @return boolean
 */
function lightning_is_layout_three_column() {
	return ! lightning_is_layout_onecolumn() && ! lightning_is_layout_two_column();
}

