<?php

require('./autoload.php');

$judge = new Judge();

if(empty(Input::get('edit_judge_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill up all fields!'
    ]);
    exit;
}else{
    $judge->update(Input::get('edit_judge_id'), [
        'judge_name' => Input::get('edit_judge_name'),
        'judge_password' => Input::get('edit_judge_password'),
    ]);

    echo json_encode([
        'status' => 'success',
        'message' => 'judge updated successfully!'
    ]);
}