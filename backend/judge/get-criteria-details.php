<?php

require('./autoload.php');

$criteria_id = Input::get('criteria_id');

try{

    $criteria = new Criteria();

    $cri = $criteria->find($criteria_id);
    
    if($cri){
        echo json_encode([
            'status' => 'success',
            'message' => 'Criteria found.',
            'data' => [
                'criteria_id' => $cri->id,
                'criteria_name' => $cri->criteria_name,
                'criteria_percentage' => $cri->criteria_percentage,
            ]
        ], JSON_PRETTY_PRINT);
    }else{
        echo json_encode([
            'status' => 'error',
            'message' => 'Criteria not found.',
        ], JSON_PRETTY_PRINT);
    }
}catch(Exception $e){
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ], JSON_PRETTY_PRINT);
}

