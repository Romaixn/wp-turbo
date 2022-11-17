<?php
/**
 * Plugin Name:     TD Turbo Drive
 * Plugin URI:      https://wordpress.org/plugins/turbo-drive
 * Description:     Integrate Hotwired Turbo with WordPress, no page reload, no jQuery, no bullshit.
 * Author:          Romain Herault
 * Author URI:      https://rherault.dev
 * Text Domain:     turbo-drive
 * Domain Path:     /languages
 * Version:         0.2.0
 *
 * @package         Turbo_Drive
 */

add_action('wp_enqueue_scripts', function() {
	wp_enqueue_script('turbo-drive', plugins_url('/dist/main.js', __FILE__));
});

add_action('admin_head', function() {
	echo '<meta name="turbo-visit-control" content="reload">';
});

add_filter('script_loader_tag', function($tag) {
	return str_replace(' src', ' data-turbo-track="reload" src', $tag);
}, 10, 1);

add_filter('style_loader_tag', function($tag) {
	return str_replace(' href', ' data-turbo-track="reload" href', $tag);
}, 10, 1);
