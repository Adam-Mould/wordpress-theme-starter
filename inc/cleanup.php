<?php
/**
 * Theme Cleanup
 *
 * @package [Theme Name]
 */

/**
 * Remove ?ver= parameter from enqueued styles/scripts
 * Helps with caching asset files
 */
function remove_ver_param( $src ) {
  if ( strpos( $src, '?ver=' ) ) $src = remove_query_arg( 'ver', $src );
  return $src;
}
add_filter( 'style_loader_src', 'remove_ver_param', 10, 1 );
add_filter( 'script_loader_src', 'remove_ver_param', 10, 1 );

remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

// Remove injected CSS for recent comments widget
if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
  remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
}

// Remove WordPress default emoji scripts
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Remove WP Embed in WP 4.4+ (video embedding)
add_action( 'wp_footer', function(){
  wp_deregister_script( 'wp-embed' );
});
