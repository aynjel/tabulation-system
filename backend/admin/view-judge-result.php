<?php

require('./autoload.php');

try{
    $judge_id = Input::get('judge_id');
    // $judge_id = 24;

    $judge = new Judge();

    $j = $judge->find($judge_id);

    $event = new Event();
    
    $e = $event->find($j->event_id);

    $criteria = new Criteria();
    
    $criterias = $criteria->findBy('event_id', $j->event_id);
    
    $contestant = new Contestant();
    
    $contestants = $contestant->findBy('event_id', $j->event_id);

    $html_table = '<div class="table-responsive">';

    $html_table .= '<h1 class="text-center text-uppercase">'.$e->event_name.'</h1>';
    $html_table .= '<h3 class="text-center text-uppercase">'.$j->judge_name.'</h3>';
    $html_table .= '<h4 class="text-center text-uppercase">('.$e->event_description.')</h4>';

    $html_table .= '<table class="table table-bordered table-hover" style="width: 100%;" id="judge-result-table">';
    $html_table .= '<thead>';
    $html_table .= '<tr>';
    $html_table .= '<th>Number</th>';
    $html_table .= '<th>Baranggay</th>';
    $html_table .= '<th>Name</th>';

    foreach($criterias as $c){
        $html_table .= '<th>'.$c->criteria_name.'</th>';
    }

    $html_table .= '<th>Total</th>';
    $html_table .= '<th>Ranking</th>';
    $html_table .= '</tr>';
    $html_table .= '</thead>';
    $html_table .= '<tbody>';

    foreach($contestants as $con){
        $html_table .= '<tr>';
        $html_table .= '<td>'.$con->contestant_number.'</td>';
        $html_table .= '<td>'.$con->contestant_description.'</td>';
        $html_table .= '<td>'.$con->contestant_name.'</td>';

        $total = 0;
        $ranking = 0;

        foreach($criterias as $cri){
            $scr = $contestant->getScoreByJudge($j->id, $cri->id, $con->id);
            // get ranking by total score
            $ranking = $contestant->getRankingByJudge($judge_id, $cri->id, $con->id);
            $total += $scr;
            $html_table .= '<td>'. $scr .'</td>';
        }


        $html_table .= '<td>'.$total.'</td>';
        $html_table .= '<td>'.$ranking.'</td>';
        $html_table .= '</tr>';
    }

    $html_table .= '</tbody>';
    $html_table .= '</table>';

    $html_table .= '<div class="text-right" id="print-btn-contestant">';
    $html_table .= '<button class="btn btn-primary btn-sm" onclick="PrintJudgeResult()" id="print-btn-judge"><i class="fa fa-print"></i> Print Result</button>';
    $html_table .= '</div>';
    $html_table .= '</div>';

    echo json_encode([
        'status' => 'success',
        'message' => 'Judge result successfully generated.',
        'html' => $html_table
    ]);
} catch(Exception $e){
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}