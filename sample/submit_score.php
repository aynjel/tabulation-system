<?php

require('./autoload.php');

$judge = new Judge();

$contestant_id = Input::get('contestant_id');
$criteria_id = Input::get('criteria_id');
$judge_id = $judge->getJudgeId();
$event_id = $judge->getJudgeEventId();
$score = Input::get('score');

// $contestant_id = 5;
// $criteria_id = 1;
// $judge_id = 1;
// $event_id = 1;
// $score = 100;

$ss = new Score();

if(empty($score)){
    echo json_encode([
        'status' => 'error',
        'message' => 'Score is empty.'
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
        'message' => 'Score submitted.'
    ]);
}