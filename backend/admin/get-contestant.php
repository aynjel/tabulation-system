<?php

require('./autoload.php');

$contestant = new Contestant();

if(empty(Input::get('get_contestant_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill up all fields!'
    ]);
    exit;
}else{
    echo json_encode($contestant->find(Input::get('get_contestant_id')));
}