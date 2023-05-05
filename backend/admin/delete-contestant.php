<?php

require('./autoload.php');

$contestant = new Contestant();

if(empty(Input::get('delete_contestant_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill up all fields!'
    ]);
    exit;
}else{
    $contestant->delete(Input::get('delete_contestant_id'));
    
    echo json_encode([
        'status' => 'success',
        'message' => 'contestant deleted successfully!'
    ]);
}