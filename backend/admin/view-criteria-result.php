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

    // get judges who submitted scores

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
        $html_table .= '<th class="text-center" colspan="2">Rank</th>';
        $html_table .= '</tr>';
        $html_table .= '</thead>';
        $html_table .= '<tbody class="text-center">';

        // sort by rank
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
        $html_table .= '<th>Description</th>';
        $html_table .= '<th>Name</th>';
        
        foreach($judges as $j){
            $html_table .= '<th>Score</th>';
            $html_table .= '<th>Rank</th>';
        }

        $html_table .= '<th>Total</th>';
        $html_table .= '<th>Average</th>';
        $html_table .= '<th>Total</th>';
        $html_table .= '<th>Average</th>';
        $html_table .= '</tr>';

        foreach($contestants as $c){
            $html_table .= '<tr class="text-uppercase">';
            $html_table .= '<td>'.$c->contestant_number.'</td>';
            $html_table .= '<td>'.$c->contestant_description.'</td>';
            $html_table .= '<td style="white-space: nowrap;">'.$c->contestant_name.'</td>';

            $total = 0;
            $rank = 0;

            foreach($judges as $j){

                $scores = $score->findBy('criteria_id', $criteria_id);

                foreach($scores as $s){

                    if($s->contestant_id == $c->id && $s->judge_id == $j->id){
                        
                        $html_table .= '<td class="criteria-score">'.$s->score.'</td>';
                        $html_table .= '<td class="criteria-rank">'.$s->rank.'</td>';

                        $total += $s->score;
                        $rank += $s->rank;
                    }
                }

            }
            
            $html_table .= '<td class="criteria-total-score">'.$total.'</td>';

            $html_table .= '<td class="criteria-total-score">'.(number_format($total / count($judges), 2) * ($cri->criteria_percentage / 100)).'</td>';

            $html_table .= '<td class="criteria-ranking">'.$rank.'</td>';

            $html_table .= '<td class="criteria-ranking">'.(number_format($rank / count($judges), 2) * ($cri->criteria_percentage / 100)).'</td>';


            $html_table .= '</tr>';
        }

        $html_table .= '</tbody>';
        $html_table .= '</table>';

        $html_table .= '</div>';

        echo json_encode([
            'status' => 'success',
            'message' => 'Criteria result found!',
            'html_table' => $html_table
        ]);

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