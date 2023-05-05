<?php

require('./autoload.php');

$event = new Event();

if(empty(Input::get('edit_event_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill up all fields!'
    ]);
    exit;
}else{
    $event->update(Input::get('edit_event_id'), [
        'event_name' => Input::get('edit_event_name'),
        'event_description' => Input::get('edit_event_description'),
        'event_date' => Input::get('edit_event_date'),
        'event_time' => Input::get('edit_event_time'),
        'event_venue' => Input::get('edit_event_venue'),
    ]);
    
    echo json_encode([
        'status' => 'success',
        'message' => 'Event updated successfully!'
    ]);
}