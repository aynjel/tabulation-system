<?php

require('./autoload.php');

// $judge_id = Input::get('judge_id');
// $criteria_id = Input::get('criteria_id');
// $event_id = Input::get('event_id');

$judge_id = 1;
$criteria_id = 30;
$event_id = 32;

$judge = new Judge();

$j = $judge->find($judge_id);

$criteria = new Criteria();

$cri = $criteria->findBy('id', $criteria_id);

$contestant = new Contestant();

$contestants = $contestant->findBy('event_id', $event_id);

$score = new Score();

$scores = $score->findBy('judge_id', $judge_id);

foreach($scores as $s){
    echo $s->contestant_id . ' ' . $s->criteria_id . ' ' . $s->score . '<br>';
}