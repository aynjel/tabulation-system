<?php

require('./autoload.php');

$contestant_id = Input::get('contestant_id');

$contestant = new Contestant();

// view contestant result
$con = $contestant->find($contestant_id);

$event = new Event();

$event = $event->find($con->event_id);

$judge = new Judge();

$judges = $judge->findBy('event_id', $event->id);

$criteria = new Criteria();

$criterias = $criteria->findBy('event_id', $event->id);

echo json_encode([
    'status' => 'success',
    'contestant' => $con,
    'event' => $event,
    'judges' => $judges,
    'criteria' => $criterias
]);