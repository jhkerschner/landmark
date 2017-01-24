<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<script src="https://use.typekit.net/buw2zfy.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png">
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>
<?php get_template_part('template-parts/tp-google-analytics'); ?>
</head>
<body <?php body_class(); ?>>
  <div class="site-wrapper">
    <nav class="mega-nav">
      <div class="container">
        <div class="mega-nav-close"><?php include (get_template_directory().'/assets/images/close-x.svg'); ?></div>
        <?php wp_nav_menu( array( 'menu' => 'mega-menu', 'walker' => new nav_walker() ) ); ?>
      </div>
    </nav>
    <div class="wrapper">
      <div class="header">
        <?php if (is_front_page()) : ?>
          <?php get_template_part('template-parts/tp-home-slider'); ?>
        <? else: ?>
          <div class="subpage-banner">
            <img src="<?php echo get_bloginfo('template_url').'/assets/images/subpage-banner.jpg'; ?>" alt="">
          </div>
        <?php endif; ?>
        <div class="header-container">
          <div class="header-logo-col">
            <a class="header-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php include (get_template_directory().'/assets/images/header-logo.svg'); ?></a>

          </div>
          <nav class="nav-triggers">
            <a class="hamburger" role="button" id="open-mega-nav"><?php include (get_template_directory().'/assets/images/hamburger.svg'); ?></a>
            <?php wp_nav_menu( array( 'menu' => 'top-nav', 'walker' => new nav_walker() ) ); ?>
          </nav>
          <div class="buy-tickets"><a href="<?php the_field('buy_tickets_now','option'); ?>" target="_blank" class="buy-tickets">Buy Tickets</a></div>
        </div>
      </div>
      <div class="body">
        
