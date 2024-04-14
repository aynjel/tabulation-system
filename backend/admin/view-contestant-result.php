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
    $html_table .= '<h3 class="text-center text-uppercase">'.$c->contestant_name.' ('.$c->contestant_description.')</h3>';
    $html_table .= '<h4 class="text-center text-uppercase">('.$e->event_description.')</h4>';

    $html_table .= '<table class="table table-bordered table-hover table-striped table-sm text-center align-middle" style="white-space: nowrap; width: 100%; font-size: 12px;" id="contestant-result-table">';
    $html_table .= '<thead>';
    $html_table .= '<tr>';
    $html_table .= '<th class="text-center">Criteria</th>';

    foreach($judges as $jud){
        $html_table .= '<th class="text-center">'.$jud->judge_name.'</th>';
    }

    $html_table .= '<th class="text-center">Total Score</th>';
    $html_table .= '<th class="text-center">Total Rank</th>';
    $html_table .= '</tr>';
    $html_table .= '</thead>';
    $html_table .= '<tbody>';

    foreach($criterias as $cri){
        $html_table .= '<tr>';
        $html_table .= '<td>'.$cri->criteria_name.'</td>';

        $total_score = 0;
        $total_rank = 0;

        foreach($judges as $jud){
            $score = new Score();
            $scr = $score->GetScoreByContestantAndJudge($contestant_id, $jud->id, $cri->id);

            if($scr != null){
                $total_score += $scr->score;
                $total_rank += $scr->rank;

                $html_table .= '<td>'. $scr->score .'</td>';
            } else {
                $html_table .= '<td>0</td>';
            }
        }
        $html_table .= '<td>'.$total_score.'</td>';
        $html_table .= '<td>'.$total_rank.'</td>';
        $html_table .= '</tr>';
    }

    $html_table .= '</tbody>';
    $html_table .= '</table>';
    $html_table .= '</div>';

    echo json_encode([
        'status' => 'success',
        'message' => 'Criteria result successfully generated.',
        'html' => $html_table,
        'contestant_name' => $c->contestant_name. ' ('.$c->contestant_description.')',
    ]);
} catch(Exception $e){
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}