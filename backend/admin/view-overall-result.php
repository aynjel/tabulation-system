<?php

require('./autoload.php');

$event_id = Input::get('event_id');

$event = new Event();

$e = $event->find($event_id);

$contestant = new Contestant();

$contestants = $contestant->findBy('event_id', $event_id);

$criteria = new Criteria();

$criterias = $criteria->findBy('event_id', $event_id);

$judge = new Judge();

$judges = $judge->findBy('event_id', $event_id);

$html = "";


$html .= "<div class='table-responsive'>";

$html .= "<h1 class='text-center text-uppercase'>" . ucwords(str_replace('_', ' ', $e->event_name)) . " | Live Result</h1>";
$html .= "<h3 class='text-center text-uppercase'>" . ucwords(str_replace('_', ' ', $e->event_description)) . "</h3>";
$html .= "<p class='text-center text-uppercase'>(" . date('F d, Y', strtotime($e->event_date)) . " - " . date('H:i A', strtotime($e->event_time)) . ")</p>";

$html .= "<table class='table table-bordered table-striped border-dark table-hover table-hover table-sm text-center align-middle' style='width: 100%; font-size: 12px; white-space: nowrap; align-items: center;' id='overall-result-table'>";
$html .= "<thead>";

$html .= "<tr class='text-uppercase text-center'>";
$html .= "<th colspan='3'>Contestant</th>";

foreach ($criterias as $criteria) {
    $html .= "<th colspan='2'>" . $criteria->criteria_name . "</th>";
    // $html .= "<th colspan='2'>" . $criteria->criteria_name . " (". $criteria->criteria_percentage .")% </th>";
}

$html .= "<th colspan='2'>Overall</th>";
$html .= "<th rowspan='2'>Ranking</th>";
$html .= "</tr>";

$html .= "<tr class='text-center'>";
$html .= "<th>No.</th>";
$html .= "<th>Contingent</th>";
$html .= "<th>Name</th>";

foreach ($criterias as $criteria) {
    $html .= "<th>Score</th>";
    $html .= "<th>Rank</th>";
}

$html .= "<th>Total Score</th>";
$html .= "<th>Total Rank</th>";
$html .= "</tr>";

$html .= "</thead>";
$html .= "<tbody>";

// sort by total score average
usort($contestants, function ($a, $b) use ($criterias, $contestant) {
    $total_a = 0;
    $total_b = 0;

    foreach ($criterias as $cri) {
        $total_a += $contestant->GetTotalByCriteria($cri->id, $a->id)['score'];
        $total_b += $contestant->GetTotalByCriteria($cri->id, $b->id)['score'];
    }

    return $total_b <=> $total_a;
});

$prev_score = null;
$prev_rank = 1;
$prev_total_rank = 1;

foreach ($contestants as $key => $c) {
    $html .= "<tr class='text-center'>";
    $html .= "<td>" . $c->contestant_number . "</td>";
    $html .= "<td>" . $c->contestant_description . "</td>";
    $html .= "<td>" . $c->contestant_name . "</td>";

    $total_score = 0;
    $total_rank = 0;
    $total_scr = 0;

    foreach ($criterias as $cri) {

        $res = $contestant->GetAverageByCriteria($cri->id, $c->id);

        $total_score += ($res['score'] / 100) * $cri->criteria_percentage;
        $total_rank += $res['rank'];
        
        $html .= "<td>" . round($res['score'], 2) . "</td>";
        $html .= "<td>" . round($res['rank'], 2) . "</td>";

    }
    
    $total_score = round($total_score, 2);
    $total_rank = round($total_rank, 2);

    $html .= "<td>" . $total_score . "</td>";
    $html .= "<td>" . $total_rank . "</td>";

    if($prev_score == $total_score){
        if($prev_total_rank == $total_rank){
            $html .= '<td>'.$prev_rank.'</td>';
        }elseif($prev_total_rank < $total_rank){
            $html .= '<td>'.($key + 1).' - Rank Lose</td>';
            $prev_rank = $key + 1;
        }elseif($prev_total_rank > $total_rank){
            $html .= '<td>'.($key).' - Rank Win</td>';
        }else{
            $html .= '<td>'.$prev_rank.'</td>';
        }
    }else{
        $html .= '<td>'.($key + 1).'</td>';
        $prev_rank = $key + 1;
    }

    $prev_score = $total_score;
    $prev_total_rank = $total_rank;

    $html .= "</tr>";
}

$html .= "</tbody>";
$html .= "</table>";
$html .= "</div>";

echo $html;
