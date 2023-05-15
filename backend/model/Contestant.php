<?php

class Contestant extends Model{
    protected $table = 'contestants';

    public function __construct(){
        parent::__construct($this->table);
    }

    // fetch all contestants from the database
    public function fetchContestants(){
        return $this->all('contestant_number', 'ASC');
    }

    // get the score of a contestant based on the criteria
    public function getScore($criteria_id, $contestant_id){
        $score = new Score();

        $scores = $score->findBy('criteria_id', $criteria_id);

        $total = 0;

        foreach($scores as $s){
            if($s->contestant_id == $contestant_id){
                $total += $s->score;
            }
        }

        return $total;
    }

    public function getTotalScore($contestant_id){
        $score = new Score();

        $scores = $score->findBy('contestant_id', $contestant_id);

        $total = 0;

        foreach($scores as $s){
            $total += $s->score;
        }

        return $total;
    }

    public function getTotalScorePercentage($contestant_id){
        $score = new Score();

        $scores = $score->findBy('contestant_id', $contestant_id);

        $criteria = new Criteria();

        $criterias = $criteria->findBy('event_id', $this->find($contestant_id)->event_id);

        $total_score_percentage = 0;

        foreach($criterias as $criteria){
            // get total score of percentage
            $total_score_percentage += $this->getScore($criteria->id, $contestant_id) * ($criteria->criteria_percentage / 100);
        }
        
        return $total_score_percentage;
    }

    public function getScoreByJudge($judge_id, $criteria_id, $contestant_id){
        $score = new Score();

        $scores = $score->findBy('criteria_id', $criteria_id);

        $total = 0;

        foreach($scores as $s){
            if($s->contestant_id == $contestant_id && $s->judge_id == $judge_id){
                $total += $s->score;
            }
        }

        return $total;
    }

    public function getRanking($criteria_id, $contestant_id){
        $contestants = $this->findBy('event_id', $this->find($contestant_id)->event_id);

        $contestant_score = $this->getScore($criteria_id, $contestant_id);

        $ranking = 1;

        foreach($contestants as $c){
            if($c->id != $contestant_id){
                if($this->getScore($criteria_id, $c->id) > $contestant_score){
                    if($this->getScore($criteria_id, $c->id) == $contestant_score){
                        $ranking++;
                    }
                }
            }
        }

        return $ranking;
    }

    public function getRankingByJudge($judge_id, $criteria_id, $contestant_id){
        $contestants = $this->findBy('event_id', $this->find($contestant_id)->event_id);

        $contestant_score = $this->getScoreByJudge($judge_id, $criteria_id, $contestant_id);

        $ranking = 1;

        foreach($contestants as $c){
            if($c->id != $contestant_id){
                if($this->getScoreByJudge($judge_id, $criteria_id, $c->id) > $contestant_score){
                    if($this->getScoreByJudge($judge_id, $criteria_id, $c->id) == $contestant_score){
                        $ranking++;
                    }
                }
            }
        }

        return $ranking;
    }

}