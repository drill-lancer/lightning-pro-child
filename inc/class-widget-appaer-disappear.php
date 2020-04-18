<?php
/**
 * Widget Appear Disappear Class of Lightning Pro Child
 *
 * @package Lightning Pro Child
 */

/**
 * Lightning Widget Appear Disappear.
 */
class Widget_Appaer_Disappear {
	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'in_widget_form', array( $this, 'widget_form' ), 10, 3 );
		add_filter( 'widget_update_callback', array( $this, 'widget_update_callback' ), 10, 2 );
		add_filter( 'dynamic_sidebar_params', array( $this, 'dynamic_sidebar_params' ) );
	}

	/**
	 * Widget Form.
	 *
	 * @param WP_Widget $widget  The widget instance (passed by reference).
	 * @param null      $return  Return null if new fields are added.
	 * @param array     $instance  An array of the widget's settings.
	 */
	public function widget_form( $widget, $return, $instance ) {
		$name    = 'widget-' . $widget->id_base . '[' . $widget->number . ']';
		$options = array(
			array( 'disappear-xs', '非表示 ( 画面サイズ : xs )' ),
			array( 'disappear-sm', '非表示 ( 画面サイズ : sm )' ),
			array( 'disappear-md', '非表示 ( 画面サイズ : md )' ),
			array( 'disappear-lg', '非表示 ( 画面サイズ : lg )' ),
			array( 'disappear-xl', '非表示 ( 画面サイズ : xl )' ),
		);
		?>
		<h3 class="admin-custom-h3">ウィジェット非表示設定</h3>
		<ul>
			<?php
			foreach ( $options as $option ) {
				echo '<li><label><input name="' . esc_attr( $name ) . '[' . esc_attr( $option[0] ) . ']" type="checkbox"' . checked( isset( $instance[ $option[0] ] ), true, false ) . '></input>' . esc_html( $option[1] ) . '</label></li>';
			}
			?>
		</ul>
		<?php
		return $instance;
	}

	/**
	 * Widget Update CallBack.
	 *
	 * @param array $instance The current widget instance's settings.
	 * @param array $new_instance Array of new widget settings.
	 */
	public function widget_update_callback( $instance, $new_instance ) {
		$instance['disappear-xs'] = $new_instance['disappear-xs'];
		$instance['disappear-sm'] = $new_instance['disappear-sm'];
		$instance['disappear-md'] = $new_instance['disappear-md'];
		$instance['disappear-lg'] = $new_instance['disappear-lg'];
		$instance['disappear-xl'] = $new_instance['disappear-xl'];
		return $instance;
	}

	/**
	 * Dynamic Sidebar Params
	 *
	 * @param array $params An array of widget display arguments.
	 */
	public function dynamic_sidebar_params( $params ) {
		global $wp_registered_widgets;

		$widget_id  = $params[0]['widget_id'];
		$widget_obj = $wp_registered_widgets[ $widget_id ];
		$widget_opt = get_option( $widget_obj['callback'][0]->option_name );
		$widget_num = $widget_obj['params'][0]['number'];

		$widget_class  = '';
		$widget_class .= isset( $widget_opt[ $widget_num ]['disappear-xs'] ) ? 'd-none ' : 'd-block ';
		$widget_class .= isset( $widget_opt[ $widget_num ]['disappear-sm'] ) ? 'd-sm-none ' : 'd-sm-block ';
		$widget_class .= isset( $widget_opt[ $widget_num ]['disappear-md'] ) ? 'd-md-none ' : 'd-md-block ';
		$widget_class .= isset( $widget_opt[ $widget_num ]['disappear-lg'] ) ? 'd-lg-none ' : 'd-lg-block ';
		$widget_class .= isset( $widget_opt[ $widget_num ]['disappear-xl'] ) ? 'd-xl-none ' : 'd-xl-block ';

		$params[0]['before_widget'] = preg_replace( '/class="/', "class=\"{$widget_class}", $params[0]['before_widget'], 1 );
		return $params;
	}
}

new Widget_Appaer_Disappear();
