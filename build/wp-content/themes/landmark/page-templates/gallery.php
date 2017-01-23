<?php 
/*
Template Name: Gallery
*/

get_header();
?>



<?php 
if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	$images = get_field('photos');

	foreach( $images as $image ) : ?>
        <div style="width: 300px; height: 300px;">
            <a href="<?php echo $image['url']; ?>" class="fancybox" rel="group">
                 <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
            </a>
        </div>
    <?php endforeach; ?>

<?php endwhile; endif; ?>


<?php get_footer(); ?>