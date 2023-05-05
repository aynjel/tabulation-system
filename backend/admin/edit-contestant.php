<?php

require('./autoload.php');

$contestant = new Contestant();

if(empty(Input::get('edit_contestant_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill up all fields!'
    ]);
    exit;
}else{
    $contestant->update(Input::get('edit_contestant_id'), [
        'contestant_number' => Input::get('edit_contestant_number'),
        'contestant_name' => Input::get('edit_contestant_name'),
        'contestant_description' => Input::get('edit_contestant_description'),
    ]);

    echo json_encode([
        'status' => 'success',
        'message' => 'contestant updated successfully!'
    ]);
}