<?php
/**
 * Render feed
 *
 * @package TAF
 */

$taf_style = sprintf( 'background-color: %s; color: %s', $taf_atts['bg_color'], $taf_atts['text_color'] );

// String to bool.
$show_title = filter_var( $taf_atts['show_title'], FILTER_VALIDATE_BOOLEAN );
$show_link  = filter_var( $taf_atts['show_link'], FILTER_VALIDATE_BOOLEAN );
?>

<div style="<?php echo esc_attr( $taf_style ); ?>">

	<?php if ( $show_title && ! $taf_atts['is_widget'] ) : ?>
		<h2><?php echo esc_html( $taf_atts['title'] ); ?></h2>
	<?php endif; ?>

	<?php echo $taf_tweets; ?>

	<?php if ( $show_link ) : ?>
		<a href="https://www.twitter.com/<?php echo esc_html( $taf_atts['taf_username'] ); ?>" target="_blank">
			<?php echo esc_html( $taf_atts['link_text'] ); ?>
		</a>
	<?php endif; ?>

</div>
