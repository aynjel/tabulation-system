<?php

require('./autoload.php');

// $event_id = Input::get('event_id');
$event_id = 38;

try{
    if($event_id != null || $event_id != ''){
        
        $event = new Event();
        
        $e = $event->find($event_id);
        
        $contestant = new Contestant();
        
        $contestants = $contestant->findBy('event_id', $event_id);
        
        $criteria = new Criteria();
        
        $criterias = $criteria->findBy('event_id', $event_id);
        
        $judge = new Judge();
        
        $judges = $judge->findBy('event_id', $event_id);

        $html .= "<div class='table-responsive'>";
        $html .= "<table class='table table-bordered border-dark table-hover table-hover table-sm text-center align-middle' style='width: 100%; font-size: 14px;' id='overall-result-table'>";
        $html .= "<thead>";
        
        $html .= "<tr class='text-center'>";
        $html .= "<th>#</th>";
        $html .= "<th colspan='2'>Contestant</th>";
        
        foreach ($criterias as $criteria) {
            $html .= "<th colspan='2'>" . $criteria->criteria_name . "</th>";
        }
        
        $html .= "<th colspan='2'>Score</th>";
        $html .= "<th colspan='3'>Rank</th>";
        $html .= "</tr>";
        
        $html .= "<tr class='text-center'>";
        $html .= "<th>No.</th>";
        $html .= "<th>Baranggay</th>";
        $html .= "<th>Name</th>";

        foreach ($criterias as $criteria) {
            $html .= "<th>Score</th>";
            $html .= "<th>Rank</th>";
        }
        
        $html .= "<th>Total</th>";
        $html .= "<th>Average</th>";
        $html .= "<th>Total</th>";
        $html .= "<th>Average</th>";
        $html .= "<th>No.</th>";
        $html .= "</tr>";
        
        $html .= "</thead>";
        $html .= "<tbody>";

        if($contestants){
        
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

                    $scr = $contestant->GetTotalByCriteria($cri->id, $c->id)['score'];
                    $rnk = $contestant->GetTotalByCriteria($cri->id, $c->id)['rank'];
                    
                    $html .= "<td>".$scr."</td>";
                    $html .= "<td>".$rnk."</td>";
            
                    $total_score += $scr;
                    $total_rank += $rnk;
                }
            
                $html .= "<td>" . $total_score . "</td>";
                $html .= "<td>" . number_format($total_score / count($criterias), 2) . "</td>";
                $html .= "<td>" . $total_rank . "</td>";
                $html .= "<td>" . number_format($total_rank / count($criterias), 2) . "</td>";
            
                $html .= "</tr>";
            }

            $html .= "</tbody>";
            $html .= "</table>";
            $html .= "</div>";

            echo $html;

            // echo json_encode([
            //     'status' => 'success',
            //     'message' => 'Successfully retrieved data',
            //     'html_table' => $html
            // ]);
        }else{
            echo json_encode([
                'status' => 'error',
                'message' => 'No data found'
            ]);
        }
    }else{
        echo json_encode([
            'status' => 'error',
            'message' => 'Event ID is required'
        ]);
    }
}catch(Exception $e){
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}