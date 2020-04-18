<?php
/**
 * Relate Posts of Lightning Pro Child
 *
 * @package Lightning Pro Child
 */

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
?>
<div class="relate-outer">
	<div class="mainSection-title relate-header">関連記事</div>
	<div class="relate-body">
		<div class="<?php lightning_the_class_name( 'postList' ); ?>">

			<?php
			if ( $relate_query->have_posts() ) :
				if ( apply_filters( 'is_lightning_extend_relate_loop', false ) ) :
					do_action( 'lightning_extend_relate_loop' );
				else :
					$count = 0;
					while ( $relate_query->have_posts() ) :
						$relate_query->the_post();
						get_template_part( 'template-parts/post/loop', $loop_post_type['slug'] );
						$count++;
						do_action( 'lightning_default_relate_infeed' );
					endwhile;
				endif;
				wp_reset_postdata();
				the_posts_pagination(
					array(
						'mid_size'           => 1,
						'prev_text'          => '&laquo;',
						'next_text'          => '&raquo;',
						'type'               => 'list',
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lightning-pro' ) . ' </span>',
					)
				);
			else :
				?>
				<div class="well">
					<p><?php echo wp_kses_post( apply_filters( 'lightning_no_posts_text', __( 'No posts.', 'lightning-pro' ) ) ); ?></p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
