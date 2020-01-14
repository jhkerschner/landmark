<?php 

get_header();
if( have_posts() ) : while( have_posts() ) : the_post();
?>
<div class="container">
	<div class="row">
		<div class="left-col events">
			<h1><?php the_title(); ?></h1>
				<div class="event">
					<?php 
					$hasImage = false;
					if( $image = get_field('image') ) : $hasImage = true; ?>
						<img class="event-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
					<?php endif; ?>
					<div class="event-info"<?php if(!$hasImage) : echo' style="float:none; width:100%;"'; endif; ?>>
							<div class="event-time">
								<p class="event-date"><?php format_dates( get_field('start_date'), get_field('end_date'), get_field('time') ); ?></p>
								<?php if( $date_times = get_field('dates_times') ) :
									process_date_times($date_times);
								endif; ?>
							</div>
						<?php 
						$ticket_link = get_field('ticket_link');
						if($ticket_link != '' /*&& filter_var($ticket_link, FILTER_VALIDATE_URL)*/) : ?>
							<a class="cta-button" href="<?php echo $ticket_link; ?>" target="_blank" data-event-category="External Link" data-event-action="Click" data-event-label="Events | <?php the_title(); ?> | Tickets">Tickets</a>
						<?php endif; ?>
					</div>
					<div class="event-description">
						<?php the_content(); ?>
					</div>
				</div>
		</div>
		<div class="right-col">
			
		</div>
	</div>
</div>
<?php endwhile; endif;?>
<?php get_footer(); ?>
