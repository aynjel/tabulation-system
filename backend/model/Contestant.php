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

    public function getContestants($event_id){
        return $this->findBy('event_id', $event_id);
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

    public function GetTotalByCriteria($criteria_id, $contestant_id){
        $score = new Score();

        $scores = $score->findBy('criteria_id', $criteria_id);

        $total_s = 0;
        $total_r = 0;

        foreach($scores as $s){
            if($s->contestant_id == $contestant_id){
                $total_s += $s->score;
                $total_r += $s->rank;
            }
        }

        return [
            'score' => $total_s,
            'rank' => $total_r,
        ];
    }

    public function GetAverageByCriteria($criteria_id, $contestant_id){
        $judge = new Judge();

        // $judges = $judge->findBy('event_id', $this->find($contestant_id)->event_id);
        
        // get judges that have scores for this criteria
        $judges = $judge->GetJudgesWithScores($criteria_id);

        $score = new Score();

        $scores = $score->findBy('criteria_id', $criteria_id);

        $total_score_average = 0;
        $total_rank_average = 0;

        foreach($scores as $s){
            if($s->contestant_id == $contestant_id){
                $total_score_average += $s->score;
                $total_rank_average += $s->rank;
            }
        }

        return [
            'score' => $total_score_average / count($judges),
            'rank' => $total_rank_average / count($judges)
        ];
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
        $rank = 0;

        foreach($scores as $s){
            if($s->contestant_id == $contestant_id && $s->judge_id == $judge_id){
                $total += $s->score;
                $rank += $s->rank;
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