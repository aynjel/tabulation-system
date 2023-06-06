<?php

require './autoload.php';

$top_id = Input::get('top_id');
$event_id = Input::get('event_id');

$top = new Tops();

$event = new Event();

// Update all criteria of the event to 'is_show' = 'false'
$top->updateByEventId($event_id, ['is_show' => 'false']);

$top->update($top_id, ['is_show' => 'true']);

$response = [
  'status' => 'success',
  'message' => 'Criteria is now shown',
  'event_id' => $top->find($top_id)->event_id
];

echo json_encode($response);
