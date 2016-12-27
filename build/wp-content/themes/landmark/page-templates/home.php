<?php 
/*
Template Name: Homepage
*/

get_header();
?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="container">
    <div class="home-features">
      <?php if(have_rows('features')) :
        while(have_rows('features')) : the_row(); 
        $image = get_sub_field('image');
        ?>
          <div class="cta">
            <h3 class="cta-title"><?php the_sub_field('title'); ?></h3>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="cta-image">
            <div class="cta-text"><?php the_sub_field('short_description'); ?></div>
            <a href="<?php the_sub_field('page_link'); ?>" class="cta-button" data-event-category="CTA" data-event-action="Click" data-event-label="Home | <?php the_sub_field('button_text'); ?>"><?php the_sub_field('button_text'); ?></a>
          </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
<?php endwhile; endif; ?>



<?php get_footer(); ?>