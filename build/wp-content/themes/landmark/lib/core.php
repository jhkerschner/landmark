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
  add_theme_support( 'menus' );
  add_theme_support( 'woocommerce' );
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

  if(is_page_template('page-templates/gallery.php')) :
    wp_enqueue_style( 'fancybox-styles', get_template_directory_uri() . '/assets/css/fancybox.min.css',false,'1.1','all');
    wp_enqueue_script( 'fancybox-js', get_template_directory_uri() . '/assets/js/jquery.fancybox.pack.js', array(), filemtime(get_template_directory() . '/assets/js/jquery.fancybox.pack.js'), true );
  endif;

  //load custom scripts
  wp_enqueue_script( 'landmark-js', get_template_directory_uri() . '/assets/js/script.min.js', array(), filemtime(get_template_directory() . '/assets/js/script.min.js'), true );

  if(is_page_template('page-templates/gallery.php')) :
    $gallery_vars = array(
      'next' => file_get_contents(get_template_directory().'/assets/images/arrow-right.svg'),
      'prev' => file_get_contents(get_template_directory().'/assets/images/arrow-left.svg')
    );
  wp_localize_script( 'landmark-js', 'galleryArrows', $gallery_vars );
  endif;

  wp_enqueue_script( 'ie-polys', get_template_directory_uri() . '/assets/js/ie-polys.js', array(), filemtime(get_template_directory() . '/assets/js/ie-polys.js'), true );

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

/**
* Determine if a link is part of the site or not. 
**/
function is_site_link($target_url) {
  $search = array('http://','https://');
  $replace = array('','');

  $site_url = get_site_url(); 
  $site_url = parse_url($site_url);
  $target_url = parse_url($target_url);

  if($target_url['host'] != $site_url['host']) :
    return false;
  else :
    return true;
  endif;
}

function get_domain() {
  return preg_replace("/^(.*\.)?([^.]*\..*)$/", "$2", $_SERVER['HTTP_HOST']);
}