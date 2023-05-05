<?php

require('./autoload.php');

$username = Input::get('username');
$password = Input::get('password');

// $username = 'admin';
// $password = 'admin';

$user = new User();

if($user->login($username, $password)){
    echo json_encode([
        'status' => 'success',
        'message' => 'Login successful'
    ]);
}else{
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid username or password'
    ]);
}