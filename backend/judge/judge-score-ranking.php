<?php

require('./autoload.php');

$judge_id = Session::get('judge_id');
$criteria_id = Input::get('criteria_id');
$event_id = Input::get('event_id');

$score = new Score();

$event_scores = $score->findBy('event_id', $event_id);

// Sort the scores in descending order
usort($event_scores, function($a, $b) {
    return $b->score - $a->score;
});

$html_table = '';

$html_table .= '<table class="table table-bordered table-hover text-center align-middle" style="width: 100%;" id="judge-score-ranking-table">';
$html_table .= '<thead class="table-dark">';
$html_table .= '<tr>';
$html_table .= '<th class="text-center">Rank</th>';
$html_table .= '<th class="text-center">Description</th>';
$html_table .= '<th class="text-center">Name</th>';
$html_table .= '<th class="text-center">Score</th>';
$html_table .= '</tr>';
$html_table .= '</thead>';
$html_table .= '<tbody>';

$rank = 0;
$current_score = null;

foreach($event_scores as $sc){
    $contestant = new Contestant();
    $con = $contestant->find($sc->contestant_id);

    $html_table .= '<tr>';

    if ($sc->score != $current_score) {
        // if the score changes, update the rank
        $rank++;
        $current_score = $sc->score;
    }

    $html_table .= '<td class="text-center">' . $rank . '</td>';
    $html_table .= '<td class="text-center">' . $con->contestant_description . '</td>';
    $html_table .= '<td class="text-center">' . $con->contestant_name . '</td>';
    $html_table .= '<td class="text-center"><span class="badge bg-success rounded-pill">' . $sc->score . '</span></td>';
                
    $html_table .= '</tr>';
}


$html_table .= '</tbody>';
$html_table .= '</table>';

echo $html_table;
