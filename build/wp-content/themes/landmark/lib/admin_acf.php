<?php
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Site Settings',
		'menu_title'	=> 'Site Settings',
		'menu_slug' 	=> 'Site-settings',
		'capability'	=> 'edit_posts',
		'position' 		=> 4.5,
		'redirect'		=> false
	));
}