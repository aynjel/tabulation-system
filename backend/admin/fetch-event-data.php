<?php

require('./autoload.php');

$event_id = Input::get('event_id');

$event = new Event();
$e = $event->find($event_id);
$contestant = new Contestant();
$judge = new Judge();
$criteria = new Criteria();

echo json_encode([
    'contestants' => $contestant->findBy('event_id', $event_id, 'contestant_description'),
    'judges' => $judge->findBy('event_id', $event_id, 'judge_name'),
    'criterias' => $criteria->findBy('event_id', $event_id, 'criteria_name'),
    'event' => $e,
], JSON_PRETTY_PRINT);