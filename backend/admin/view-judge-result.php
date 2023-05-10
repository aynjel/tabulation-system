<?php

require('./autoload.php');

$judge_id = Input::get('judge_id');

$judge = new Judge();

// view judge result
$jud = $judge->find($judge_id);

$event = new Event();

$event = $event->find($jud->event_id);

$contestant = new Contestant();

$contestants = $contestant->findBy('event_id', $event->id);

$criteria = new Criteria();

$criterias = $criteria->findBy('event_id', $event->id);

echo json_encode([
    'status' => 'success',
    'contestants' => $contestants,
    'event' => $event,
    'judge' => $jud,
    'criteria' => $criterias
]);