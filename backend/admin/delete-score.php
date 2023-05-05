<?php

require('./autoload.php');

$score = new Score();

if(empty(Input::get('delete_score_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill up all fields!'
    ]);
    exit;
}else{
    $score->delete(Input::get('delete_score_id'));
    
    echo json_encode([
        'status' => 'success',
        'message' => 'score deleted successfully!'
    ]);
}