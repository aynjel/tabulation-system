<?php

require('./autoload.php');

$judge = new Judge();

if(empty(Input::get('get_judge_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill up all fields!'
    ]);
    exit;
}else{
    echo json_encode($judge->find(Input::get('get_judge_id')));
}