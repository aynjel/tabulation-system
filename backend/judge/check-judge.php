<?php

require('./autoload.php');

try{

    $judge = new Judge();

    if($judge->isLoggedIn()) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Judge is logged in',
            'data' => [
                'user_name' => $judge->getUserName(),
                'full_name' => $judge->getFullName(),
                'event_id' => $judge->getEventId(),
                'judge_id' => $judge->getJudgeId(),
            ],
        ], JSON_PRETTY_PRINT);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Judge is not logged in'
        ]);
    }
} catch(Exception $e){
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}