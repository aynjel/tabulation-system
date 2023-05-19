<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

    <table border="1" id="example" style="width:100%; white-space: nowrap;">
        <thead>
            <tr>
                <th>name</th>
                <th>score</th>
                <th>rank</th>
            </tr>
        </thead>
        <tbody>

        <?php

        require('./autoload.php');

        $contestant = new Contestant();

        $criteria_id = 3;

        $judge_id = 24;

        $criteria = new Criteria();

        $judge = new Judge();

        $cri = $criteria->find($criteria_id);

        $jud = $judge->find($judge_id);

        $event = new Event();

        $e = $event->find($cri->event_id);

        echo "<h1>" . $e->event_name . "</h1>";

        echo "<h1>" . $cri->criteria_name . "</h1>";

        echo "<h1>" . $jud->judge_name . "</h1>";

        $sc = new Score();

        $scores_data = $sc->GetScoresByCriteriaAndJudge($criteria_id, $judge_id);
        
        $contestant_data = [];

        foreach($scores_data as $s){
            
            $cont = $contestant->find($s->contestant_id);
            
            array_push($contestant_data, [
                'contestant_description' => $cont->contestant_description,
                'contestant_id' => $s->contestant_id,
                'score' => $s->score
            ]);
        }

        usort($contestant_data, function($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        $count = array_count_values(array_column($contestant_data, 'score'));

        $i = 0;
        $rank = 0;
        $dupctr = 1;
        
        foreach($contestant_data as $c){
            $dup = $count[$c['score']];           
            if($count[$c['score']] === 1){
                $rank++;
                echo "<tr><td>" . $c['contestant_description'] . "</td><td>" . $c['score'] . "</td><td>" . ($rank) . "</td></tr>";  
            }
            else if($dup > 1 && $dupctr < $dup) {
                echo "<tr><td>" . $c['contestant_description'] . "</td><td>" . $c['score'] . "</td><td>" . ($rank + 1.5) . "</td></tr>";
                $dupctr++;
            }
            else{                
                echo "<tr><td>" . $c['contestant_description'] . "</td><td>" . $c['score'] . "</td><td>" . ($rank + 1.5) . "</td></tr>"; 
                $rank += $dup;
                $dupctr = 1;
            }
        }
        
        // $count=array_count_values($score);
        // echo "<br>";
        // $i=0;
        // $rank=0;
        // $dupctr=1;
        // for($i;$i<count($score);$i++){
        //     $dup=$count[$score[$i]];           
        //     if($count[$score[$i]]===1){
        //         $rank++;
        //         echo "Contestant: ".$contestant->find($contestant_id[$i])->contestant_description." - SCORE: ".$score[$i]." RANK:".($rank)."<br>";  
        //     }
        //     else if($dup>1 && $dupctr<$dup) {
        //         echo "Contestant: ".$contestant->find($contestant_id[$i])->contestant_description." - SCORE: ".$score[$i]." RANK:".($rank+1.5)."<br>";
        //         $dupctr++;
        //     }
        //     else{                
        //         echo "Contestant: ".$contestant->find($contestant_id[$i])->contestant_description." - SCORE: ".$score[$i]." RANK:".($rank+1.5)."<br>"; 
        //         $rank+=$dup;
        //         $dupctr=1;
        //     }
        // }
        
        ?>

</tbody>
    </table>

    </body>
</html>