<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package [Theme Name]
 */

/**
 * Google Analytics Tracking Code
 */
function google_analytics() {
	if ( $analytics = get_theme_mod( 'google_analytics' ) ) {
		echo $analytics;
	}
}
add_action( 'wp_head', 'google_analytics', 100 );

/**
 * Change excerpt dots
 */
function excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'excerpt_more' );

/**
 * Amend accepted mime types for Media Library
 * Allow SVG format
 */
function coplan_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'coplan_mime_types', 10, 1 );

/**
 * Add async and defer to JavaScript files
 */
function coplan_add_async_defer_attribute( $tag, $handle ) {
	if ( $handle === 'script' ) {
		return str_replace( ' src', ' async defer src', $tag );
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'coplan_add_async_defer_attribute', 10, 2 );
