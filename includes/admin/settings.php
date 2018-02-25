<?php
/**
 * Plugin settings
 */

 // Exit if accessed directly.
 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Menu for settings page
add_action( 'admin_menu', 'taf_add_admin_menu' );
add_action( 'admin_init', 'taf_settings_init' );

function taf_add_admin_menu(  ) {

	add_submenu_page( 'options-general.php', 'Twitter API Feed', 'Twitter API Feed', 'manage_options', 'twitter_api_feed', 'taf_options_page' );

}

// Register setting, section & fields
function taf_settings_init(  ) {

	// Register setting
	register_setting( 'tafSettings', 'taf_settings' );

	// Register section
	add_settings_section(
		'taf_settings_section',
		__( 'Settings', 'TAF' ),
		'taf_settings_section_callback',
		'tafSettings'
	);

	// Register fields
	// Field: Enable/disable widget
	add_settings_field(
		'widget',
		__( 'Enable Widget', 'TAF' ),
		'widget_render',
		'tafSettings',
		'taf_settings_section'
	);

	// Field: Twitter username
	add_settings_field(
		'username',
		__( 'Username', 'TAF' ),
		'username_render',
		'tafSettings',
		'taf_settings_section'
	);

	// Field: Twitter consumer key
	add_settings_field(
		'consumer_key',
		__( 'Consumer key', 'TAF' ),
		'consumer_key_render',
		'tafSettings',
		'taf_settings_section'
	);

	// Field: Twitter consumer secret
	add_settings_field(
		'consumer_secret',
		__( 'Consumer secret', 'TAF' ),
		'consumer_secret_render',
		'tafSettings',
		'taf_settings_section'
	);

	// Field: Twitter access token
	add_settings_field(
		'access_token',
		__( 'Access token', 'TAF' ),
		'access_token_render',
		'tafSettings',
		'taf_settings_section'
	);

	// Field: Twitter access token secret
	add_settings_field(
		'access_token_secret',
		__( 'Access token secret', 'TAF' ),
		'access_token_secret_render',
		'tafSettings',
		'taf_settings_section'
	);

}

// Fields render callbacks
// Render: Enable/disable widget radios
function widget_render(  ) {

	$options = get_option( 'taf_settings' );
	?>
	<input type='radio' name='taf_settings[widget]' <?php checked( $options['widget'], 1 ); ?> value='1'> Yes &nbsp;
	<input type='radio' name='taf_settings[widget]' <?php checked( $options['widget'], 0 ); ?> value='0'> No

	<?php

}

// Render: Twitter username text input
function username_render(  ) {

	$options = get_option( 'taf_settings' );
	?>
	<input type='text' name='taf_settings[username]' value='<?php echo $options['username']; ?>'>
	<?php

}

// Render: Twitter consumer key text input
function consumer_key_render(  ) {

	$options = get_option( 'taf_settings' );
	?>
	<input type='text' name='taf_settings[consumer_key]' value='<?php echo $options['consumer_key']; ?>'>
	<?php

}

// Render: Twitter consumer secret text input
function consumer_secret_render(  ) {

	$options = get_option( 'taf_settings' );
	?>
	<input type='text' name='taf_settings[consumer_secret]' value='<?php echo $options['consumer_secret']; ?>'>
	<?php

}

// Render: Twitter access text input
function access_token_render(  ) {

	$options = get_option( 'taf_settings' );
	?>
	<input type='text' name='taf_settings[access_token]' value='<?php echo $options['access_token']; ?>'>
	<?php

}

// Render: Twitter access token text input
function access_token_secret_render(  ) {

	$options = get_option( 'taf_settings' );
	?>
	<input type='text' name='taf_settings[access_token_secret]' value='<?php echo $options['access_token_secret']; ?>'>
	<?php

}

// Render: setting section
function taf_settings_section_callback(  ) {

	echo __( 'Twitter API access configuration', 'TAF' );

}

// Render: options page
function taf_options_page(  ) {

require_once TAF_PLUGIN_DIR . 'includes/admin/views/settings.php';

}

?>
