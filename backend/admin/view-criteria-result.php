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
    $html_table .= '<p class="text-center text-uppercase">('.date('F d, Y', strtotime($e->event_date)).' - '.date('H:i A', strtotime($e->event_time)).')</p>';

    $html_table .= '<table class="table table-bordered table-hover table-striped table-sm text-center align-middle" style="width: 100%; white-space: nowrap; font-size: 12px;" id="criteria-result-table">';
    $html_table .= '<thead class="thead-dark text-uppercase">';
    $html_table .= '<tr>';
    $html_table .= '<th class="text-center">No.</th>';
    $html_table .= '<th class="text-center">Baranggay</th>';
    $html_table .= '<th class="text-center">Name</th>';

    foreach($judges as $j){
        $html_table .= '<th class="text-center">'.$j->judge_name.'</th>';
    }

    $html_table .= '<th class="text-center">Total</th>';
    $html_table .= '<th class="text-center">Ranking</th>';
    $html_table .= '</tr>';
    $html_table .= '</thead>';
    $html_table .= '<tbody class="text-center">';

    foreach($contestants as $c){
        $html_table .= '<tr>';
        $html_table .= '<td>'.$c->contestant_number.'</td>';
        $html_table .= '<td>'.$c->contestant_description.'</td>';
        $html_table .= '<td style="white-space: nowrap;">'.$c->contestant_name.'</td>';

        $total = 0;

        foreach($judges as $j){
            $scr = $contestant->getScoreByJudge($j->id, $criteria_id, $c->id);

            $total += $scr;
            $html_table .= '<td>'.$scr.'</td>';
        }

        $html_table .= '<td class="criteria-total-score">'.number_format($total, 2).'</td>';

        $score = new Score();

        $html_table .= '<td class="criteria-ranking">0</td>';

        $html_table .= '</tr>';
    }

    $html_table .= '</tbody>';
    $html_table .= '</table>';

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