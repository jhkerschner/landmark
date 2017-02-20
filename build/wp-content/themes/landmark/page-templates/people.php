<?php 
/*
Template Name: Team
*/ 
get_header(); ?>
<div class="container">
  <div class="row">
    <div class="left-col">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>

        <div class="wysiwyg"><?php the_field('team_copy'); ?></div>
        <div class="people">
          <?php
          if(have_rows('staff', 'option')) : 
            while(have_rows('staff', 'option')) : the_row(); 
              get_template_part('template-parts/tp-team-member');
            endwhile; endif; ?>
        </div>

        <div class="wysiwyg"><?php the_field('board_of_trustees_copy'); ?></div>
        <div class="people">
          <?php
          if(have_rows('board_of_trustees', 'option')) : 
            while(have_rows('board_of_trustees', 'option')) : the_row(); 
              get_template_part('template-parts/tp-team-member');
            endwhile; endif; ?>
        </div>

        <div class="wysiwyg"><?php the_field('trustees_emeritus_copy'); ?></div>
        <div class="people">
          <?php
          if(have_rows('trustees_emeritus', 'option')) : 
            while(have_rows('trustees_emeritus', 'option')) : the_row(); 
              get_template_part('template-parts/tp-team-member');
          endwhile; endif; ?>
        </div>

        <div class="wysiwyg"><?php the_field('volunteer_copy'); ?></div>

        <div class="wysiwyg"><?php the_field('additional_copy'); ?></div>


      <?php endwhile; endif; ?>
    </div>
    <div class="right-col">
      <?php get_template_part('template-parts/tp-cta'); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
