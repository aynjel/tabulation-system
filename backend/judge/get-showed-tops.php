<?php

require('./autoload.php');


try{

    $top = new Tops();

    $tops = $top->findBy('is_show', 'true');

    // get showed criteria
    $criteria = new Criteria();

    $cri = $criteria->findBy('is_show', 'true');

    if(count($tops) > 0){
        echo json_encode([
            'status' => 'success',
            'message' => 'Top showed.',
            'top' => $tops[0],
            'criteria' => $cri[0],
        ], JSON_PRETTY_PRINT);
    }else{
        echo json_encode([
            'status' => 'error',
            'message' => 'No top showed in this event.',
        ], JSON_PRETTY_PRINT);
    }

}catch(Exception $e){
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ], JSON_PRETTY_PRINT);
}