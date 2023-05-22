<?php

require('./autoload.php');

try{
    $judge_id = Input::get('judge_id');
    $criteria_id = Input::get('criteria_id');
    // $judge_id = 25;
    // $criteria_id = 3;

    $judge = new Judge();

    $j = $judge->find($judge_id);

    $event = new Event();
    
    $e = $event->find($j->event_id);

    $criteria = new Criteria();
    
    $cri = $criteria->find($criteria_id);
    
    $contestant = new Contestant();

    $contestants = $contestant->findBy('event_id', $e->id);

    $html_table = '<div class="table-responsive">';

    $html_table .= '<h1 class="text-center text-uppercase">'.$e->event_name.'</h1>';
    $html_table .= '<h3 class="text-center text-uppercase">'.$j->judge_name.' - Judge Scores</h3>';
    $html_table .= '<h4 class="text-center text-uppercase">('.$cri->criteria_name.') - '.$e->event_description.'</h4>';

    $html_table .= '<table class="table table-bordered table-hover table-striped table-sm text-center align-middle" style="width: 100%; font-size: 12px;" id="judge-result-table">';
    $html_table .= '<thead>';
    $html_table .= '<tr class="text-uppercase">';
    $html_table .= '<th class="text-center">No.</th>';
    $html_table .= '<th class="text-center">Baranggay</th>';
    $html_table .= '<th class="text-center">Name</th>';

    $html_table .= '<th class="text-center">Score</th>';
    $html_table .= '<th class="text-center">Ranking</th>';
    $html_table .= '</tr>';
    $html_table .= '</thead>';
    $html_table .= '<tbody>';
    
    foreach ($contestants as $key => $c) {
        $html_table .= '<tr>';
        $html_table .= '<td>'.($key + 1).'</td>';
        $html_table .= '<td>'.$c->contestant_description.'</td>';
        $html_table .= '<td>'.$c->contestant_name.'</td>';

        $sc = new Score();

        $scr = $sc->GetScoreByContestantAndJudge($c->id, $judge_id, $criteria_id);

        if($scr != null){
            $html_table .= '<td>'.$scr->score.'</td>';
            $html_table .= '<td>'.$scr->rank.'</td>';
        } else {
            $html_table .= '<td>0</td>';
            $html_table .= '<td>0</td>';
        }

        $html_table .= '</tr>';
    }

    $html_table .= '</tbody>';
    $html_table .= '</table>';
    $html_table .= '</div>';

    echo json_encode([
        'status' => 'success',
        'message' => 'Judge result successfully generated.',
        'html' => $html_table,
        'judge' => $j->judge_name.' - '.$cri->criteria_name
    ]);
} catch(Exception $e){
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}