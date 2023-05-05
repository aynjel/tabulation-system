<?php

require('./autoload.php');

$criteria = new Criteria();

if(empty(Input::get('get_criteria_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill up all fields!'
    ]);
    exit;
}else{
    echo json_encode($criteria->find(Input::get('get_criteria_id')));
}