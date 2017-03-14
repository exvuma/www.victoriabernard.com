<div class="wrap">
	<h2><?php esc_html_e( $this->name ); ?></h2>
	<form method="post" action="options.php">
		<?php settings_fields( $this->tag . '_options' ); ?>
		<table class="form-table">
			<?php foreach ( $this->details AS $key => $detail ) : ?>
			<tr valign="top">
				<th>
					<label for="<?php esc_attr_e( $this->tag . '[' . $key . ']' ); ?>">
						<?php esc_html_e( is_array( $detail ) ? $detail['label'] : $detail, 'contact' ); ?>
					</label>
				</th>
				<td>
					<?php if ( isset( $detail['input'] ) && $detail['input'] == 'textarea' ) : ?>
					<textarea class="regular-text" cols="50" rows="5"
						id="<?php esc_attr_e( $this->tag . '[' . $key . ']' ); ?>"
						name="<?php esc_attr_e( $this->tag . '[' . $key . ']' ); ?>"><?php
							if ( array_key_exists( $key, $this->options ) ) { echo sanitize_text_field( $this->options[$key] ); }
						?></textarea>
					<?php else : ?>
					<input type="text"
						id="<?php esc_attr_e( $this->tag . '[' . $key . ']' ); ?>"
						name="<?php esc_attr_e( $this->tag . '[' .$key . ']' ); ?>"
						class="regular-text"
						value="<?php if ( array_key_exists( $key, $this->options ) ) { esc_attr_e( $this->options[$key] ); } ?>" />
					<?php endif; ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<p class="submit">
			<input type="submit"
				name="Submit"
				class="button-primary"
				value="<?php esc_attr_e( 'Save Changes', 'contact' ); ?>" />
		</p>
	</form>
</div>