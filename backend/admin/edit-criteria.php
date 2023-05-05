<?php

require('./autoload.php');

$criteria = new Criteria();

if(empty(Input::get('edit_criteria_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill up all fields!'
    ]);
    exit;
}else{
    $criteria->update(Input::get('edit_criteria_id'), [
        'criteria_name' => Input::get('edit_criteria_name'),
        'criteria_percentage' => Input::get('edit_criteria_percentage'),
    ]);

    echo json_encode([
        'status' => 'success',
        'message' => 'criteria updated successfully!'
    ]);
}