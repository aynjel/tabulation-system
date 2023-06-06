<?php

require('./autoload.php');

$tops = new Tops();

if(empty(Input::get('get_tops_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'tops id is required!'
    ]);
    exit;
}else{
    echo json_encode($tops->find(Input::get('get_tops_id')));
}