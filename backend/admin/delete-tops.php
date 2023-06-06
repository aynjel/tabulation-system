<?php

require('./autoload.php');

$tops = new Tops();

if(empty(Input::get('delete_tops_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'tops id is required!'
    ]);
    exit;
}else{
    $tops->delete(Input::get('delete_tops_id'));
    
    echo json_encode([
        'status' => 'success',
        'message' => 'tops deleted successfully!'
    ]);
}