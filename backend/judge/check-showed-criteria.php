<?php

require('./autoload.php');

$event_id = Input::get('event_id');

$event = new Event();

// check show criteria
try{
    $e = $event->find($event_id);

    $criteria = new Criteria();

    $cri = $criteria->findBy('event_id', $e->id);

    $cr = 0;

    foreach($cri as $c){
        if($c->is_show == 'true'){
            $cr = $c->id;
        }
    }
    
    if($cr != 0){
        echo json_encode([
            'status' => 'success',
            'message' => 'Criteria showed.',
            'event' => $e,
            'criteria' => $criteria->find($cr)
        ], JSON_PRETTY_PRINT);
    }else{
        echo json_encode([
            'status' => 'error',
            'message' => 'Criteria not showed.',
            'event' => $e,
            'criteria' => null
        ], JSON_PRETTY_PRINT);
    }
}catch(Exception $e){
    echo json_encode([
        'status' => 'error',
        'message' => 'Event not found.',
        'event' => null,
        'criteria' => null
    ], JSON_PRETTY_PRINT);
}

