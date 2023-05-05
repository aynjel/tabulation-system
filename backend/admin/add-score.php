<?php

require('./autoload.php');

$score = new Score();

if(empty(Input::get('create_event_id')) || empty(Input::get('create_judge_id')) || empty(Input::get('create_criteria_id')) || empty(Input::get('create_contestant_id')) || empty(Input::get('create_score'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill up all fields!'
    ]);
    exit;
}else{
    $score->create([
        'event_id' => Input::get('create_event_id'),
        'judge_id' => Input::get('create_judge_id'),
        'criteria_id' => Input::get('create_criteria_id'),
        'contestant_id' => Input::get('create_contestant_id'),
        'score' => Input::get('create_score'),
    ]);

    echo json_encode([
        'status' => 'success',
        'message' => 'score added successfully!'
    ]);
}