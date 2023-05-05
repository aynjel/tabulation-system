<?php

require('./autoload.php');

$event = new Event();

if(empty(Input::get('create_event_name')) || empty(Input::get('create_event_description')) || empty(Input::get('create_event_date')) || empty(Input::get('create_event_time')) || empty(Input::get('create_event_venue'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill up all fields!'
    ]);
    exit;
}else if($event->findBy('event_name', Input::get('create_event_name'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Event name already exists!'
    ]);
    exit;
}else{
    $event->create([
        'event_name' => Input::get('create_event_name'),
        'event_description' => Input::get('create_event_description'),
        'event_date' => Input::get('create_event_date'),
        'event_time' => Input::get('create_event_time'),
        'event_venue' => Input::get('create_event_venue'),
    ]);
    
    echo json_encode([
        'status' => 'success',
        'message' => 'Event added successfully!'
    ]);
}
