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

    $score = new Score();

    $judge_scores = $score->GetJudgesWhoSubmittedScores($criteria_id);

    $judges = [];

    foreach($judge_scores as $js){
        array_push($judges, $judge->find($js));
    }

    // check if judges submitted scores
    if($judge_scores != null){

        $html_table = '<div class="table-responsive">';

        $html_table .= '<h1 class="text-center text-uppercase">'.$e->event_name.'</h1>';
        $html_table .= '<h3 class="text-center text-uppercase">'.$cri->criteria_name.'</h3>';
        $html_table .= '<h4 class="text-center text-uppercase">('.$e->event_description.')</h4>';
        $html_table .= '<p class="text-center text-uppercase">('.date('F d, Y', strtotime($e->event_date)).' - '.date('H:i A', strtotime($e->event_time)).')</p>';

        $html_table .= '<table class="table table-bordered table-hover table-striped table-sm text-center align-middle" style="width: 100%; white-space: nowrap; font-size: 12px;" id="2criteria-result-table">';
        $html_table .= '<thead class="thead-dark text-uppercase">';
        $html_table .= '<tr>';
        $html_table .= '<th class="text-center" colspan="3">Contestant</th>';

        foreach($judges as $j){
            $html_table .= '<th class="text-center" rowspan="2" colspan="2">'.$j->judge_name.'</th>';
        }

        $html_table .= '<th class="text-center" colspan="2">Score</th>';
        $html_table .= '<th class="text-center" colspan="3">Rank</th>';
        $html_table .= '</tr>';
        $html_table .= '</thead>';
        $html_table .= '<tbody class="text-center">';

        usort($contestants, function($a, $b) use ($score, $criteria_id, $judges){
            $total_a = 0;
            $total_b = 0;

            foreach($judges as $j){
                $total_a += $score->GetScoreByContestantAndJudge($a->id, $j->id, $criteria_id)->score;
                $total_b += $score->GetScoreByContestantAndJudge($b->id, $j->id, $criteria_id)->score;
            }

            return $total_b <=> $total_a;
        });

        $html_table .= '<tr class="text-center text-uppercase">';
        $html_table .= '<th>No.</th>';
        $html_table .= '<th>Baranggay</th>';
        $html_table .= '<th>Name</th>';
        
        foreach($judges as $j){
            $html_table .= '<th>Score</th>';
            $html_table .= '<th>Rank</th>';
        }

        $html_table .= '<th>Total</th>';
        $html_table .= '<th>Average</th>';
        $html_table .= '<th>Total</th>';
        $html_table .= '<th>Average</th>';
        $html_table .= '<th>No.</th>';
        $html_table .= '</tr>';

        $prev_score = null;
        $prev_rank = 1;
        $prev_total_rank = 1;

        foreach ($contestants as $key => $c) {
            $html_table .= '<tr class="text-uppercase">';
            $html_table .= '<td>'.$c->contestant_number.'</td>';
            $html_table .= '<td>'.$c->contestant_description.'</td>';
            $html_table .= '<td style="white-space: nowrap;">'.$c->contestant_name.'</td>';

            $total_score = 0;
            $total_score_average = 0;
            $total_rank = 0;
            $total_rank_average = 0;
            
            $rank = 0;

            foreach ($judges as $j) {
                $s = $score->GetScoreByContestantAndJudge($c->id, $j->id, $criteria_id);
                $html_table .= '<td class="criteria-score">'.$s->score.'</td>';
                $html_table .= '<td class="criteria-rank">'.$s->rank.'</td>';

                $total_score += $s->score;
                $total_score_average += $s->score / count($judges);
                $total_rank += $s->rank;
                $total_rank_average += $s->rank / count($judges);

            }
            
            $total_score = round($total_score, 2);

            $html_table .= '<td>'.$total_score.'</td>';

            $html_table .= '<td>'.number_format($total_score_average, 2).'</td>';
            
            $html_table .= '<td>'.$total_rank.'</td>';
            
            $html_table .= '<td>'.number_format($total_rank_average, 2).'</td>';

            if($prev_score == $total_score){
                if($prev_total_rank == $total_rank){
                    $html_table .= '<td>'.$prev_rank.'</td>';
                }elseif($prev_total_rank < $total_rank){
                    $html_table .= '<td>'.($key + 1).' - Rank Lose</td>';
                    $prev_rank = $key + 1;
                }elseif($prev_total_rank > $total_rank){
                    $html_table .= '<td>'.($key).' - Rank Win</td>';
                }else{
                    $html_table .= '<td>'.$prev_rank.'</td>';
                }
            }else{
                $html_table .= '<td>'.($key + 1).'</td>';
                $prev_rank = $key + 1;
            }
        
            $prev_score = $total_score;
            $prev_total_rank = $total_rank;

            $html_table .= '</tr>';

        }

        $html_table .= '</tbody>';
        $html_table .= '</table>';

        $html_table .= '</div>';

        echo json_encode([
            'status' => 'success',
            'message' => 'Criteria result found!',
            'html_table' => $html_table,
            'criteria_name' => $cri->criteria_name.' ('.$cri->criteria_percentage.'%)'
        ]);

        // echo $html_table;

    }else{
        echo json_encode([
            'status' => 'error',
            'message' => 'No criteria result found!'
        ]);
    }
} catch(Exception $e){
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}