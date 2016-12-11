<?php 
/*
Template Name: Events
*/

get_header();

?>

<?php 
$events = get_landmark_events();

foreach($events as $event) :
	$event_date = process_event_dates($event['dates']);
?>

	<div>
		<img src="<?php echo $event['image']; ?>" style="float:left:"></div>
		<div style="float:left;">
			<p class="event-title"><?php echo $event['title']; ?></p>
			<p class="event-date"><?php echo $event_date; ?></p>
			<?php echo $event['description']; //already has <p> tags ?>
			<?php if($event['ticket_link'] != '') : ?>
				<a href="<?php echo $event['ticket_link']; ?>" target="_blank">Tickets</a>
			<?php endif; ?>
		</div>
		<div style="clear:both;"></div>
	</div>


<?php endforeach; ?>




<?php get_footer(); ?>