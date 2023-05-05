<?php

require('./autoload.php');

$criteria = new Criteria();

if(empty(Input::get('create_criteria_name')) || empty(Input::get('create_criteria_percentage')) || empty(Input::get('create_event_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill up all fields!'
    ]);
    exit;
}else{
    $criteria->create([
        'criteria_name' => Input::get('create_criteria_name'),
        'criteria_percentage' => Input::get('create_criteria_percentage'),
        'event_id' => Input::get('create_event_id'),
    ]);

    echo json_encode([
        'status' => 'success',
        'message' => 'criteria added successfully!'
    ]);
}