<?php

require('./autoload.php');

$event_id = Input::get('event_id');

$contestant = new Contestant();

$contestants = $contestant->findBy('event_id', $event_id);

$html_table = '';

foreach($contestants as $con){

    $html_table .= '<tr>';
    $html_table .= '<td class="text-center">' . $con->contestant_number . '</td>';
    $html_table .= '<td class="text-center">' . $con->contestant_description . '</td>';
    $html_table .= '<td class="text-center">' . $con->contestant_name . '</td>';
    $html_table .= '<td class="text-center">';
    $html_table .= '<form class="form-score" id="form-score-judge">';
    $html_table .= '<input type="hidden" name="contestant_id" value="' . $con->id . '">';
    $html_table .= '<input type="hidden" name="judge_id" value="' . Session::get('judge_id') . '">';
    $html_table .= '<input type="hidden" name="event_id" value="' . $event_id . '">';

    $html_table .= '<input type="number" class="form-control shadow border-dark text-center w-50 mx-auto" name="score" id="score" min="1" max="10" step="0.01" required>';

    $html_table .= '</form>';
    $html_table .= '</td>';
    $html_table .= '</tr>';
}

$html_table .= '<tr>';
$html_table .= '<td colspan="2" class="text-center">';
$html_table .= '<button type="button" id="submit-all-score" class="mt-3 btn btn-primary btn-lg text-center mx-auto" disabled>Submit</button>';
$html_table .= '</td>';
$html_table .= '<td colspan="2" class="text-center">';
$html_table .= '<button type="button" class="mt-3 btn btn-primary btn-lg text-center mx-auto" data-bs-toggle="modal" data-bs-target="#score-ranking-modal">Show Ranking</button>';
$html_table .= '</td>';
$html_table .= '</tr>';

echo $html_table;