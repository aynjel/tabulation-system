<?php

require('./autoload.php');

$judge_id = Input::get('judge_id');
$criteria_id = Input::get('criteria_id');
$contestant_id = Input::get('contestant_id');

// $judge_id = 1;
// $criteria_id = 1;
// $contestant_id = 1;

$contestant = new Contestant();

$score = $contestant->getScoreByJudge($judge_id, $criteria_id, $contestant_id);

$criteria = new Criteria();

$cri = $criteria->find($criteria_id);

$judge = new Judge();

$judges = $judge->findBy('event_id', $cri->event_id);

$total_score = 0;
foreach ($judges as $key => $value) {
    $total_score += $contestant->getScoreByJudge($value->id, $criteria_id, $contestant_id);
}

echo json_encode([
    'score' => $score,
    'total_score' => $total_score
]);