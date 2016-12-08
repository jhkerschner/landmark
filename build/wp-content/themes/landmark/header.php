<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <nav class="mega-nav">
    <div class="container">
      <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
      <div class="mega-nav-close"><?php include (get_template_directory().'/assets/images/close-x.svg'); ?></div>
    </div>
  </nav>
  <div class="wrapper">
    <div class="header">
      <div class="home-slider">
        <img class="header-mask" src="<?php echo get_bloginfo('template_url').'/assets/images/header-mask.png'; ?>" alt="">
        <ul class="bxslider">
          <li><img class="slide" src="<?php echo get_bloginfo('template_url').'/assets/images/slide-1.jpg'; ?>" alt=""></li>
          <li><img class="slide" src="<?php echo get_bloginfo('template_url').'/assets/images/slide-2.jpg'; ?>" alt=""></li>
        </ul>
        <div class="controls">
          <div id="bx-next" class="slider-control slider-control-right"><?php include (get_template_directory().'/assets/images/arrow-right.svg'); ?></div>
          <div id="bx-prev" class="slider-control slider-control-left"><?php include (get_template_directory().'/assets/images/arrow-left.svg'); ?></div>
        </div>
      </div>
      <div class="home-slider-container">
        <div class="header-logo-col">
          <a class="header-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php include (get_template_directory().'/assets/images/header-logo.svg'); ?></a>

        </div>
        <nav class="nav-triggers">
          <a class="hamburger" role="button" id="open-mega-nav"><?php include (get_template_directory().'/assets/images/hamburger.svg'); ?></a>
          <ul class="main-nav visible">
            <li class="main-nav-item">
              <a class="main-nav-link" href="">Box Office</a>
            </li>
            <li class="main-nav-item">
              <a class="main-nav-link" href="">Events</a>
            </li>
            <li class="main-nav-item">
              <a class="main-nav-link" href="">Membership</a>
            </li>
            <li class="main-nav-item">
              <a class="main-nav-link" href="">About</a>
            </li>
            <li class="main-nav-item">
              <a class="main-nav-link" href="">Rent</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="body">
      
