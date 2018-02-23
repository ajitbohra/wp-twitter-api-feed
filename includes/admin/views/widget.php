<!-- Title -->
<p>
	<label for="<?php esc_attr_e( $this->get_field_id( 'title' ) ); ?>">
		<?php esc_attr_e( 'Title', TAF_PLUGIN_TEXTDOMAIN ); ?>
	</label>
	<input class="widefat"
			id="<?php esc_attr_e( $this->get_field_id( 'title' ) ); ?>"
			name="<?php esc_attr_e( $this->get_field_name( 'title' ) ); ?>"
			type="text"
			value="<?php esc_attr_e( $title ); ?>">
</p>

<!-- Tweet count -->
<p>
	<label for="<?php esc_attr_e( $this->get_field_id( 'tweet_count' ) ); ?>">
		<?php esc_attr_e( 'Tweet Count', TAF_PLUGIN_TEXTDOMAIN ); ?>
	</label>
	<input  class="taf_float_right"
			id="<?php esc_attr_e( $this->get_field_id( 'tweet_count' ) ); ?>"
			name="<?php esc_attr_e( $this->get_field_name( 'tweet_count' ) ); ?>"
			type="number"
			min="0"
			max="20"
			value="<?php esc_attr_e( $tweet_count ); ?>">
</p>

<!-- Background color -->
<p>
	<label for="<?php esc_attr_e( $this->get_field_id( 'bg_color' ) ); ?>">
		<?php esc_attr_e( 'Background color', TAF_PLUGIN_TEXTDOMAIN ); ?>
	</label>
	<input  class="taf_float_right"
			id="<?php esc_attr_e( $this->get_field_id( 'bg_color' ) ); ?>"
			name="<?php esc_attr_e( $this->get_field_name( 'bg_color' ) ); ?>"
			type="color"
			value="<?php esc_attr_e( $bg_color ); ?>">
</p>

<!-- Text color -->
<p>
	<label for="<?php esc_attr_e( $this->get_field_id( 'text_color' ) ); ?>">
		<?php esc_attr_e( 'Text color', TAF_PLUGIN_TEXTDOMAIN ); ?>
	</label>
	<input  class="taf_float_right"
			id="<?php esc_attr_e( $this->get_field_id( 'text_color' ) ); ?>"
			name="<?php esc_attr_e( $this->get_field_name( 'text_color' ) ); ?>"
			type="color"
			value="<?php esc_attr_e( $text_color ); ?>">
</p>

<!-- Show link -->
<p>
	<label for="<?php esc_attr_e( $this->get_field_id( 'show_link' ) ); ?>">
		<?php esc_attr_e( 'Show profile link', TAF_PLUGIN_TEXTDOMAIN ); ?>
	</label>
	<span class="taf_float_right">
		<input	name="<?php esc_attr_e( $this->get_field_name( 'show_link' ) ); ?>"
				type="radio"
				<?php checked( $show_link, 0 ); ?>
				value="0"> No
	</span>
	<span class="taf_float_right">
		<input	name="<?php esc_attr_e( $this->get_field_name( 'show_link' ) ); ?>"
				type="radio"
				<?php checked( $show_link, 1 ); ?>
				value="1"> Yes &nbsp;
	</span>
</p>

<!-- Link text -->
<p>
	<label for="<?php esc_attr_e( $this->get_field_id( 'link_text' ) ); ?>">
		<?php esc_attr_e( 'Link text', TAF_PLUGIN_TEXTDOMAIN ); ?>
	</label>
	<input  class="widefat"
			id="<?php esc_attr_e( $this->get_field_id( 'link_text' ) ); ?>"
			name="<?php esc_attr_e( $this->get_field_name( 'link_text' ) ); ?>"
			type="text"
			value="<?php esc_attr_e( $link_text ); ?>">
</p>
