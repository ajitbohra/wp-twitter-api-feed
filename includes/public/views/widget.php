<?php
$taf_style = sprintf( "background-color: %s; color: %s", $bg_color, $text_color );
?>

<div style="<?php echo $taf_style ?>">

	<?php if( $show_title && !$is_widget ): ?>
		<h2><?php echo $title; ?></h2>
	<?php endif; ?>

	<?php echo $taf_tweets; ?>

	<?php if( $show_link ): ?>
		<a href="https://www.twitter.com/<?php echo $taf_username; ?>" target="_blank">
			<?php echo $link_text; ?>
		</a>
	<?php endif; ?>

</div>
