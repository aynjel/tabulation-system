<?php

require('./autoload.php');

$event_id = Input::get('event_id');
$tops = new Tops();
$tops_list = $tops->findBy('event_id', $event_id);

if($tops_list){
    $html = '';
    
    $html .= '<table class="table table-bordered text-center">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th>Name</th>';
    $html .= '<th>View</th>';
    $html .= '<th>Display</th>';
    $html .= '<th>Action</th>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody>';
    foreach($tops_list as $top){
        $html .= '<tr>';
        $html .= '<td>'.$top->name.'</td>';
        $html .= '<td>';
        $html .= '<a href="./view-overall-result-tops.php?event_id='.$event_id.'&top_id='.$top->id.'" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>';
        $html .= '</td>';
        $html .= '<td>';
        if($top->is_show == 'false')
            $html .= '<a href="javascript:void(0);" class="btn btn-success btn-sm" onclick="showTops('.$top->id.', '.$top->event_id.')"><i class="bi bi-eye"></i> Show</a>';
        else
            $html .= '<a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="hideTops('.$top->id.')"><i class="bi bi-eye-slash"></i> Hide</a>';
        $html .= '</td>';
        $html .= '<td>';
        $html .= '<a href="javascript:void(0);" class="btn btn-primary btn-sm" onclick="editTops('.$top->id.')"><i class="bi bi-pencil-square"></i></a>';
        $html .= '<a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteTops('.$top->id.')"><i class="bi bi-trash"></i></a>';
        $html .= '</td>';
        $html .= '</tr>';
    }
    $html .= '</tbody>';
    $html .= '</table>';
    
    echo json_encode([
        'status' => 'success',
        'message' => 'tops list found!',
        'html' => $html
    ]);
}else{
    echo json_encode([
        'status' => 'error',
        'message' => 'tops list not found!'
    ]);
}