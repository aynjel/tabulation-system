<?php

require('./autoload.php');

$judge = new Judge();

if(empty(Input::get('create_judge_name')) || empty(Input::get('create_judge_username')) || empty(Input::get('create_judge_password')) || empty(Input::get('create_event_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill up all fields!'
    ]);
    exit;
}else if($judge->findBy('judge_username', Input::get('create_judge_username'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'judge already exists!'
    ]);
    exit;
}else{
    $judge->create([
        'judge_name' => Input::get('create_judge_name'),
        'judge_username' => Input::get('create_judge_username'),
        'judge_password' => Input::get('create_judge_password'),
        'event_id' => Input::get('create_event_id'),
    ]);

    echo json_encode([
        'status' => 'success',
        'message' => 'judge added successfully!'
    ]);
}