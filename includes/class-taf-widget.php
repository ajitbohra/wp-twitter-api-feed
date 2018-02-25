<?php
/**
 * Twitter API Feed Widget
 *
 * @package TAF
 */

/**
 * Widget
 */
class Taf_Widget extends WP_Widget {
	/**
	 * Construct Widget
	 */
	public function __construct() {
		parent::__construct(
			'taf-widget',
			__( 'Twitter API Feed', 'TAF' )
		);

		// Register widget.
		add_action(
			'widgets_init', function() {
				register_widget( 'Taf_Widget' );
			}
		);

		// Enqueue admin style.
		add_action( 'admin_enqueue_scripts', array( $this, 'widget_admin_style' ) );
	}

	/**
	 * Widget backend form
	 *
	 * @param array $instance Widget instance.
	 *
	 * @return void
	 */
	public function form( $instance ) {
		// Get settings.
		$options      = get_option( 'taf_settings' );
		$taf_username = $options['username'];

		// Widget attributes.
		$title       = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Twitter Feed', 'TAF' );
		$show_title  = isset( $instance['show_title'] ) ? $instance['show_title'] : '1';
		$tweet_count = ! empty( $instance['tweet_count'] ) ? $instance['tweet_count'] : 5;
		$bg_color    = ! empty( $instance['bg_color'] ) ? $instance['bg_color'] : '#ffffff';
		$text_color  = ! empty( $instance['text_color'] ) ? $instance['text_color'] : '#000000';
		$show_link   = isset( $instance['show_link'] ) ? $instance['show_link'] : '1';
		// Translators: placeholder will be repalced by twitter username.
		$link_text = ! empty( $instance['link_text'] ) ? $instance['link_text'] : sprintf( __( 'Follow us @%s', 'TAF' ), $taf_username );

		// Render form.
		require TAF_PLUGIN_DIR . 'includes/admin/views/widget.php';
	}

	/**
	 * Update Widget
	 *
	 * @param array $new_instance new widget settings.
	 * @param array $old_instance previous widget settings.
	 *
	 * @return array new widget settings
	 */
	public function update( $new_instance, $old_instance ) {
		// Clear transient.
		taf_clear_transient();

		// Update widget attributes.
		$instance = $old_instance;

		$instance['title']       = ( ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '' );
		$instance['show_title']  = ( isset( $new_instance['show_title'] ) ? $new_instance['show_title'] : '1' );
		$instance['tweet_count'] = ( ! empty( $new_instance['tweet_count'] ) ? $new_instance['tweet_count'] : 5 );
		$instance['bg_color']    = ( ! empty( $new_instance['bg_color'] ) ? $new_instance['bg_color'] : '#ffffff' );
		$instance['text_color']  = ( ! empty( $new_instance['text_color'] ) ? $new_instance['text_color'] : '#000000' );
		$instance['show_link']   = ( isset( $new_instance['show_link'] ) ? $new_instance['show_link'] : '1' );
		$instance['link_text']   = ( ! empty( $new_instance['link_text'] ) ? strip_tags( $new_instance['link_text'] ) : '' );

		return $instance;
	}

	/**
	 * Public frontend rendering
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Widget settings.
	 *
	 * @return void
	 */
	public function widget( $args, $instance ) {
		// Title display.
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];

		if ( ! empty( $title ) && $instance['show_title'] ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		// Render widget.
		$taf_shortcode = "[taf is_widget='1' title='%s' show_title='%s' tweet_count='%s' bg_color='%s' text_color='%s' show_link='%s' link_text='%s']";

		echo do_shortcode( sprintf( $taf_shortcode, $title, $instance['show_title'], $instance['tweet_count'], $instance['bg_color'], $instance['text_color'], $instance['show_link'], $instance['link_text'] ) );

		echo $args['after_widget'];
	}

	/**
	 * Widget admin styles
	 */
	public function widget_admin_style() {
		wp_register_style( 'taf-style', TAF_PLUGIN_URL . 'assets/admin_style.css' );
		wp_enqueue_style( 'taf-style' );
	}
}

$taf_widget = new taf_widget();

