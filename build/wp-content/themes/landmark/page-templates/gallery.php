<?php 
/*
Template Name: Gallery
*/

get_header();
?>

<div class="container">
  <?php 
  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  	<div class="wysiwyg"><?php the_content(); ?></div>
    <div class="gallery">
      <?php $images = get_field('photos'); foreach( $images as $image ) : ?>
        <div class="gallery-image" style="background-image: url('<?php echo $image['url']; ?>')">
          <a href="<?php echo $image['url']; ?>" class="fancybox" rel="group">
          </a>
        </div>
      <?php endforeach; ?>
    </div>

  <?php endwhile; endif; ?>
</div>



<?php get_footer(); ?>