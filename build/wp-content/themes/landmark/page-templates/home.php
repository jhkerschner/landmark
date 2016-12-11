<?php 
/*
Template Name: Homepage
*/

get_header();
?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="container">
    <div class="home-features">
      <div class="cta">
        <h3 class="cta-title">Rent the Landmark</h3>
        <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/cta-fpo.jpg" alt="" class="cta-image">
        <p class="cta-text">The Landmark Theatre is available for a wide range of activites, including, weddings, proms, corporate parties, fundraisers and more.</p>
        <a href="#" class="cta-button">More Information</a>
      </div>
      <div class="cta">
        <h3 class="cta-title">Rent the Landmark</h3>
        <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/cta-fpo.jpg" alt="" class="cta-image">
        <p class="cta-text">The Landmark Theatre is available for a wide range of activites, including, weddings, proms, corporate parties, fundraisers and more.</p>
        <a href="#" class="cta-button">More Information</a>
      </div>
      <div class="cta">
        <h3 class="cta-title">Rent the Landmark</h3>
        <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/cta-fpo.jpg" alt="" class="cta-image">
        <p class="cta-text">The Landmark Theatre is available for a wide range of activites, including, weddings, proms, corporate parties, fundraisers and more.</p>
        <a href="#" class="cta-button">More Information</a>
      </div>
    </div>
  </div>
<?php endwhile; endif; ?>



<?php get_footer(); ?>