<?php
/**
* Remove WordPress emjoi stuff
**/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

add_action( 'after_setup_theme', 'landmark_setup' );
function landmark_setup()
{
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
}

add_action( 'wp_enqueue_scripts', 'landmark_load_scripts' );
function landmark_load_scripts()
{
	//remove WordPress's jQuery and jquery migrate
	wp_deregister_script('jquery'); 

  // remove WP embed script
  if (!is_admin()) {
    wp_deregister_script('wp-embed');
  }

	//load our own jQuery
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), '3.1.1', true);

	//load custom scripts
	wp_enqueue_script( 'landmark-js', get_template_directory_uri() . '/assets/js/script.min.js', array(), filemtime(get_template_directory() . '/assets/js/script.min.js'), true );

	wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAzwTdKCf1emgz3MeBCNQHDDVVcT_esQic&libraries=places&callback=initMap', array(), '', true);
	
}

add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);
function add_defer_attribute($tag, $handle) {
   $scripts_to_defer = array('google-maps');
   foreach($scripts_to_defer as $defer_script) :
      if ($defer_script === $handle) :
         return str_replace(' src', 'defer async src', $tag);
      endif;
   endforeach;
   return $tag;
}

add_filter('script_loader_tag', 'add_async_attribute', 10, 2);
function add_async_attribute($tag, $handle) {
   $scripts_to_async = array('google-maps');
   foreach($scripts_to_async as $async_script) :
      if ($async_script === $handle) :
         return str_replace(' src', ' async="async" src', $tag);
      endif;
   endforeach;
   return $tag;
}