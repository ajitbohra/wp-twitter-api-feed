<?php
/**
 * Uninstall Twitter API Feed
 *
 * @package TAF
 */

// Exit if accessed directly.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
// Clear option(s).
delete_option( 'taf_settings' );

// clear transient(s).
delete_transient( 'taf_tweet_cache' );
