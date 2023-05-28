<?php

require('./autoload.php');

$event_id = Input::get('event_id');

$criteria = new Criteria();

$cri = $criteria->findBy('event_id', $event_id);

if($cri){
    $showed_criteria = $criteria->findBy('is_show', 'true');

    if($showed_criteria){
        echo json_encode([
            'status' => 'success',
            'message' => 'Showed criteria found.',
            'data' => $showed_criteria[0]
        ]);
    }else{
        echo json_encode([
            'status' => 'error',
            'message' => 'No showed criteria found.'
        ]);
    }

}else{
    echo json_encode([
        'status' => 'error',
        'message' => 'No criteria found.'
    ]);
}