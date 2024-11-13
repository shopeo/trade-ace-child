<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
	require_once 'vendor/autoload.php';
}

if (!function_exists('trade_ace_child_theme_setup')) {
	function trade_ace_child_theme_setup()
	{
		load_child_theme_textdomain('trade-ace-child', get_stylesheet_directory() . '/languages');
	}
}

add_action('after_setup_theme', 'trade_ace_child_theme_setup');

if (!function_exists('trade_ace_child_enqueue_scripts')) {
	function trade_ace_child_enqueue_scripts()
	{
		$theme_version = wp_get_theme()->get('Version');
		//style
		wp_enqueue_style('trade-ace-child-style', get_stylesheet_uri(), array(), $theme_version);
		wp_style_add_data('trade-ace-child-style', 'rtl', 'replace');

		//scripts
		wp_enqueue_script('trade-ace-child-script', get_stylesheet_directory_uri() . '/assets/js/app.js', array('jquery'), $theme_version);
		wp_script_add_data('trade-ace-child-script', 'async', true);
	}
}

add_action('wp_enqueue_scripts', 'trade_ace_child_enqueue_scripts', 20);
