<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <table border="1" id="example" style="width:100%; white-space: nowrap;">
        <thead>
            <tr>
                <th>score</th>
                <th>rank</th>
            </tr>
        </thead>
        <tbody>
            <?php

            require('./autoload.php');

            $contestant = new Contestant();

            $criteria_id = 3;

            $criteria = new Criteria();

            $cri = $criteria->find($criteria_id);

            $event = new Event();

            $e = $event->find($cri->event_id);

            echo "<h1>" . $e->event_name . "</h1>";

            echo "<h1>" . $cri->criteria_name . "</h1>";

            $scores_data = [];

            $score = new Score();

            $scores = ['10', '11', '12', '13', '14', '15', '16', '17', '17', '19'];

            $ranking = $score->getRankings($scores);
            
            echo array_sum($scores) / count($scores);

            // $total = 0;

            // foreach($scores as $s){

            //     $con = $contestant->find($s->contestant_id);
                
            //     if(!in_array($con->id, array_column($scores_data, 'contestant_id'))){
            //         array_push($scores_data, [
            //             'contestant_id' => $con->id,
            //             'score' => $s->score
            //         ]);
            //     }else{
            //         $index = array_search($con->id, array_column($scores_data, 'contestant_id'));

            //         $scores_data[$index]['score'] += $s->score;
            //     }
                
            //     $total += $s->score;
                
            // }

            // usort($scores_data, function($a, $b){
            //     return $b['score'] <=> $a['score'];
            // });

            // foreach($scores_data as $s){
            //     echo "<tr>";
            //     echo "<td>" . $contestant->find($s['contestant_id'])->contestant_description . "</td>";
            //     echo "<td>" . $contestant->find($s['contestant_id'])->contestant_name . "</td>";
            //     echo "<td>" . number_format($s['score'], 2) . "</td>";

            //     $rank = 0;

            //     foreach($scores_data as $sd){
            //         if($s['score'] < $sd['score']){
            //             $rank++;
            //         }
            //     }

            //     echo "<td>" . ($rank + 1) . "</td>";
            //     echo "</tr>";
            // }

            // // H::debug($count);

            
            // // sort($scores_data);

            

            

            ?>
        </tbody>
    </table>

</body>
</html>