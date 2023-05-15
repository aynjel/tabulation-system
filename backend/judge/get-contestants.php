<?php

require('./autoload.php');

try{
    $criteria_id = Input::get('criteria_id');
    // $criteria_id = 4;

    $judge = new Judge();

    // check if contestant already has a score
    $contestant = new Contestant();

    $contestant_data = $contestant->findBy('event_id', $judge->getEventId());
    
    $contestants_data = [];
    
    foreach($contestant_data as $cd){
        $score = new Score();
    
        $score_data = $score->findBy('criteria_id', $criteria_id);

        $cs = 0;
        $rank = 0;
        foreach($score_data as $sd){
            
            if($sd->judge_id == $judge->getJudgeId()){
                if($sd->contestant_id == $cd->id){
                    $cs = $sd->score;
                }
            }
            
        }
        $contestants_data[] = [
            'id' => $cd->id, 
            'name' => $cd->contestant_name, 
            'number' => $cd->contestant_number,
            'baranggay' => $cd->contestant_description,
            'score' => $cs
        ];

    }

    if($contestants_data){
        echo json_encode([
            'status' => 'success',
            'message' => 'Contestants found',
            'data' => $contestants_data
        ], JSON_PRETTY_PRINT);
    }else{
        echo json_encode([
            'status' => 'error',
            'message' => 'No contestants found'
        ], JSON_PRETTY_PRINT);
    }

} catch(Exception $e){
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}