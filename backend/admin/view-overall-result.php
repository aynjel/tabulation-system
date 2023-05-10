<?php

require('./autoload.php');

$event_id = Input::get('event_id');

$event = new Event();

// view event result
$e = $event->find($event_id);

$contestant = new Contestant();

$contestants = $contestant->findBy('event_id', $event_id);

$criteria = new Criteria();

$criterias = $criteria->findBy('event_id', $event_id);

$judge = new Judge();

$judges = $judge->findBy('event_id', $event_id);

echo json_encode([
    'status' => 'success',
    'event' => $e,
    'contestants' => $contestants,
    'judges' => $judges,
    'criterias' => $criterias
]);