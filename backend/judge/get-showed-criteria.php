<?php

require('./autoload.php');


try{

    $judge = new Judge();

    $criteria = new Criteria();

    $cri = $criteria->findBy('event_id', $judge->getEventId());

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
            'data' => [
                'criteria_id' => $cr,
            ]
        ], JSON_PRETTY_PRINT);
    }else{
        echo json_encode([
            'status' => 'error',
            'message' => 'No criteria showed in this event.',
        ], JSON_PRETTY_PRINT);
    }
}catch(Exception $e){
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ], JSON_PRETTY_PRINT);
}

