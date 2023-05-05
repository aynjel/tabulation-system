<?php

require('./autoload.php');

$ss = new Score();

$event_id = Input::get('event_id');
$judge_id = Input::get('judge_id');
$criteria_id = Input::get('criteria_id');
$contestant_id = Input::get('contestant_id');
$score = Input::get('score');

if(empty($score)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Please enter a score!'
    ]);
}else{
    $ss->create([
        'event_id' => $event_id,
        'judge_id' => $judge_id,
        'criteria_id' => $criteria_id,
        'contestant_id' => $contestant_id,
        'score' => $score
    ]);

    echo json_encode([
        'status' => 'success',
        'message' => 'Score added successfully!'
    ]);
}