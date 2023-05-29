<?php

require('./autoload.php');

// $event_id = Input::get('event_id');
$event_id = 38;

$event = new Event();

$e = $event->find($event_id);

$contestant = new Contestant();

$contestants = $contestant->findBy('event_id', $event_id);

$criteria = new Criteria();

$criterias = $criteria->findBy('event_id', $event_id);

$html = "";

$html .= "<table border='1'>";
$html .= "<thead>";

$html .= "<tr>";
$html .= "<th colspan='3'>Contestant</th>";

foreach ($criterias as $criteria) {
    $html .= "<th colspan='2'>" . $criteria->criteria_name . "</th>";
}

$html .= "<th colspan='2'>Overall Total</th>";
$html .= "<th rowspan='2'>Ranking</th>";
$html .= "</tr>";

$html .= "<tr>";
$html .= "<th>No.</th>";
$html .= "<th>Baranggay</th>";
$html .= "<th>Name</th>";

foreach ($criterias as $criteria) {
    $html .= "<th>Score</th>";
    $html .= "<th>Rank</th>";
}

$html .= "<th>Score</th>";
$html .= "<th>Rank</th>";

$html .= "</tr>";

$html .= "</thead>";
$html .= "<tbody>";

usort($contestants, function ($a, $b) use ($criterias, $contestant) {
    $total_a = 0;
    $total_b = 0;

    foreach ($criterias as $cri) {
        $total_a += $contestant->GetAverageByCriteria($cri->id, $a->id)['score'];
        $total_b += $contestant->GetAverageByCriteria($cri->id, $b->id)['score'];
    }

    return $total_b <=> $total_a;
});

foreach ($contestants as $cont_key => $cont) {

    $html .= "<tr>";
    $html .= "<td>" . $cont->contestant_number . "</td>";
    $html .= "<td>" . $cont->contestant_description . "</td>";
    $html .= "<td>" . $cont->contestant_name . "</td>";

    $total_score = 0;
    $total_rank = 0;

    foreach ($criterias as $cri) {

        $s = $contestant->GetTotalByCriteria($cri->id, $cont->id);

        $total_score += $s['score'];
        $total_rank += $s['rank'];

        $html .= "<td>" . $s['score'] . "</td>";
        $html .= "<td>" . $s['rank'] . "</td>";
    }

    $total_score = round($total_score, 2);

    $html .= "<td>" . $total_score . "</td>";
    $html .= "<td>" . $total_rank . "</td>";

    $html .= "</tr>";
}

$html .= "</tbody>";
$html .= "</table>";

echo $html;
