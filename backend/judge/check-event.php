<?php

require('./autoload.php');

try{

    $judge = new Judge();

    $event = new Event();

    $e = $event->find($judge->getEventId());

    if($e->is_start == 'true'){
        echo json_encode([
            'status' => 'success',
            'message' => 'Event started.',
            'data' => [
                'event_status' => 'started',
            ]
        ]);
    }else{
        echo json_encode([
            'status' => 'error',
            'message' => 'Event not started.',
            'data' => [
                'event_status' => 'not_started',
            ]
        ]);
    }
} catch(Exception $e){
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}