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
			foreach($events as $id=>$event) :
				$event_date = process_event_dates($event['dates']);
				$time = process_event_times($event['start_times'], $event['end_times'], $event['multiple_times']);
			?>
				<div id="event-<?php echo $id; ?>" class="event">
					<img class="event-image" src="<?php echo $event['image']; ?>">
					<div class="event-info">
						<h2 class="event-title"><?php echo $event['title']; ?></h2>
						<?php if($time != '') :?>
							<div class="event-time">
								<?php if($time['multiple_time'] && $time['time'] != '') : ?>
									<p class="event-date"><?php echo $event_date; ?></p>
									<?php echo  $time['time']; ?>
								<?php elseif(!$time['multiple_time'] && $time['time'] != '') : ?>
									<p class="event-date"><?php echo $event_date; ?> &ndash; <?php echo $time['time']; ?></p>
								<?php else: ?>
									<p class="event-date"><?php echo $event_date; ?></p>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						<?php if($event['ticket_link'] != '') : ?>
							<a class="cta-button" href="<?php echo $event['ticket_link']; ?>" target="_blank" data-event-category="External Link" data-event-action="Click" data-event-label="Events | <?php echo filter_var($event['title'], FILTER_SANITIZE_STRING); ?> | Tickets">Tickets</a>
						<?php endif; ?>
					</div>
					<div class="event-description">
						<?php echo $event['description']; //already has <p> tags ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="right-col">
			
		</div>
	</div>
</div>
<?php get_footer(); ?>
