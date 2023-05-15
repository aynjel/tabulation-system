<?php

require('./autoload.php');

try{
    $criteria_id = Input::get('criteria_id');
    // $criteria_id = 4;

    $criteria = new Criteria();
    
    $cri = $criteria->find($criteria_id);
    
    $contestant = new Contestant();
    
    $contestants = $contestant->findBy('event_id', $cri->event_id);
    
    $event = new Event();
    
    $e = $event->find($cri->event_id);
    
    $judge = new Judge();
    
    $judges = $judge->findBy('event_id', $cri->event_id);

    $html_table = '<div class="table-responsive">';

    $html_table .= '<h1 class="text-center text-uppercase">'.$e->event_name.'</h1>';
    $html_table .= '<h3 class="text-center text-uppercase">'.$cri->criteria_name.'</h3>';
    $html_table .= '<h4 class="text-center text-uppercase">('.$e->event_description.')</h4>';

    $html_table .= '<table class="table table-bordered table-hover" style="width: 100%;" id="criteria-result-table">';
    $html_table .= '<thead>';
    $html_table .= '<tr>';
    $html_table .= '<th>Number</th>';
    $html_table .= '<th>Baranggay</th>';
    $html_table .= '<th>Name</th>';

    foreach($judges as $j){
        $html_table .= '<th>'.$j->judge_name.'</th>';
        $html_table .= '<th>Ranking ('.$j->judge_name.')</th>';
    }

    $html_table .= '<th>Total</th>';
    $html_table .= '<th>Ranking</th>';
    $html_table .= '</tr>';
    $html_table .= '</thead>';
    $html_table .= '<tbody>';

    foreach($contestants as $c){
        $html_table .= '<tr>';
        $html_table .= '<td>'.$c->contestant_number.'</td>';
        $html_table .= '<td>'.$c->contestant_description.'</td>';
        $html_table .= '<td>'.$c->contestant_name.'</td>';

        $total = 0;

        foreach($judges as $j){
            $scr = $contestant->getScoreByJudge($j->id, $criteria_id, $c->id);

            $total += $scr;
            $html_table .= '<td>'.$scr.'</td>';
            $html_table .= '<td>'.$contestant->getRankingByJudge($j->id, $criteria_id, $c->id).'</td>';
        }

        $html_table .= '<td class="criteria-total-score">'.number_format($total, 2).'</td>';
        $html_table .= '<td class="criteria-ranking">'.$contestant->getRanking($criteria_id, $c->id).'</td>';
        $html_table .= '</tr>';
    }

    $html_table .= '</tbody>';
    $html_table .= '</table>';

    $html_table .= '<div class="text-right" id="print-btn-contestant">';
    $html_table .= '<button class="btn btn-primary btn-sm" onclick="PrintCriteriaResult()" id="print-btn-criteria"><i class="fa fa-print"></i> Print Result</button>';
    $html_table .= '</div>';
    $html_table .= '</div>';

    echo json_encode([
        'status' => 'success',
        'message' => 'Criteria result successfully generated.',
        'html' => $html_table
    ]);
    // echo $html_table;
} catch(Exception $e){
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}