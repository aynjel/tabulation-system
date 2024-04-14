<?php

class Score extends Model{
    protected $table = 'scores';

    public function __construct(){
        parent::__construct($this->table);
    }

    public function GetScoreByContestantAndJudge($contestant_id, $judge_id, $criteria_id){
        $scores = $this->findBy('contestant_id', $contestant_id);

        foreach($scores as $s){
            if($s->judge_id == $judge_id){
                if($s->criteria_id == $criteria_id){
                    return $s;
                }
            }
        }
    }

    // get ranking by criteria based on total score
    public function GetRankingByCriteria($event_id, $criteria_id){
        $scores = $this->findBy('event_id', $event_id);

        $scores_data = [];

        foreach($scores as $s){
            if($s->criteria_id == $criteria_id){
                array_push($scores_data, $s->score);
            }
        }

        $rankings = $this->getRankings($scores_data);

        return $rankings;
    }

    public function GetJudgesWhoSubmittedScores($criteria_id){
        $scores = $this->findBy('criteria_id', $criteria_id);

        $judges = [];
        
        foreach($scores as $s){
            if(!in_array($s->judge_id, $judges)){
                array_push($judges, $s->judge_id);
            }
        }

        return $judges;
    }

    public function GetScoresByCriteriaAndJudge($criteria_id, $judge_id){
        $scores = $this->findBy('criteria_id', $criteria_id);

        $scores_data = [];

        foreach($scores as $s){
            if($s->judge_id == $judge_id){
                array_push($scores_data, $s);
            }
        }

        return $scores_data;
    }

    public function GetScoresByCriteria($criteria_id){
        $scores = $this->findBy('criteria_id', $criteria_id);

        return $scores;
    }

    public function getRankings($scores) {
        $rankings = array();
        $rank = 1;
        $count = 1;
        $previousScore = null;
    
        foreach ($scores as $score) {
            if ($score === $previousScore) {
                $rankings[] = $rank - 0.5;
                $count++;
            } else {
                for ($i = 0; $i < $count; $i++) {
                    $rankings[] = $rank;
                }
                $rank += $count;
                $count = 1;
            }
            $previousScore = $score;
        }
    
        // Handle the last group of participants
        for ($i = 0; $i < $count; $i++) {
            $rankings[] = $rank;
        }
    
        return $rankings;
    }

    public function GetRankingByJudge($scores, $judge_id){
        $rankings = array();
        $rank = 1;
        $count = 1;
        $previousScore = null;
    
        foreach ($scores as $score) {
            if ($score === $previousScore) {
                $rankings[] = $rank - 0.5;
                $count++;
            } else {
                for ($i = 0; $i < $count; $i++) {
                    $rankings[] = $rank;
                }
                $rank += $count;
                $count = 1;
            }
            $previousScore = $score;
        }
    
        // Handle the last group of participants
        for ($i = 0; $i < $count; $i++) {
            $rankings[] = $rank;
        }
    
        return $rankings;
    }

    public function GetContestantScore($event_id, $contestant_id, $criteria_id, $judge_id){
        $scores = $this->findBy('event_id', $event_id);

        foreach($scores as $s){
            if($s->judge_id == $judge_id){
                if($s->contestant_id == $contestant_id){
                    if($s->criteria_id == $criteria_id){
                        return $s->score;
                    }
                }
            }
        }
    }

    public function GetRankingTotalScore(){
        
    }

    function TabulatedData($event_id, $criteria_id, $judge_id){
        $scores = $this->findBy('event_id', $event_id);

        $scores_data = [];

        foreach($scores as $s){
            if($s->judge_id == $judge_id){
                if($s->criteria_id == $criteria_id){
                    array_push($scores_data, $s->score);
                }
            }
        }

        return $scores_data;
    }
}