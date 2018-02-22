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

// Plugin text domain
if ( ! defined( 'TAF_TEXTDOMAIN' ) ) {
	define( 'TAF_TEXTDOMAIN', 'TAF' );
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

function taf_load_plugin_textdomain() {

	$locale = apply_filters( 'plugin_locale', get_locale(), TAF_TEXTDOMAIN );
	// wp-content/languages/plugin-name/plugin-name-en_EN.mo
	load_textdomain( TAF_TEXTDOMAIN, trailingslashit( WP_LANG_DIR ) . TAF_TEXTDOMAIN . '/' . TAF_TEXTDOMAIN . '-' . $locale . '.mo' );
	// wp-content/plugins/plugin-name/languages/plugin-name-en_EN.mo
	load_plugin_textdomain( TAF_TEXTDOMAIN, FALSE, basename( TAF_PLUGIN_DIR ) . '/languages/' );
}
add_action( 'init', 'taf_load_plugin_textdomain' );

 /**
  * Include files
  */

  require_once TAF_PLUGIN_DIR . 'includes/admin/settings.php';
  require_once TAF_PLUGIN_DIR . 'includes/shortcode.php';
  require_once TAF_PLUGIN_DIR . 'includes/widget.php';
?>
