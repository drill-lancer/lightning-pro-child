<?php
/**
 * Widget Area Functions of Lightning Pro Child
 *
 * @package Lightning Pro Child
 */

/**
 * Lightning Widget Init.
 */
function lightning_widgets_init() {
	// sidebar widget area.
	register_sidebar(
		array(
			'name'          => __( 'Sidebar(Home)', 'lightning-pro' ),
			'id'            => 'front-side-top-widget-area',
			'before_widget' => '<aside class="widget %2$s" id="%1$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title subSection-title">',
			'after_title'   => '</h1>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Sidebar(Common top)', 'lightning-pro' ),
			'id'            => 'common-side-top-widget-area',
			'before_widget' => '<aside class="widget %2$s" id="%1$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title subSection-title">',
			'after_title'   => '</h1>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Sidebar(Common bottom)', 'lightning-pro' ),
			'id'            => 'common-side-bottom-widget-area',
			'before_widget' => '<aside class="widget %2$s" id="%1$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title subSection-title">',
			'after_title'   => '</h1>',
		)
	);

	// Sidebar( post_type ).
	$post_types = get_post_types( array( 'public' => true ) );

	foreach ( $post_types as $post_type ) {
		// Get post type name.
		$post_type_object = get_post_type_object( $post_type );

		if ( $post_type_object ) {
			// Set post type name.
			$post_type_name      = esc_html( $post_type_object->labels->name );
			$sidebar_description = '';

			if ( 'post' === $post_type ) {
				$sidebar_description = __( 'This widget area appears on the Posts page only. If you do not set any widgets in this area, this theme sets the following widgets "Recent posts", "Category", and "Archive" by default. These default widgets will be hidden, when you set any widgets. <br><br> If you installed our plugin VK All in One Expansion Unit (Free), you can use the following widgets, "VK_Recent posts",  "VK_Categories", and  "VK_archive list".', 'lightning-pro' );
			} elseif ( 'page' === $post_type ) {
				$sidebar_description = __( 'This widget area appears on the Pages page only. If you do not set any widgets in this area, this theme sets the "Child pages list widget" by default. This default widget will be hidden, when you set any widgets. <br><br> If you installed our plugin VK All in One Expansion Unit (Free), you can use the "VK_ child page list" widget for the alternative.', 'lightning-pro' );
			} elseif ( 'attachment' === $post_type ) {
				$sidebar_description = __( 'This widget area appears on the Media page only.', 'lightning-pro' );
			} else {
				// translators:.
				$sidebar_description = sprintf( __( 'This widget area appears on the %s contents page only.', 'lightning-pro' ), $post_type_name );
			}

			// Set post type widget area.

			register_sidebar(
				array(
					// translators:.
					'name'          => sprintf( __( 'Sidebar(%s)', 'lightning-pro' ), $post_type_name ),
					'id'            => $post_type . '-side-widget-area',
					'description'   => $sidebar_description,
					'before_widget' => '<aside class="widget %2$s" id="%1$s">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h1 class="widget-title subSection-title">',
					'after_title'   => '</h1>',
				)
			);
		}
	}

	register_sidebar(
		array(
			'name'          => 'サイドバー2',
			'id'            => 'sidebar-2',
			'before_widget' => '<aside class="widget %2$s" id="%1$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title subSection-title">',
			'after_title'   => '</h1>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'メインカラム上部',
			'id'            => 'main-section-prepend',
			'before_widget' => '<div class="widget %2$s" id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title mainSection-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'メインカラム下部',
			'id'            => 'main-section-apepend',
			'before_widget' => '<div class="widget %2$s" id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title mainSection-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => '記事内上部',
			'id'            => 'content-before',
			'before_widget' => '<div class="widget %2$s" id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title mainSection-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => '記事内下部',
			'id'            => 'content-after',
			'before_widget' => '<div class="widget %2$s" id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title mainSection-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'コメント上',
			'id'            => 'comment-before',
			'before_widget' => '<div class="widget %2$s" id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title mainSection-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'コメント下',
			'id'            => 'comment-after',
			'before_widget' => '<div class="widget %2$s" id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title mainSection-title">',
			'after_title'   => '</h2>',
		)
	);

	// footer upper widget area.
	register_sidebar(
		array(
			'name'          => __( 'Widget area of upper footer', 'lightning-pro' ),
			'id'            => 'footer-upper-widget-1',
			'before_widget' => '<aside class="widget %2$s" id="%1$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title subSection-title">',
			'after_title'   => '</h1>',
		)
	);

	// footer widget area.
	$footer_widget_area_count = 3;
	$footer_widget_area_count = apply_filters( 'lightning_footer_widget_area_count', $footer_widget_area_count );

	for ( $i = 1; $i <= $footer_widget_area_count; ) {
		register_sidebar(
			array(
				'name'          => __( 'Footer widget area ', 'lightning-pro' ) . $i,
				'id'            => 'footer-widget-' . $i,
				'before_widget' => '<aside class="widget %2$s" id="%1$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h1 class="widget-title subSection-title">',
				'after_title'   => '</h1>',
			)
		);
		$i++;
	}
}
add_action( 'widgets_init', 'lightning_widgets_init' );
