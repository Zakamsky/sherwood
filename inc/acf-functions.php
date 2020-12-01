<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' => 'Общие данные',
		'menu_title' => 'Общие данные',
		'menu_slug' => 'general-settings',
		'capability' => 'edit_pages',
		'redirect' => false,
		'position' => '7.3',
		'icon_url' => 'dashicons-welcome-widgets-menus',
	));

}
