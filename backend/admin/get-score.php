<?php

require('./autoload.php');

$contestant_id = Input::get('contestant_id');
$criteria_id = Input::get('criteria_id');

// $contestant_id = 17;
// $criteria_id = 36;

$contestant = new Contestant();

$con = $contestant->find($contestant_id);

$judge = new Judge();

$judges = $judge->findBy('event_id', $con->event_id);

$score = new Score();

$scores = $score->findBy('criteria_id', $criteria_id);

$html_table = '<h1>' . $con->contestant_name . '</h1>';
$html_table .= '<table class="table table-bordered table-hover">';
$html_table .= '<thead>';
$html_table .= '<tr>';
$html_table .= '<th>Judge Name</th>';
$html_table .= '<th>Score</th>';
$html_table .= '</tr>';
$html_table .= '</thead>';
$html_table .= '<tbody>';

foreach($judges as $j){
    $html_table .= '<tr>';
    $html_table .= '<td>' . $j->judge_name . '</td>';
    $html_table .= '<td>';
    foreach($scores as $s){
        if($s->judge_id == $j->id && $s->contestant_id == $contestant_id){
            $html_table .= $s->score;
        }
    }
    $html_table .= '</td>';
    $html_table .= '</tr>';
}

$html_table .= '</tbody>';
$html_table .= '<tfoot>';
$html_table .= '<tr>';
$html_table .= '<th>Total</th>';
$html_table .= '<th>';
$total = 0;
foreach($scores as $s){
    if($s->contestant_id == $contestant_id){
        $total += $s->score;
    }
}
$html_table .= $total;
$html_table .= '</th>';
$html_table .= '</table>';

echo $html_table;