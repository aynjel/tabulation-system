<?php

require('./autoload.php');

$username = Input::get('username');
$password = Input::get('password');

// $username = 'xukyr';
// $password = 'Pa$$w0rd!';

$judge = new Judge();

if($judge->login($username, $password)){
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