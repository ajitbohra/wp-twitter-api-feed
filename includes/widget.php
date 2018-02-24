<?php
/**
 *Register widget
 */

class taf_widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'taf-widget',
			__( 'Twitter API Feed' )
		);

		// Register widget
		add_action( 'widgets_init', function() {
			register_widget( 'taf_widget' );
		} );

		// Enqueue admin style
		add_action( 'admin_enqueue_scripts', array( $this, 'widget_admin_style' ) );
	}

	public function form( $instance ) {
		// Get settings
		$options = get_option( 'taf_settings' );
		$taf_username = $options[ 'username' ];

		// Widget attributes
		$title = !empty( $instance['title' ] ) ? $instance[ 'title' ] : esc_html__( 'Twitter Feed' , TAF_PLUGIN_TEXTDOMAIN );
		$show_title = isset( $instance['show_title' ] ) ? $instance[ 'show_title' ] : '1';
		$tweet_count = !empty( $instance['tweet_count' ] ) ? $instance[ 'tweet_count' ] : 5;
		$bg_color = !empty( $instance['bg_color' ] ) ? $instance[ 'bg_color' ] : '#ffffff';
		$text_color = !empty( $instance['text_color' ] ) ? $instance[ 'text_color' ] : '#000000';
		$show_link = isset( $instance['show_link' ] ) ? $instance[ 'show_link' ] : '1';
		$link_text = !empty( $instance['link_text' ] ) ? $instance[ 'link_text' ] : sprintf( __( 'Follow us @%s', TAF_PLUGIN_TEXTDOMAIN ), $taf_username );

		// Render form
		require TAF_PLUGIN_DIR . 'includes/admin/views/widget.php';
	}

	public function update( $new_instance, $old_instance ) {
		// Clear transient
		taf_clear_transient();

		// Update widget attributes
		$instance = $old_instance;

        $instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'show_title' ] = ( isset( $new_instance[ 'show_title' ] ) ? $new_instance[ 'show_title' ] : '1' );
		$instance[ 'tweet_count' ] = ( !empty( $new_instance[ 'tweet_count' ] ) ? $new_instance[ 'tweet_count' ] : 5 );
        $instance[ 'bg_color' ] = ( !empty( $new_instance[ 'bg_color' ] ) ? $new_instance[ 'bg_color' ] : '#ffffff' );
        $instance[ 'text_color' ] = ( !empty( $new_instance[ 'text_color' ] ) ? $new_instance[ 'text_color' ] : '#000000' );
        $instance[ 'show_link' ] = ( isset( $new_instance[ 'show_link' ] ) ? $new_instance[ 'show_link' ] : '1' );
        $instance[ 'link_text' ] = ( !empty( $new_instance[ 'link_text' ] ) ? strip_tags( $new_instance[ 'link_text' ] ) : '' );

		return $instance;
	}

	public function widget( $args, $instance ) {
		// Extract args & attributes from array
		extract( $args );
		extract( $instance );

		// Title display
        $title = apply_filters ( 'widget_title', $instance['title'] );

        echo $before_widget;

		if ( !empty( $title ) && $show_title ) {
            echo $before_title . $title . $after_title;
		}

		// Render widget
		echo do_shortcode( "[taf is_widget='true' title='$title' show_title='$show_title' tweet_count='$tweet_count' bg_color='$bg_color' text_color='$text_color' show_link='$show_link' link_text='$link_text']" );

		echo $after_widget;
	}

	public function widget_admin_style() {
		wp_register_style( 'taf-style', TAF_PLUGIN_URL . 'assets/admin_style.css' );
		wp_enqueue_style( 'taf-style' );
	}
}

$taf_widget = new taf_widget();
?>
