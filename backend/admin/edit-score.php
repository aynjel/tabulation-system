<?php

require('./autoload.php');

$score = new Score();

if(empty(Input::get('edit_score_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill up all fields!'
    ]);
    exit;
}else{
    $score->update(Input::get('edit_score_id'), [
        'score' => Input::get('edit_score'),
        'criteria_id' => Input::get('edit_criteria_id'),
        'contestant_id' => Input::get('edit_contestant_id'),
        'judge_id' => Input::get('edit_judge_id'),
    ]);

    echo json_encode([
        'status' => 'success',
        'message' => 'score updated successfully!'
    ]);
}