<?php
/**
 * Extend Relate Loop of Lightning Pro Child
 *
 * @package Lightning Pro Child
 */

/**
 * 標準のループをオフにする
 *
 * @param bool $change ループを変えるか否か.
 */
function my_is_lightning_extend_relate_loop( $change ) {
	return false;
}
add_filter( 'is_lightning_extend_relate_loop', 'my_is_lightning_extend_relate_loop' );

/**
 * 改変するループを挿入する
 */
function my_lightning_extend_relate_loop() {
	$loop_type      = 'relate';
	$loop_post_type = lightning_get_post_type();
	$taxonomies     = get_the_taxonomies();
	if ( $taxonomies ) {
		foreach ( $taxonomies as $key => $value ) {
			if ( 'product_type' !== $key ) {
				$relate_taxonomy = $key;
				break;
			}
		}
	}
	$terms        = get_the_terms( get_the_ID(), $relate_taxonomy );
	$relate_args  = array(
		'post_type'    => get_post_type(),
		'post__not_in' => array( get_the_ID() ),
		'tax_query'    => array(
			array(
				'taxonomy' => $relate_taxonomy,
				'terms'    => $terms[0]->term_id,
			),
		),
	);
	$relate_query = new WP_Query( $relate_args );

	// 一つの投稿のオプション.
	$options_loop = array(
		'class_loop_outer' => '',
	);
	$options      = array(
		'layout'                     => 'media',
		'display_image'              => true,
		'display_image_overlay_term' => true,
		'display_excerpt'            => true,
		'display_date'               => true,
		'display_new'                => true,
		'display_btn'                => true,
		'image_default_url'          => false,
		'overlay'                    => false,
		'btn_text'                   => __( 'Read more', 'lightning' ),
		'btn_align'                  => 'text-right',
		'new_text'                   => __( 'New!!', 'lightning' ),
		'new_date'                   => 7,
		'class_outer'                => 'vk_post-col-xs-12 vk_post-col-sm-12 vk_post-col-md-12 vk_post-col-lg-12 vk_post-col-xl-12',
	);
	VK_Component_Posts_Relate::the_loop( $relate_query, $options, $options_loop, $loop_type );

}
add_action( 'lightning_extend_relate_loop', 'my_lightning_extend_relate_loop' );
