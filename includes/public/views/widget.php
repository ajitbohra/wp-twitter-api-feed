<?php
$taf_style = sprintf( "background-color: %s; color: %s", $bg_color, $text_color );
?>

<div style="<?php echo $taf_style ?>">
	Twitter feed for <?php echo $taf_username; ?>
	<a href="https://www.twitter.com/<?php echo $taf_username; ?>" target="_blank">
		<?php echo $link_text; ?>
	</a>
</div>
