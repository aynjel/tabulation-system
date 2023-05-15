<?php

require('./autoload.php');

try{
    $username = Input::get('username');
    $password = Input::get('password');
    $j = Input::get('judge');

    if($j == 'true'){
        $judge = new Judge();
        if($judge->login($username, $password)){
            echo json_encode([
                'status' => 'success',
                'message' => 'Login successful as judge',
                'user_type' => 'judge'
            ]);
        }else{
            echo json_encode([
                'status' => 'error',
                'message' => 'Judge credentials are invalid'
            ]);
        }
    }else{
        $user = new User();
        if($user->login($username, $password)){
            echo json_encode([
                'status' => 'success',
                'message' => 'Login successful as administator',
                'user_type' => 'admin'
            ]);
        }else{
            echo json_encode([
                'status' => 'error',
                'message' => 'Administrator credentials are invalid'
            ]);
        }
    }

    
}catch(Exception $e){
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid username or password ' . $e->getMessage()
    ]);
}
