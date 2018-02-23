<?php
/**
 * Register shortcode
 */

function taf_shortcode( $atts = [], $content = null, $tag = '' ) {
	// Get settings
	$options = get_option( 'taf_settings' );
	$taf_username = $options[ 'username' ];

    // Normalize attribute keys, lowercase
    $atts = array_change_key_case( (array)$atts, CASE_LOWER );

	// Override default attributes with user attributes
    $taf_atts = shortcode_atts( [
                                    'title' => 'Twitter Feed',
                                    'tweet_count' => 5,
                                    'bg_color' => '#ffffff',
                                    'text_color' => '#000000',
                                    'show_link' => true,
                                    'link_text' => sprintf( __( 'Follow us @%s', TAF_PLUGIN_TEXTDOMAIN ), $taf_username ),
								], $atts, $tag );

	//extract attributes from array
	extract( $taf_atts );

	// Render output
	ob_start();
    include TAF_PLUGIN_DIR . 'includes/public/views/widget.php';
    return ob_get_clean();
}

add_action( 'init', 'taf_shortcodes_init' );

function taf_shortcodes_init() {
    add_shortcode( 'taf', 'taf_shortcode' );
}

?>
