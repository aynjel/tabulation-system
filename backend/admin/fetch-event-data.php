<?php

require('./autoload.php');

$event_id = Input::get('event_id');

$event = new Event();
$contestant = new Contestant();
$judge = new Judge();
$criteria = new Criteria();

echo json_encode([
    'contestants' => $contestant->findBy('event_id', $event_id),
    'judges' => $judge->findBy('event_id', $event_id),
    'criterias' => $criteria->findBy('event_id', $event_id)
], JSON_PRETTY_PRINT);