<?php

require('./autoload.php');

$contestant = new Contestant();

if(empty(Input::get('create_contestant_number')) || empty(Input::get('create_contestant_name')) || empty(Input::get('create_contestant_description')) || empty(Input::get('create_event_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill up all fields!'
    ]);
    exit;
}else{
    $contestant->create([
        'contestant_number' => Input::get('create_contestant_number'),
        'contestant_name' => Input::get('create_contestant_name'),
        'contestant_description' => Input::get('create_contestant_description'),
        'event_id' => Input::get('create_event_id'),
    ]);

    echo json_encode([
        'status' => 'success',
        'message' => 'contestant added successfully!'
    ]);
}