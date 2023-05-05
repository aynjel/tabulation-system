<?php

require('./autoload.php');

$event_id = Input::get('event_id');

$event = new Event();

$e = $event->find($event_id);

if($e->is_start == 'true'){
    echo json_encode([
        'status' => 'started',
        'message' => 'Event started.',
        'event' => $e
    ]);
}else{
    echo json_encode([
        'status' => 'not_started',
        'message' => 'Event not started.',
        'event' => $e
    ]);
}