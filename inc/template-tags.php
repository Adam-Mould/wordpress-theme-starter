<?php
/**
 * Custom template tags for this theme
 *
 * @package [Theme Name]
 */

/**
 * Output address from theme settings
 */
function the_company_address() {
	if ( $contact_address = get_theme_mod( 'contact_address' ) ) {
		printf(
			'<address class="address">%s</address>',
			nl2br( $contact_address )
		);
	}
}


/**
 * Output email from theme settings
 */
function the_company_email() {
	if ( $contact_email = get_theme_mod( 'contact_email' ) ) {
		printf(
			'<a class="email" href="mailto:%1$s">%1$s</a>',
			$contact_email
		);
	}
}

/**
 * Output telephone from theme settings
 */
function the_company_telephone() {
	if ( $contact_telephone = get_theme_mod( 'contact_telephone' ) ) {
		// Trim whitespace for tel:
		$contact_telephone_trim = str_replace( ' ', '', $contact_telephone );

		printf(
			'<a class="telephone" href="tel:%s">%s</a>',
			$contact_telephone_trim,
			$contact_telephone
		);
	}
}

/**
 * Output social media list
 */
function the_social_media_list( $list_class = '' ) {
	$social_links = Customizer::social_media_list();

	if ( count( $social_links ) > 0 ) {
		echo '<ul class="' . $list_class . '">';

		foreach ( $social_links as $social_network ) {
			$link = get_theme_mod( $social_network );

			if ( $link ) {
				printf(
					'<li>
						<a href="%1$s" target="_blank" title="%2$s" class="%3$s">
							<span class="sr-only">%2$s</span>
						</a>
					</li>',
					$link,
					ucfirst( $social_network ),
					$social_network
				);
			}
		}

		echo '</ul>';
	}
}