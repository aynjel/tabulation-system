<?php

require('./autoload.php');

$criteria_id = Input::get('criteria_id');

$criteria = new Criteria();

// view criteria result
$cri = $criteria->find($criteria_id);

$contestant = new Contestant();

$conts = $contestant->findBy('event_id', $cri->event_id, 'contestant_number', 'ASC');

$judge = new Judge();

$judges = $judge->findBy('event_id', $cri->event_id);

$score = new Score();

$scores = $score->findBy('criteria_id', $criteria_id);

$event = new Event();

$event = $event->find($cri->event_id);

echo json_encode([
    'status' => 'success',
    'criteria' => $cri,
    'contestants' => $conts,
    'judges' => $judges,
    'scores' => $scores,
    'event' => $event
]);