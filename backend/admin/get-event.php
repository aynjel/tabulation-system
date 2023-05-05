<?php

require('./autoload.php');

$event = new Event();

if(empty(Input::get('get_event_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill up all fields!'
    ]);
    exit;
}else{
    echo json_encode($event->find(Input::get('get_event_id')));
}