<?php
/**
 * Settings form
 *
 * @package TAF
 */

?>

<!-- Settings page -->
<div class="wrap">
<h1>Twitter API Feed</h1>

	<?php
	// Clear cache.
	if ( isset( $_GET['clear_cache'] ) ) :
		taf_clear_transient();
	?>
	<div class="notice notice-success is-dismissible">
		<p>Twitter cache cleared.</p>
	</div>
	<?php endif; ?>

	<form action='options.php' method='post'>
	<?php
		settings_fields( 'tafSettings' );
		do_settings_sections( 'tafSettings' );
		submit_button();
	?>
	<a href="<?php echo esc_url( admin_url( 'options-general.php?page=twitter_api_feed&clear_cache=true' ) ); ?>" class="button button-secondary">Clear cache</a>
	</form>

	<!-- Usage Info -->
	<div class="card">
		<h2>Usage</h2>
		<p><u>Shortcode</u></p>
		<code>
			[taf title='My Twitter Feed' tweet_count='5' bg_color='#ffffff']
		</code>
		<p><u>Parameters</u></p>
		<ul>
			<li><b>title:</b> text for feed title on top</li>
			<li><b>show_title:</b> true/false to show or hide title</li>
			<li><b>tweet_count:</b> number of tweets to display</li>
			<li><b>bg_color:</b> hex color value eg. #ffffff</li>
			<li><b>text_color:</b> hex color value eg. #000000</li>
			<li><b>show_link:</b> true/false to show or hide bottom link</li>
			<li><b>link_text:</b> text for bottom profile link</li>
		</ul>

		<p><u>Place <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">widget</a> on sidebar</u></p>
	</div>
</div>
