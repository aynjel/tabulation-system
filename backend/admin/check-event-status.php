<?php

require('./autoload.php');

$event_id = Input::get('event_id');

$event = new Event();
$e = $event->find($event_id);
$contestant = new Contestant();
$judge = new Judge();
$criteria = new Criteria();

echo json_encode([
    
    'event_status' => $e->is_start,
], JSON_PRETTY_PRINT);