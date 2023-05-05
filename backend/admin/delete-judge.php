<?php

require('./autoload.php');

$judge = new Judge();

if(empty(Input::get('delete_judge_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill up all fields!'
    ]);
    exit;
}else{
    $judge->delete(Input::get('delete_judge_id'));
    
    echo json_encode([
        'status' => 'success',
        'message' => 'judge deleted successfully!'
    ]);
}