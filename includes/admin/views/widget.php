<?php
/**
 * Widget form
 *
 * @package TAF
 */

?>

<!-- Title -->
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
		<?php esc_attr_e( 'Title', 'TAF' ); ?>
	</label>
	<input class="widefat"
			id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			type="text"
			value="<?php echo esc_attr( $title ); ?>">
</p>

<!-- Show title -->
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'show_title' ) ); ?>">
		<?php esc_attr_e( 'Show title', 'TAF' ); ?>
	</label>
	<span class="taf_float_right">
		<input	name="<?php echo esc_attr( $this->get_field_name( 'show_title' ) ); ?>"
				type="radio"
				<?php checked( $show_title, 0 ); ?>
				value="0"> <?php esc_attr_e( 'No', 'TAF' ); ?>
	</span>
	<span class="taf_float_right">
		<input	name="<?php echo esc_attr( $this->get_field_name( 'show_title' ) ); ?>"
				type="radio"
				<?php checked( $show_title, 1 ); ?>
				value="1"> <?php esc_attr_e( 'Yes', 'TAF' ); ?> &nbsp;
	</span>
</p>

<!-- Tweet count -->
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'tweet_count' ) ); ?>">
		<?php esc_attr_e( 'Tweet Count', 'TAF' ); ?>
	</label>
	<input  class="taf_float_right"
			id="<?php echo esc_attr( $this->get_field_id( 'tweet_count' ) ); ?>"
			name="<?php echo esc_attr( $this->get_field_name( 'tweet_count' ) ); ?>"
			type="number"
			min="0"
			max="20"
			value="<?php echo esc_attr( $tweet_count ); ?>">
</p>

<!-- Background color -->
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'bg_color' ) ); ?>">
		<?php esc_attr_e( 'Background color', 'TAF' ); ?>
	</label>
	<input  class="taf_float_right"
			id="<?php echo esc_attr( $this->get_field_id( 'bg_color' ) ); ?>"
			name="<?php echo esc_attr( $this->get_field_name( 'bg_color' ) ); ?>"
			type="color"
			value="<?php echo esc_attr( $bg_color ); ?>">
</p>

<!-- Text color -->
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'text_color' ) ); ?>">
		<?php esc_attr_e( 'Text color', 'TAF' ); ?>
	</label>
	<input  class="taf_float_right"
			id="<?php echo esc_attr( $this->get_field_id( 'text_color' ) ); ?>"
			name="<?php echo esc_attr( $this->get_field_name( 'text_color' ) ); ?>"
			type="color"
			value="<?php echo esc_attr( $text_color ); ?>">
</p>

<!-- Show link -->
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'show_link' ) ); ?>">
		<?php esc_attr_e( 'Show profile link', 'TAF' ); ?>
	</label>
	<span class="taf_float_right">
		<input	name="<?php echo esc_attr( $this->get_field_name( 'show_link' ) ); ?>"
				type="radio"
				<?php checked( $show_link, 0 ); ?>
				value="0"> <?php esc_attr_e( 'No', 'TAF' ); ?>
	</span>
	<span class="taf_float_right">
		<input	name="<?php echo esc_attr( $this->get_field_name( 'show_link' ) ); ?>"
				type="radio"
				<?php checked( $show_link, 1 ); ?>
				value="1"> <?php esc_attr_e( 'Yes', 'TAF' ); ?> &nbsp;
	</span>
</p>

<!-- Link text -->
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>">
		<?php esc_attr_e( 'Link text', 'TAF' ); ?>
	</label>
	<input  class="widefat"
			id="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>"
			name="<?php echo esc_attr( $this->get_field_name( 'link_text' ) ); ?>"
			type="text"
			value="<?php echo esc_attr( $link_text ); ?>">
</p>
