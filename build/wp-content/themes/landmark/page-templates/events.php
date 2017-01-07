<?php 
/*
Template Name: Events
*/

get_header();

?>
<div class="container">
	<div class="row">
		<div class="left-col events">
			<h1>Events</h1>
			<?php 
			$events = get_landmark_events();
			foreach($events as $event) :
				$event_date = process_event_dates($event['dates']);
			?>
				<div class="event">
					<img class="event-image" src="<?php echo $event['image']; ?>">
					<div class="event-info">
						<h2 class="event-title"><?php echo $event['title']; ?></h2>
						<p class="event-date"><?php echo $event_date; ?></p>
						<?php echo $event['description']; //already has <p> tags ?>
						<?php if($event['ticket_link'] != '') : ?>
							<a class="cta-button" href="<?php echo $event['ticket_link']; ?>" target="_blank">Tickets</a>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="right-col">
			
		</div>
	</div>
</div>
<?php get_footer(); ?>
