<?php

require('./autoload.php');

$criteria_id = Input::get('criteria_id');
$contestant_id = Input::get('contestant_id');

$score = new Score();

$sco = $score->GetContestantScore($criteria_id, $contestant_id);

echo json_encode([
    'score' => $sco,
], JSON_PRETTY_PRINT);