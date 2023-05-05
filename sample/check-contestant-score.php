<?php

require('./autoload.php');

$contestant_id = 26;
$criteria_id = 36;

$score = new Score();

$scores_by_criteria = $score->findBy('criteria_id', $criteria_id);

foreach($scores_by_criteria as $sbc){
    if($sbc->contestant_id == $contestant_id){
        echo json_encode([
            'status' => 'success',
            'message' => 'Score found.',
            'score' => $sbc->score
        ]);
    }else{
        echo json_encode([
            'status' => 'error',
            'message' => 'No score found.'
        ]);
    }
}