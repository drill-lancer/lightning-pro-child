<?php
/**
 * Front Page Template of Lightning Pro Child
 *
 * @package Lightning Pro Child
 */

get_header();
if ( '3' === $bootstrap ) {
	get_template_part( 'template-parts/slide', 'bs3' );
} else {
	get_template_part( 'template-parts/slide', 'bs4' );
}
?>

<div class="<?php lightning_the_class_name( 'siteContent' ); ?>">
	<?php do_action( 'lightning_siteContent_prepend' ); ?>
	<div class="container">
		<?php do_action( 'lightning_siteContent_container_prepend' ); ?>
		<div class="row">

			<div class="<?php lightning_the_class_name( 'mainSection' ); ?>">

				<?php
				do_action( 'lightning_mainSection_prepend' );
				if ( apply_filters( 'is_lightning_home_content_display', true ) ) :
					if ( have_posts() ) :
						if ( 'page' === get_option( 'show_on_front' ) ) :
							while ( have_posts() ) :
								the_post();
								?>

								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class ="<?php lightning_the_class_name( 'entry-outer' ); ?>">
										<?php do_action( 'lightning_entry_body_before' ); ?>
										<div class="<?php lightning_the_class_name( 'entry-body' ); ?>">
											<?php
											do_action( 'lightning_content_before' );
											the_content();
											$args = array(
												'before' => '<nav class="page-link"><dl><dt>Pages :</dt><dd>',
												'after'  => '</dd></dl></nav>',
												'link_before' => '<span class="page-numbers">',
												'link_after' => '</span>',
												'echo'   => 1,
											);
											wp_link_pages( $args );
											do_action( 'lightning_content_after' );
											?>
										</div>
										<?php do_action( 'lightning_entry_body_after' ); ?>
									</div>
								</article>

								<?php
							endwhile;
						else :
							?>
							<div class="archive-outer">
								<?php
								// Archive Title.
								$archiveTitle_html = '';
								$page_for_posts    = lightning_get_page_for_posts();
								// Use post top page（ Archive title wrap to div ）.
								if ( $page_for_posts['post_top_use'] || get_post_type() !== 'post' ) {
									if ( is_year() || is_month() || is_day() || is_tag() || is_author() || is_tax() || is_category() ) {
										$archiveTitle       = get_the_archive_title();
										$archiveTitle_html .= '<header class="archive-header mainSection-title"><h1 class="archive-title">' . $archiveTitle . '</h1></header>';
									}
								}
								echo wp_kses_post( apply_filters( 'lightning_mainSection_archiveTitle', $archiveTitle_html ) );
								?>
								<div class="archive-body">
									<?php
									// Archive Description.
									$archiveDescription_html = '';
									if ( is_category() || is_tax() || is_tag() ) {
										$archiveDescription = term_description();
										$page_number        = get_query_var( 'paged', 0 );
										if ( ! empty( $archiveDescription ) && 0 === $page_number ) {
											$archiveDescription_html = '<div class="archive-meta">' . $archiveDescription . '</div>';
										}
									}
									echo wp_kses_post( apply_filters( 'lightning_mainSection_archiveDescription', $archiveDescription_html ) );

									$loop_post_type = lightning_get_post_type();

									do_action( 'lightning_loop_before' );
									?>
									<div class="<?php lightning_the_class_name( 'postList' ); ?>">
										<?php
										if ( have_posts() ) :
											if ( apply_filters( 'is_lightning_extend_loop', false ) ) :
												do_action( 'lightning_extend_loop' );
											else :
												$count = 0;
												while ( have_posts() ) :
													the_post();
													get_template_part( 'template-parts/post/loop', $loop_post_type['slug'] );
													$count++;
													do_action( 'lightning_default_infeed' );
												endwhile;
											endif;
											the_posts_pagination(
												array(
													'mid_size' => 1,
													'prev_text' => '&laquo;',
													'next_text' => '&raquo;',
													'type' => 'list',
													'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lightning-pro' ) . ' </span>',
												)
											);
										endif;
										?>
									</div>
									<?php do_action( 'lightning_loop_after' ); ?>
								</div>
							</div>
							<?php
						endif;
					else :
						?>
						<div class="well">
							<p><?php esc_html_e( 'No posts.', 'lightning-pro' ); ?></p>
						</div>
						<?php
					endif;
				endif;
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
