<?php

require('./autoload.php');

try{
    $user = new User();

    $judge = new Judge();

    if($user->isLoggedIn()){
        $event = new Event();
        echo json_encode([
            'status' => 'success',
            'message' => 'Admin is logged in',
            'data' => [
                'user_id' => Session::get('user_id'),
                'user_name' => $user->getUserName(),
                'full_name' => $user->getFullName(),
                'user_type' => 'admin'
            ],
            'events' => $event->fetchEvents()
        ]);
    } else if($judge->isLoggedIn()) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Judge is logged in',
            'data' => [
                'user_id' => Session::get('judge_id'),
                'user_name' => $judge->getUserName(),
                'full_name' => $judge->getFullName(),
                'user_type' => 'judge'
            ],
            'events' => $event->fetchEvents()
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'User is not logged in'
        ]);
    }
} catch(Exception $e){
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}