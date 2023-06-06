<?php

require('./autoload.php');

$tops = new Tops();

if(empty(Input::get('edit_tops_id'))){
    echo json_encode([
        'status' => 'error',
        'message' => 'tops id is required!'
    ]);
    exit;
}else{
    $tops->update(Input::get('edit_tops_id'), [
        'name' => Input::get('edit_tops_name'),
    ]);

    echo json_encode([
        'status' => 'success',
        'message' => 'tops updated successfully!'
    ]);
}