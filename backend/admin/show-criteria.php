<?php

require './autoload.php';

$event_id = Input::get('event_id');
$criteria_id = Input::get('criteria_id');

$event = new Event();
$criteria = new Criteria();

// Update all criteria of the event to 'is_show' = 'false'
$criteria->updateByEventId($event_id, ['is_show' => 'false']);

// Update the specified criteria to 'is_show' = 'true'
$criteria->update($criteria_id, ['is_show' => 'true']);

$response = [
  'status' => 'success',
  'message' => 'Criteria is now shown'
];

echo json_encode($response);
