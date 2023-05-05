<?php

require('./autoload.php');

$event = new Event();

if(empty(Input::get('event_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill up all fields!'
    ]);
    exit;
}else{
    $event->update(Input::get('event_id'), [
        'is_start' => 'false'
    ]);
    
    echo json_encode([
        'status' => 'success',
        'message' => 'Event stopped successfully!'
    ]);
}