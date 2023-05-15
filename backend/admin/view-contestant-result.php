<?php

require('./autoload.php');

try{
    $contestant_id = Input::get('contestant_id');
    // $contestant_id = 69;

    $contestant = new Contestant();

    $c = $contestant->find($contestant_id);

    $event = new Event();
    
    $e = $event->find($c->event_id);

    $criteria = new Criteria();
    
    $criterias = $criteria->findBy('event_id', $c->event_id);
    
    $judge = new Judge();
    
    $judges = $judge->findBy('event_id', $c->event_id);

    $html_table = '<div class="table-responsive">';

    $html_table .= '<h1 class="text-center text-uppercase">'.$e->event_name.'</h1>';
    $html_table .= '<h3 class="text-center text-uppercase">'.$c->contestant_name.'</h3>';
    $html_table .= '<h4 class="text-center text-uppercase">('.$e->event_description.')</h4>';

    $html_table .= '<table class="table table-bordered table-hover" style="width: 100%;" id="contestant-result-table">';
    $html_table .= '<thead>';
    $html_table .= '<tr>';
    $html_table .= '<th>Criteria</th>';

    foreach($judges as $jud){
        $html_table .= '<th>'.$jud->judge_name.'</th>';
    }

    $html_table .= '<th>Total</th>';
    $html_table .= '<th>Ranking</th>';
    $html_table .= '</tr>';
    $html_table .= '</thead>';
    $html_table .= '<tbody>';

    foreach($criterias as $cri){
        $html_table .= '<tr>';
        $html_table .= '<td>'.$cri->criteria_name.'</td>';

        $total = 0;

        foreach($judges as $jud){
            $scr = $contestant->getScoreByJudge($jud->id, $cri->id, $contestant_id);
            $total += $scr;
            $rank = $contestant->getRanking($cri->id, $contestant_id);
            $html_table .= '<td>'. $scr .'</td>';
        }
        $html_table .= '<td>'.$total.'</td>';
        $html_table .= '<td>'.$rank.'</td>';
        $html_table .= '</tr>';
    }

    $html_table .= '</tbody>';
    $html_table .= '</table>';

    $html_table .= '<div class="text-right" id="print-btn-contestant">';
    $html_table .= '<button class="btn btn-primary btn-sm" onclick="PrintContestantResult()" id="print-btn-contestant"><i class="fa fa-print"></i> Print Result</button>';
    $html_table .= '</div>';
    $html_table .= '</div>';

    echo json_encode([
        'status' => 'success',
        'message' => 'Criteria result successfully generated.',
        'html' => $html_table
    ]);
} catch(Exception $e){
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}