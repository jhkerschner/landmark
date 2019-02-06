<?php 
/*
Template Name: Events
*/

get_header();
$args = array(
	'posts_per_page'   => -1,
	'meta_key'			=> 'start_date',
	'orderby'			=> 'meta_value',
	'order'				=> 'ASC',
	'post_type'        => 'events'
);
$events = get_posts( $args );


?>
<div class="container">
	<div class="row">
		<div class="left-col events">
			<h1>Events</h1>
			<?php 
			
			foreach($events as $post) : setup_postdata($post);
				$date_times = get_field('dates_times');
				$image = get_field('image');
				$ticket_link = get_field('ticket_link');

				//the_field('dates_times');
			?>
				<div id="event-<?php echo $id; ?>" class="event">
					<?php if( $image ) : ?>
						<img class="event-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
					<?php endif; ?>
					<div class="event-info">
						<h2 class="event-title"><?php the_title(); ?></h2>
							<div class="event-time">
								<p class="event-date"><?php format_dates( get_field('start_date'), get_field('end_date'), get_field('time') ); ?></p>
								<?php if( $date_times ) :
									process_date_times($date_times);
								endif; ?>

							</div>
						<?php if($ticket_link != '' && filter_var($ticket_link, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED)) : ?>
							<a class="cta-button" href="<?php echo $ticket_link; ?>" target="_blank" data-event-category="External Link" data-event-action="Click" data-event-label="Events | <?php the_title(); ?> | Tickets">Tickets</a>
						<?php endif; ?>
					</div>
					<div class="event-description">
						<?php the_excerpt(); ?>
					</div>
					<a class="cta-button" href="<?php the_permalink(); ?>" data-event-category="In-Page Nav" data-event-action="Click" data-event-label="Events | <?php the_title(); ?> | Read More">Read More</a>
				</div>
			<?php endforeach; wp_reset_postdata(); ?>
		</div>
		<div class="right-col">
			
		</div>
	</div>
</div>
<?php get_footer(); ?>
