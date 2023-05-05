<?php

require('./autoload.php');

$criteria = new Criteria();

if(empty(Input::get('delete_criteria_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill up all fields!'
    ]);
    exit;
}else{
    $criteria->delete(Input::get('delete_criteria_id'));
    
    echo json_encode([
        'status' => 'success',
        'message' => 'criteria deleted successfully!'
    ]);
}