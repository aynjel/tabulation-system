<?php

require('./autoload.php');

$criteria = new Criteria();

$criteria_id = Input::get('criteria_id');

$criteria->update($criteria_id, ['is_show' => 'false']);

echo json_encode([
    'status' => 'success',
    'message' => 'Criteria is hidden'
]);