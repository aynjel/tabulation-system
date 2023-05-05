<?php

require('./autoload.php');

$criteria = new Criteria();

$criteria_id = Input::get('control_criteria_id');

$find_is_show_true = $criteria->findBy('is_show', 'true');
// update criteria where is_show = true
foreach($find_is_show_true as $is_show_true){
    $criteria->update($is_show_true->id, [
        'is_show' => 'false'
    ]);
}

$criteria->update($criteria_id, ['is_show' => 'true']);

echo json_encode([
    'status' => 'success',
    'message' => 'Criteria is now showing.'
]);