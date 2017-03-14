<form id="commentform" class="contactform" method="post" action="#commentform">
	<?php wp_nonce_field( $this->tag, $this->tag . '_nonce' ); ?>
	<?php if ( count( $this->messages ) > 0 ) : ?>
	<div id="contact_response" class="<?php echo esc_attr( count( $this->messages['error'] ) > 0 ? 'error' : 'ok' ); ?>">
		<?php if ( isset( $this->messages['ok'] ) ) : ?>
			<p><?php esc_html_e( $this->messages['ok'] ); ?></p>
		<?php elseif ( is_array( $this->messages['error'] ) ) : ?>
		<ul>
			<li><?php echo implode( '</li><li>', array_map( $this->messages['error'], 'esc_html' ) ); ?></li>
		</ul>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	<p class="content_name">
		<input type="text"
			id="contact_name"
			name="contact[name]"
			tabindex="1"
			size="22"
			value="<?php if ( isset( $contact['name'] ) ) { esc_html_e( $contact['name'] ); } ?>" />
		<label for="contact_name">
			<small><?php esc_html_e( 'Name', 'contact' ); ?> (<?php esc_html_e( 'required', 'contact' ); ?>)</small>
		</label>
	</p>
	<p class="content_email">
		<input type="text"
			id="contact_email"
			name="contact[email]"
			tabindex="2"
			size="22"
			value="<?php if ( isset( $contact['email'] ) ) { esc_html_e( $contact['email'] ); } ?>" />
		<label for="contact_email">
			<small><?php esc_html_e( 'Email', 'contact' ); ?> (<?php esc_html_e( 'required', 'contact' ); ?>)</small>
		</label>
	</p>
	<p class="content_phone">
		<input type="text"
			id="contact_phone"
			name="contact[phone]"
			tabindex="3"
			size="22"
			value="<?php if ( isset( $contact['phone'] ) ) { esc_html_e( $contact['phone'] ); } ?>" />
		<label for="contact_phone">
			<small><?php esc_html_e( 'Phone', 'contact' ); ?></small>
		</label>
	</p>
	<p class="content_message">
		<textarea
			id="contact_message"
			name="contact[message]"
			tabindex="4"
			rows="10"
			cols="100%"><?php
				if ( isset( $contact['message'] ) ) { esc_html_e($contact['message']); }
			?></textarea>
	</p>
	<p class="content_submit">
		<input type="submit"
			tabindex="5"
			id="submit"
			name="contact[submit]"
			value="<?php _e( 'Send Message', 'contact' ); ?>" />
	</p>
</form>