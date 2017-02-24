<?php 
/*
Template Name: Corporate Sponsors
*/

get_header();
?>

<div class="container">
  <?php 
  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <div class="wysiwyg"><?php the_content(); ?></div>
    <div class="corp-sponsors">
      <?php 
      if(have_rows('corporate_sponsors')) : 
        while(have_rows('corporate_sponsors')) : the_row();
        $sponsor = get_sub_field('sponsor_logo');
        ?>

          <div class="corp-sponsor-logo">
            <?php if(get_sub_field('sponsor_url')) : ?>
            <a href="<?php echo get_sub_field('sponsor_url'); ?>" target="_blank">
            <?php endif; ?>
              <img src="<?php echo $sponsor['url']; ?>" alt="<?php echo $sponsor['alt']; ?>">
            <?php if(get_sub_field('sponsor_url')) : ?>
            </a>
            <?php endif; ?>
          </div>

    <?php endwhile; endif; ?>
    </div>

  <?php endwhile; endif; ?>
</div>



<?php get_footer(); ?>