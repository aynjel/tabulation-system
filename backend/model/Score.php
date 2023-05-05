<?php

class Score extends Model{
    protected $table = 'scores';

    public function __construct(){
        parent::__construct($this->table);
    }

    public function GetContestantScore($event_id, $contestant_id){
        $scores = $this->findBy('event_id', $event_id);

        // check if this contestant has a score in this criteria and judge
        $judge = new Judge();

        // get criteria where is_show = true
        $cri = new Criteria();
        $criteria = $cri->findBy('is_show', 'true')[0];

        foreach($scores as $s){
            if($s->contestant_id == $contestant_id && $s->criteria_id == $criteria->id && $s->judge_id == $judge->getJudgeId()){
                return $s;
            }
        }
    }
}