<?php

require('./autoload.php');

// $event_id = 49;
$event_id = Input::get('event_id');

$criteria = new Criteria();

$cri = $criteria->findBy('event_id', $event_id);

$cr = 0;

foreach($cri as $c){
    if($c->is_show == 'true'){
        echo json_encode([
            'status' => 'success',
            'criteria' => $cr
        ], JSON_PRETTY_PRINT);
    }else{
        echo json_encode([
            'status' => 'error',
            'criteria' => null
        ], JSON_PRETTY_PRINT);
    }
}