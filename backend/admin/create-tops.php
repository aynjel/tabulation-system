<?php

require('./autoload.php');

$tops = new Tops();

if(empty(Input::get('event_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'event id is required!'
    ]);
    exit;
}else{
    $tops->create([
        'event_id' => Input::get('event_id'),
        'name' => Input::get('name'),
    ]);

    echo json_encode([
        'status' => 'success',
        'message' => 'score added successfully!'
    ]);
}