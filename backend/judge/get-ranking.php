<?php

require('./autoload.php');

// get ranking by total score
try{

    $criteria_id = Input::get('criteria_id');
    $score = Input::get('score');
    
    $contestant = new Contestant();

    $contestants = $contestant->findBy('event_id', $contestant->find($criteria_id)->event_id);

    $ranking = 1;

    foreach($contestants as $c){
        if($c->id != $criteria_id){
            if($contestant->getScore($criteria_id, $c->id) > $score){
                if($contestant->getScore($criteria_id, $c->id) == $score){
                    $ranking++;
                }
            }
        }
    }

    echo json_encode([
        'status' => 'success',
        'data' => $ranking
    ]);
} catch(Exception $e){
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}