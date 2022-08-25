<?php
/*
Plugin Name: geniusuran Core
Description: Used by millions, Akismet is quite possibly the best way in the world to <strong>protect your blog from spam</strong>. It keeps your site protected even while you sleep. To get started: activate the Akismet plugin and then go to your Akismet Settings page to set up your API key.
Version: 1.0
Author: Ura
License: GPLv2 or later
Text Domain: geniusuran-core
*/
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}
require plugin_dir_path(__FILE__) . '/inc/widget-about.php';
require plugin_dir_path(__FILE__) . '/inc/metaboxes.php';
require plugin_dir_path(__FILE__) . '/inc/acf.php';
require plugin_dir_path(__FILE__) . '/inc/custom_post_type.php';
require plugin_dir_path(__FILE__) . '/inc/gutenberg.php';



