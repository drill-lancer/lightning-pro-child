<?php
/**
 * WooCommerce Template of Lightning Pro Child
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
				<?php do_action( 'lightning_mainSection_prepend' ); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class ="<?php lightning_the_class_name( 'entry-outer' ); ?>">
						<?php do_action( 'lightning_entry_body_before' ); ?>
						<div class="<?php lightning_the_class_name( 'entry-body' ); ?>">
							<?php
							do_action( 'lightning_the_content_before' );
							woocommerce_content();
							do_action( 'lightning_the_content_after' );
							?>
						</div>
						<?php do_action( 'lightning_entry_body_after' ); ?>

						<div class ="<?php lightning_the_class_name( 'entry-footer' ); ?>">
							<?php
							$args = array(
								'before'      => '<nav class="page-link"><dl><dt>Pages :</dt><dd>',
								'after'       => '</dd></dl></nav>',
								'link_before' => '<span class="page-numbers">',
								'link_after'  => '</span>',
								'echo'        => 1,
							);
							wp_link_pages( $args );
							?>
						</div>
					</div>
				</div>

				<?php do_action( 'lightning_mainSection_append' ); ?>
			</div>

			<?php if ( lightning_is_subsection_display() ) : ?>
				<div class="<?php lightning_the_class_name( 'sideSection-1' ); ?>">
					<?php
					do_action( 'woocommerce_sidebar' );
					get_sidebar( '1' );
					?>
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
