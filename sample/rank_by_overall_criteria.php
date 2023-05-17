<?php

require('./autoload.php');

$criteria_id = 4;

$criteria = new Criteria();

$cri = $criteria->find($criteria_id);

$event = new Event();

$e = $event->find($cri->event_id);


echo "<h1>" . $e->event_name . "</h1>";

echo "<h1>" . $cri->criteria_name . "</h1>";

$judge = new Judge();

$judges = $judge->findBy('event_id', $cri->event_id);



// $sc = new Score();

// $scores_data = $sc->GetScoresByCriteria($criteria_id);

// $contestant_data = [];

// foreach($scores_data as $s){

//     $contestant = new Contestant();
    
//     $cont = $contestant->find($s->contestant_id);
    
//     array_push($contestant_data, [
//         'contestant_description' => $cont->contestant_description,
//         'contestant_id' => $s->contestant_id,
//         'score' => $s->score
//     ]);
// }

// usort($contestant_data, function($a, $b) {
//     return $b['score'] <=> $a['score'];
// });

// $count = array_count_values(array_column($contestant_data, 'score'));

// $i = 0;
// $rank = 0;
// $dupctr = 1;

// foreach($contestant_data as $c){
//     $dup = $count[$c['score']];           
//     if($count[$c['score']] === 1){
//         $rank++;
//         echo "<tr><td>" . $c['contestant_description'] . "</td><td>" . $c['score'] . "</td><td>" . ($rank) . "</td></tr>";  
//     }
//     else if($dup > 1 && $dupctr < $dup) {
//         echo "<tr><td>" . $c['contestant_description'] . "</td><td>" . $c['score'] . "</td><td>" . ($rank + 1.5) . "</td></tr>";
//         $dupctr++;
//     }
//     else{                
//         echo "<tr><td>" . $c['contestant_description'] . "</td><td>" . $c['score'] . "</td><td>" . ($rank + 1.5) . "</td></tr>"; 
//         $rank += $dup;
//         $dupctr = 1;
//     }
// }
