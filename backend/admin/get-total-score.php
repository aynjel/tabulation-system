<?php

require('./autoload.php');

$contestant_id = Input::get('contestant_id');

// $contestant_id = 17;

$contestant = new Contestant();

$con = $contestant->find($contestant_id);

$judge = new Judge();

$judges = $judge->findBy('event_id', $con->event_id);

$criteria = new Criteria();

$criterias = $criteria->findBy('event_id', $con->event_id);

$html_table = '<h1>' . $con->contestant_name . '</h1>';
$html_table .= '<table class="table table-bordered table-hover">';
$html_table .= '<thead>';
$html_table .= '<tr>';
$html_table .= '<th>Criteria</th>';
$html_table .= '<th>Score</th>';
$html_table .= '<th>Percentage (%)</th>';
$html_table .= '</tr>';
$html_table .= '</thead>';
$html_table .= '<tbody>';

$total_score_percentage = 0;
foreach($criterias as $criteria){
    // get total score of percentage
    $total_score_percentage = $contestant->getScore($criteria->id, $con->id) * ($criteria->criteria_percentage / 100);
    $html_table .= '<tr>';
    $html_table .= '<td>' . $criteria->criteria_name . ' (' . $criteria->criteria_percentage . '%)</td>';
    $html_table .= '<td>' . $contestant->getScore($criteria->id, $con->id) . '</td>';
    $html_table .= '<td>' . $total_score_percentage . '</td>';
    $html_table .= '</tr>';
}

$html_table .= '</tbody>';

$html_table .= '<tfoot>';
$html_table .= '<tr>';
$html_table .= '<th>Total</th>';
$html_table .= '<th>' . $contestant->getTotalScore($con->id) . '</th>';
// add total score percentage here
$html_table .= '<th>' . $contestant->getTotalScorePercentage($con->id) . '</th>';
$html_table .= '</tr>';
$html_table .= '</tfoot>';

$html_table .= '</table>';

echo $html_table;