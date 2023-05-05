<?php

require('./autoload.php');

$event = new Event();

if(empty(Input::get('delete_event_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill up all fields!'
    ]);
    exit;
}else{
    $event->delete(Input::get('delete_event_id'));
    
    echo json_encode([
        'status' => 'success',
        'message' => 'Event deleted successfully!'
    ]);
}