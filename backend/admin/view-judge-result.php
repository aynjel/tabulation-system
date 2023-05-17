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

    $sc = new Score();

    $scores_data = $sc->GetScoresByCriteriaAndJudge($criteria_id, $judge_id);
    
    $contestant_data = [];

    foreach($scores_data as $s){
        
        $cont = $contestant->find($s->contestant_id);
        
        array_push($contestant_data, [
            'contestant_description' => $cont->contestant_description,
            'contestant_number' => $cont->contestant_number,
            'contestant_name' => $cont->contestant_name,
            'contestant_id' => $s->contestant_id,
            'score' => $s->score
        ]);
    }

    usort($contestant_data, function($a, $b) {
        return $b['score'] <=> $a['score'];
    });

    $count = array_count_values(array_column($contestant_data, 'score'));

    $rank = 0;
    $dupctr = 1;

    foreach($contestant_data as $c){
        $html_table .= '<tr>';
        $html_table .= '<td>'.$c['contestant_number'].'</td>';
        $html_table .= '<td>'.$c['contestant_description'].'</td>';
        $html_table .= '<td>'.$c['contestant_name'].'</td>';

        $dup = $count[$c['score']];           
        if($count[$c['score']] === 1){
            $rank++;
            $html_table .= '<td>'.$c['score'].'</td>';
            $html_table .= '<td>'.$rank.'</td>';
        }
        else if($dup > 1 && $dupctr < $dup) {
            $html_table .= '<td>'.$c['score'].'</td>';
            $html_table .= '<td>'.($rank + 1.5).'</td>';
            $dupctr++;
        }
        else{
            $html_table .= '<td>'.$c['score'].'</td>';
            $html_table .= '<td>'.($rank + 1.5).'</td>';
            $rank += $dup;
            $dupctr = 1;
        }
    }

    $html_table .= '</tbody>';
    $html_table .= '</table>';
    $html_table .= '</div>';

    // echo $html_table;

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