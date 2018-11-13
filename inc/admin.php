<?php
/**
 * Admin Panel Adjustments
 *
 * @package [Theme Name]
 */

/**
 * Hide Comments Functionality
 */

 // Remove Comments Menu Page
function remove_menus() {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'remove_menus' );

// Remove Comments Tab from Admin Bar
function admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'comments' );
}
add_action( 'wp_before_admin_bar_render', 'admin_bar_render' );
