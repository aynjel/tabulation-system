<?php

require('./autoload.php');

$event_id = Input::get('event_id');

$contestant = new Contestant();

$cons = $contestant->findBy('event_id', $event_id);

if($cons){

    echo json_encode([
        'status' => 'success',
        'message' => 'Contestant found.',
        'data' => $cons
    ]);

}else{
    echo json_encode([
        'status' => 'error',
        'message' => 'No contestant found.'
    ]);
}