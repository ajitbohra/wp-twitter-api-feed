<?php
/**
 * Plugin Name: Twitter API Feed
 * Plugin URI: https://ajitbohra.com
 * Description: Easily add twitter api feed to post/page using shortcode or widget.
 * Author: ajitbohra
 * Author URI: https://ajitbohra.com
 * Version: 1.0.0
 * Text Domain: TAF
 * Domain Path: /languages
 */

 // Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Setup Constants
*/

// Plugin version
if ( ! defined( 'TAF_VERSION' ) ) {
	define( 'TAF_VERSION', '1.0.0' );
}

// Plugin Root File
if ( ! defined( 'TAF_PLUGIN_FILE' ) ) {
	define( 'TAF_PLUGIN_FILE', __FILE__ );
}
// Plugin Folder Path
if ( ! defined( 'TAF_PLUGIN_DIR' ) ) {
	define( 'TAF_PLUGIN_DIR', plugin_dir_path( TAF_PLUGIN_FILE ) );
}
// Plugin Folder URL
if ( ! defined( 'TAF_PLUGIN_URL' ) ) {
	define( 'TAF_PLUGIN_URL', plugin_dir_url( TAF_PLUGIN_FILE ) );
}
// Plugin Basename aka: "TAF/twitter-api-feed.php"
if ( ! defined( 'TAF_PLUGIN_BASENAME' ) ) {
	define( 'TAF_PLUGIN_BASENAME', plugin_basename( TAF_PLUGIN_FILE ) );
}

/**
 * Load translations
 */

add_action( 'init', 'taf_load_plugin_textdomain' );

function taf_load_plugin_textdomain() {

	$locale = apply_filters( 'plugin_locale', get_locale(), TAF_PLUGIN_TEXTDOMAIN );
	// wp-content/languages/plugin-name/plugin-name-en_EN.mo
	load_textdomain( TAF_PLUGIN_TEXTDOMAIN, trailingslashit( WP_LANG_DIR ) . TAF_PLUGIN_TEXTDOMAIN . '/' . TAF_PLUGIN_TEXTDOMAIN . '-' . $locale . '.mo' );
	// wp-content/plugins/plugin-name/languages/plugin-name-en_EN.mo
	load_plugin_textdomain( TAF_PLUGIN_TEXTDOMAIN, FALSE, basename( TAF_PLUGIN_DIR ) . '/languages/' );
}


 /**
  * Include files
  */

require_once TAF_PLUGIN_DIR . 'includes/admin/settings.php';
require_once TAF_PLUGIN_DIR . 'includes/shortcode.php';

// Get settings
$options = get_option( 'taf_settings' );
$taf_widget = $options[ 'widget' ];

if( $taf_widget ) {
  require_once TAF_PLUGIN_DIR . 'includes/widget.php';
}

/**
 * Add plugin setting link to plugin row meta
 */

add_filter( 'plugin_row_meta', 'taf_plugin_row_meta', 10, 2 );

function taf_plugin_row_meta( $links, $file ) {
    if ( TAF_PLUGIN_BASENAME == $file ) {

		$taf_settings_link = sprintf( '<a href="%s" aria-label="%s">%s</a>', admin_url( 'options-general.php?page=twitter_api_feed' ),esc_attr__( 'Plugin settings', 'TAF' ), esc_html__( 'Settings', 'TAF' ) );
        $row_meta = array(
          'settings'    =>	$taf_settings_link
        );

        return array_merge( $links, $row_meta );
    }
    return (array) $links;
}
?>
