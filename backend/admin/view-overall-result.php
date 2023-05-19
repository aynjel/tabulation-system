<?php

require('./autoload.php');

$event_id = Input::get('event_id');
// $event_id = 38;

$event = new Event();

// view event result
$e = $event->find($event_id);

$contestant = new Contestant();

$contestants = $contestant->findBy('event_id', $event_id);

$criteria = new Criteria();

$criterias = $criteria->findBy('event_id', $event_id);

$judge = new Judge();

$judges = $judge->findBy('event_id', $event_id);

$html = "<h1 class='text-center text-uppercase'>" . $e->event_name . "</h1>";
$html .= "<h3 class='text-center text-uppercase'>Overall Result - " . $e->event_description . "</h3>";

$html .= "<div class='table-responsive'>";
$html .= "<table class='table table-bordered border-dark table-hover table-hover table-sm text-center align-middle' style='width: 100%; font-size: 14px;' id='overall-result-table'>";
$html .= "<thead>";

$html .= "<tr class='text-center'>";
$html .= "<th>#</th>";
$html .= "<th colspan='2'>Contestant</th>";

foreach ($criterias as $criteria) {
    $html .= "<th colspan='2'>" . $criteria->criteria_name . "</th>";
}

$html .= "<th colspan='2'>Total</th>";
$html .= "</tr>";

$html .= "<tr class='text-center'>";
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

// sort by total rank
usort($contestants, function ($a, $b) use ($criterias, $contestant) {
    $total_a = 0;
    $total_b = 0;

    foreach ($criterias as $criteria) {
        $total_a += $contestant->GetTotalByCriteria($criteria->id, $a->id)['rank'];
        $total_b += $contestant->GetTotalByCriteria($criteria->id, $b->id)['rank'];
    }

    return $total_a <=> $total_b;
});

foreach ($contestants as $key => $c) {
    $html .= "<tr class='text-center'>";
    $html .= "<td>" . ($key + 1) . "</td>";
    $html .= "<td>" . $c->contestant_description . "</td>";
    $html .= "<td>" . $c->contestant_name . "</td>";

    $total_score = 0;
    $total_rank = 0;

    foreach ($criterias as $cri) {
        
        $html .= "<td>".$contestant->GetTotalByCriteria($cri->id, $c->id)['score']."</td>";
        $html .= "<td>".$contestant->GetTotalByCriteria($cri->id, $c->id)['rank']."</td>";

        $total_score += $contestant->GetTotalByCriteria($cri->id, $c->id)['score'];
        $total_rank += $contestant->GetTotalByCriteria($cri->id, $c->id)['rank'];
    }

    $html .= "<td>".$total_score."</td>";
    $html .= "<td>".$total_rank."</td>";
    $html .= "</tr>";
}

echo $html;