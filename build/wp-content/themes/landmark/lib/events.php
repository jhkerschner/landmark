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
				'dates' => array($event['event_date']),
				'start_times' => array($event['start_time']),
				'end_times' => array($event['end_time']),
				'multiple_times' => array($event['multiple_times'])

				);
		elseif(array_key_exists($event['id'], $grouped_events)):
			$grouped_events[$event['id']]['dates'][] = $event['event_date'];
			$grouped_events[$event['id']]['start_times'][] = $event['start_time'];
			$grouped_events[$event['id']]['end_times'][] = $event['end_time'];
			$grouped_events[$event['id']]['multiple_times'][] = $event['multiple_times'];
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

function process_event_times($start, $end, $multiple) {
	$start_times = array_unique($start);
	$end_times = array_unique($end);
	$multiple = array_unique($multiple);
	$time_str = '';
	$multiple_time = false;

	if(!empty($start_times) && !in_array('00:00:00', $start_times)):
		$s_time = new DateTime($start_times[0]);
		$time_str .= $s_time->format('g:i a');

		//check for an end time and add it if we have it.
		if(!empty($end_times) && !in_array('00:00:00', $end_times)) :
			$e_time = new DateTime($end_times[0]);
			$time_str .= ' &ndash; '.$e_time;
		endif;

	elseif(!empty($multiple)):
		$multiple_time = true;
		$time_str .= '<ul>';
		$multiple = preg_replace('~[\r\n]+~', ',', $multiple[0]);
		if($multiple !== '') :
			$multiple = explode(',',$multiple);
				foreach($multiple as $t) :
					//$time = preg_replace('~[\r\n]+~', '', $t);
					$time_str .= '<li>'.$t.'</li>';
				endforeach;
			$time_str .= '</ul>';
		endif;
	else:
		$time_str .= '';
	endif;

	return array('multiple_time'=>$multiple_time, 'time'=>$time_str);

}