<?php 
/*
Template Name: Sponsors
*/

get_header();
?>

<div class="container">
  <?php 
  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <div class="corp-sponsors">
      <a href="" class="corp-sponsor-logo">
        <img src="<?php echo get_bloginfo('template_url').'/assets/images/lm-logo.png'; ?>" alt="Lockheed Martin Logo">
      </a>
      <a href="" class="corp-sponsor-logo">
        <img src="<?php echo get_bloginfo('template_url').'/assets/images/lm-logo.png'; ?>" alt="Lockheed Martin Logo">
      </a>
      <a href="" class="corp-sponsor-logo">
        <img src="<?php echo get_bloginfo('template_url').'/assets/images/lm-logo.png'; ?>" alt="Lockheed Martin Logo">
      </a>
      <a href="" class="corp-sponsor-logo">
        <img src="<?php echo get_bloginfo('template_url').'/assets/images/lm-logo.png'; ?>" alt="Lockheed Martin Logo">
      </a>
    </div>

  <?php endwhile; endif; ?>
</div>



<?php get_footer(); ?>