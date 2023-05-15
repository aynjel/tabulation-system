<?php

require('./autoload.php');

// sign out 

$user = new User();

$user->logout();

$judge = new Judge();

$judge->logout();

echo json_encode([
    'status' => 'success',
    'message' => 'Logged out successfully'
]);