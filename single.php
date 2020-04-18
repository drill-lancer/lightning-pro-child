<?php
/**
 * Single Template of Lightning Pro Child
 *
 * @package Lightning Pro Child
 */

get_header();

if ( lightning_is_page_header_and_breadcrumb() ) {
	// Page Header.
	get_template_part( 'template-parts/page-header' );
	// BreadCrumb.
	get_template_part( 'template-parts/breadcrumb' );
}
?>

<div class="<?php lightning_the_class_name( 'siteContent' ); ?>">
	<?php do_action( 'lightning_siteContent_prepend' ); ?>
	<div class="container">
		<?php do_action( 'lightning_siteContent_container_prepend' ); ?>
		<div class="row">
			<div class="<?php lightning_the_class_name( 'mainSection' ); ?>" id="main" role="main">
				<?php
				do_action( 'lightning_mainSection_prepend' );

				if ( apply_filters( 'is_lightning_extend_single', false ) ) :
					do_action( 'lightning_extend_single' );
				else :
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class ="<?php lightning_the_class_name( 'entry-outer' ); ?>">

									<header class="<?php lightning_the_class_name( 'entry-header' ); ?> mainSection-title">
										<?php get_template_part( 'template-parts/post/meta' ); ?>
										<h1 class="entry-title"><?php the_title(); ?></h1>
									</header>

									<?php do_action( 'lightning_entry_body_before' ); ?>
									<div class="<?php lightning_the_class_name( 'entry-body' ); ?>">
										<?php
										do_action( 'lightning_content_before' );
										the_content();
										$args = array(
											'before'      => '<nav class="page-link"><dl><dt>Pages :</dt><dd>',
											'after'       => '</dd></dl></nav>',
											'link_before' => '<span class="page-numbers">',
											'link_after'  => '</span>',
											'echo'        => 1,
										);
										wp_link_pages( $args );
										do_action( 'lightning_content_after' );
										?>
									</div>
									<?php do_action( 'lightning_entry_body_after' ); ?>

									<div class="<?php lightning_the_class_name( 'entry-footer' ); ?>">

										<?php
										// Category and tax data.
										$args          = array(
											// translators: display taxonomies.
											'template' => __( '<dl><dt>%s</dt><dd>%l</dd></dl>', 'lightning-pro' ),
											'term_template' => '<a href="%1$s">%2$s</a>',
										);
										$taxonomies    = get_the_taxonomies( $post->ID, $args );
										$taxnomiesHtml = '';
										if ( $taxonomies ) {
											foreach ( $taxonomies as $key => $value ) {
												if ( 'post_tag' !== $key ) {
													$taxnomiesHtml .= '<div class="entry-meta-dataList">' . $value . '</div>';
												}
											}
										}
										$taxnomiesHtml = apply_filters( 'lightning_taxnomiesHtml', $taxnomiesHtml );
										echo wp_kses_post( $taxnomiesHtml );

										// tag list.
										$tags_list = get_the_tag_list();
										if ( $tags_list ) :
											?>
											<div class="entry-meta-dataList entry-tag">
												<dl>
												<dt><?php esc_html_e( 'Tags', 'lightning-pro' ); ?></dt>
												<dd class="tagcloud"><?php echo wp_kses_post( $tags_list ); ?></dd>
												</dl>
											</div>
										<?php endif; ?>

									</div>
								</div>
								<?php
								do_action( 'lightning_comment_before' );
								comments_template( '', true );
								do_action( 'lightning_comment_after' );
								?>
							</article>

							<?php
						endwhile;
					endif;
				endif;
				get_template_part( 'template-parts/post/next-prev' );
				do_action( 'lightning_mainSection_append' );
				?>
			</div>

			<?php if ( lightning_is_subsection_display() ) : ?>
				<div class="<?php lightning_the_class_name( 'sideSection-1' ); ?>">
					<?php get_sidebar( '1' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( lightning_is_layout_three_column() ) : ?>
				<div class="<?php lightning_the_class_name( 'sideSection-2' ); ?>">
					<?php get_sidebar( '2' ); ?>
				</div>
			<?php endif; ?>

		</div>
		<?php do_action( 'lightning_siteContent_container_append' ); ?>
	</div>
	<?php do_action( 'lightning_siteContent_append' ); ?>
</div>
<?php get_footer(); ?>
