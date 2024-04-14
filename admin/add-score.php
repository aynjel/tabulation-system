<?php
require('./autoload.php');

$event_id = 38;
$criteria_id = 58;
$contestant_id = Input::get('create_contestant_id');
$judge_id = 31;
$score = Input::get('score');

$ss = new Score();

$ss->create([
    'event_id' => $event_id,
    'judge_id' => $judge_id,
    'criteria_id' => $criteria_id,
    'contestant_id' => $contestant_id,
    'score' => $score
]);

header('location: index.php?page=manage');