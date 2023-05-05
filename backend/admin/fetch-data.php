<?php

require('./autoload.php');

$event = new Event();
$contestant = new Contestant();
$judge = new Judge();
$criteria = new Criteria();

echo json_encode([
    'events' => $event->fetchEvents(),
    'contestants' => $contestant->fetchContestants(),
    'judges' => $judge->fetchJudges(),
    'criterias' => $criteria->fetchCriterias()
], JSON_PRETTY_PRINT);