<?php

require('./autoload.php');

$criteria_id = Input::get('criteria_id');
$contestant_id = Input::get('contestant_id');

// $criteria_id = 4;
// $contestant_id = 69;

$judge = new Judge();

$score = new Score();

$scores_by_judge = $score->findBy('judge_id', $judge->getJudgeId());

$score = 0;

foreach($scores_by_judge as $s) {

    if($s->contestant_id == $contestant_id && $s->judge_id == $judge->getJudgeId()) {
        $score += $s->score;
    }else{
        $score = 0;
    }

}

if($score == 0) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Score is empty!'
    ]);
}else{
    echo json_encode([
        'status' => 'success',
        'message' => 'Score added successfully!',
        'score' => $score,
    ]);
}