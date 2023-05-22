<?php

require('./autoload.php');

$event_id = Input::get('event_id');
// $event_id = 38;

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

$html .= "<table class='table table-bordered table-striped border-dark table-hover table-hover table-sm text-center align-middle' style='width: 100%; font-size: 14px;' id='overall-result-table'>";
$html .= "<thead>";

$html .= "<tr class='text-uppercase text-center'>";
$html .= "<th colspan='3'>Contestant</th>";

foreach ($criterias as $criteria) {
    $html .= "<th colspan='2'>" . $criteria->criteria_name . "</th>";
}

$html .= "<th colspan='2'>Score</th>";
$html .= "<th colspan='3'>Rank</th>";
$html .= "</tr>";

$html .= "<tr class='text-center'>";
$html .= "<th>No.</th>";
$html .= "<th>Baranggay</th>";
$html .= "<th>Name</th>";

foreach ($criterias as $criteria) {
    $html .= "<th>Score</th>";
    $html .= "<th>Rank</th>";
}

$html .= "<th>Total</th>";
$html .= "<th>Average</th>";
$html .= "<th>Total</th>";
$html .= "<th>Average</th>";
$html .= "<th>No.</th>";
$html .= "</tr>";

$html .= "</thead>";
$html .= "<tbody>";

// sort by total score
usort($contestants, function ($a, $b) use ($criterias, $contestant) {
    $total_a = 0;
    $total_b = 0;

    foreach ($criterias as $criteria) {
        $total_a += $contestant->GetTotalByCriteria($criteria->id, $a->id)['score'];
        $total_b += $contestant->GetTotalByCriteria($criteria->id, $b->id)['score'];
    }

    return $total_b <=> $total_a;
});

$prev_score = null;
$prev_rank = 1;

foreach ($contestants as $key => $c) {
    $html .= "<tr class='text-center'>";
    $html .= "<td>" . $c->contestant_number . "</td>";
    $html .= "<td>" . $c->contestant_description . "</td>";
    $html .= "<td>" . $c->contestant_name . "</td>";

    $total_score = 0;
    $total_rank = 0;

    $total_score_average = 0;
    $total_rank_average = 0;

    foreach ($criterias as $cri) {

        $scr = $contestant->GetTotalByCriteria($cri->id, $c->id)['score'];
        $rnk = $contestant->GetTotalByCriteria($cri->id, $c->id)['rank'];

        $tscr = $contestant->GetAverageByCriteria($cri->id, $c->id)['score'];
        $trnk = $contestant->GetAverageByCriteria($cri->id, $c->id)['rank'];
        
        $total_score += $tscr;
        $total_rank += $trnk;
        
        $html .= "<td>".$total_score_average."</td>";
        $html .= "<td>".$total_rank_average."</td>";

    }

    $html .= "<td>" . $total_score . "</td>";
    $html .= "<td>" . number_format($total_score_average / count($criterias), 2) . "</td>";
    $html .= "<td>" . $total_rank . "</td>";
    $html .= "<td>" . number_format($total_rank_average / count($criterias), 2) . "</td>";

    if($prev_score == $total_score_average){
        $html .= '<td>'.$prev_rank.'</td>';
    }else{
        $html .= '<td>'.($key + 1).'</td>';
        $prev_rank = $key + 1;
    }

    $html .= "</tr>";
}

$html .= "</tbody>";
$html .= "</table>";
$html .= "</div>";

echo $html;
