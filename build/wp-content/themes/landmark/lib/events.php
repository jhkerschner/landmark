<?php
function get_landmark_events() {
	$token = 'LaEedmyDYiOqEwCKsfti';
	$start_date = date('Y-m-d');
	$json = file_get_contents('https://cnyarts.org/api/eventsearch?t='.$token.'&ds='.$start_date);

	$events = json_decode($json,true);
	
	$grouped_events = array();
	foreach($events as $event) :
		if(!array_key_exists($event['id'], $grouped_events)) :
			$grouped_events[$event['id']] = array(
				'title' => $event['title'],
				'description' => $event['description'],
				'image' => str_replace('http://','https://',$event['main_image']),
				'ticket_link' => $event['ticket_link'],
				'dates' => array($event['event_date'])
				);
		elseif(array_key_exists($event['id'], $grouped_events)):
			$grouped_events[$event['id']]['dates'][] = $event['event_date'];
		else :
			//nothing to do
		endif;
	endforeach;

	return $grouped_events;
}

function process_event_dates($dates) {
	$num_dates = count($dates);
	if($num_dates > 1) :
		//determine if the date are one after the other
		$begin = new DateTime( $dates[0] );

		$last_array_item = end(array_keys($dates));
		$end = new DateTime( $dates[$last_array_item] );
		$end = $end->modify( '+1 day' ); 

		$interval = new DateInterval('P1D');
		$daterange = new DatePeriod($begin, $interval ,$end);

		$date_range_compare = array();
		foreach($daterange as $date){
		    $date_range_compare[] = $date->format("Y-m-d");
		}

		$range_diff = array_diff($dates, $date_range_compare);
		if(empty($range_diff)) :
			// dates are a range, lets show it that way
			$start = new DateTime($dates[0]);
	    	$start_year = $start->format('Y');

	    	$end = new DateTime($dates[$last_array_item]);
	    	$end_year = $end->format('Y');

	    	if($start_year === $end_year) :
	    		//start and end year are the same, only show year after the end date
	    		$event_date = $start->format('F j').' &ndash; '.$end->format('F j, Y');
	    	else :
	    		//start and end year are not the same, show year after start and end date
	    		$event_date = $start->format('F j, Y').' &ndash; '.$end->format('F j, Y');
	    	endif;

		else:
			//dates are not in a range, shoe each date seperated by a comma
			$formatted_dates = array();
			foreach($dates as $date) :
				$date = new DateTime($date);
				$formatted_dates[] = $date->format('F j, Y');
			endforeach;
			$event_date = implode($formatted_dates, ', ');
		endif;
	else :
		// we only have one date, display it.
		$date = new DateTime($dates[0]);
		$event_date = $date->format('F j, Y');
	endif;

	return $event_date;
}