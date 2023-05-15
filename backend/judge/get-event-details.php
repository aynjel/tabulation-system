<?php

require('./autoload.php');

try{

    $judge = new Judge();
    $event = new Event();

    $event_data = $event->find($judge->getEventId());
    echo json_encode([
        'status' => 'success',
        'message' => 'Event details found',
        'data' => [
            'event_id' => $event_data->id,
            'event_name' => $event_data->event_name,
            'event_description' => $event_data->event_description,
            'event_date' => $event_data->event_date,
            'event_time' => $event_data->event_time,
            'event_venue' => $event_data->event_venue,
        ],
    ], JSON_PRETTY_PRINT);
} catch(Exception $e){
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}