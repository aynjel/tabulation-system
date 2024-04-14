<?php

require('./autoload.php');

$top = new Tops();

$top_id = Input::get('top_id');

$top->update($top_id, ['is_show' => 'false']);

echo json_encode([
    'status' => 'success',
    'message' => 'Criteria is hidden',
    'event_id' => $top->find($top_id)->event_id
]);