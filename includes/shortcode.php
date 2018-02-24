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
                                    'show_title' => true,
                                    'is_widget' => false,
                                    'tweet_count' => 5,
                                    'bg_color' => '#ffffff',
                                    'text_color' => '#000000',
                                    'show_link' => true,
                                    'link_text' => sprintf( __( 'Follow us @%s', TAF_PLUGIN_TEXTDOMAIN ), $taf_username ),
								], $atts, $tag );

	//extract attributes from array
	extract( $taf_atts );

	// Fetch tweets
	if ( get_transient( 'taf_tweet_cache' ) ) {
		$taf_tweets = get_transient( 'taf_tweet_cache' );
	} else {
		$taf_tweets = fetch_tweets( $tweet_count );
		set_transient( 'taf_tweet_cache', $taf_tweets, 2 * HOUR_IN_SECONDS );
	}

	// Render output
	ob_start();
	include TAF_PLUGIN_DIR . 'includes/public/views/widget.php';
	return ob_get_clean();
}

add_action( 'init', 'taf_shortcodes_init' );

function taf_shortcodes_init() {
    add_shortcode( 'taf', 'taf_shortcode' );
}

/**
 * Fetch tweets
 */

function fetch_tweets( $tweet_count ) {
	// Get options & extract values
	$options = get_option( 'taf_settings' );
	extract( $options );

	// Include twitter class
	require_once TAF_PLUGIN_DIR . 'includes/lib/tweet-php/TweetPHP.php';

	$TweetPHP = new TweetPHP( array(
		'consumer_key'              => $consumer_key,
		'consumer_secret'           => $consumer_secret,
		'access_token'              => $access_token,
		'access_token_secret'       => $access_token_secret,
		'api_params'				=> array(
												'screen_name' => $username,
												'exclude_replies' => true,
												'include_rts' => false
											),
		'tweets_to_retrieve'		=> 100,
		'tweets_to_display'			=> $tweet_count,
		'enable_cache'          	=> false,
		'twitter_template'      => '<ul id="twitter">{tweets}</ul>',
	  ) );

	  $tweet_list = $TweetPHP->get_tweet_list();

	  return $tweet_list;
}

/**
 * Update transient on settings update
 */

add_action( 'update_option_taf_settings', 'taf_clear_transient', 10, 2 );

function taf_clear_transient() {
	delete_transient( 'taf_tweet_cache' );
}

?>
