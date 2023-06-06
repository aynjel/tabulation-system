<?php

class Criteria extends Model{
    protected $table = 'criteria';

    public function __construct(){
        parent::__construct($this->table);
    }

    // fetch all criterias from the database
    public function fetchCriterias(){
        return $this->all();
    }

    public function getCriteria($event_id){
        return $this->findBy('event_id', $event_id);
    }

    // get showed criteria is_show = true
    public function getShowedCriteria($event_id){
        $criterias = $this->findBy('event_id', $event_id);

        foreach($criterias as $criteria){
            if($criteria->is_show == 'true'){
                return $criteria;
            }
        }
    }

    public function updateByEventId($event_id, $data){
        $this->db->query("UPDATE $this->table SET is_show = '$data[is_show]' WHERE event_id = $event_id");
    }

    public function findShowedCriteria($event_id){
        $criterias = $this->findBy('event_id', $event_id);

        $showed_criterias = [];

        foreach($criterias as $criteria){
            if($criteria->is_show == 'true'){
                array_push($showed_criterias, $criteria);
            }
        }

        return $showed_criterias;
    }

    public function GetCriteriaWithScores($event_id){
        $criterias = $this->findBy('event_id', $event_id);

        $criteria_with_scores = [];

        foreach($criterias as $criteria){
            // check if criteria has data in score table
            $scores = $this->db->query("SELECT * FROM scores WHERE criteria_id = $criteria->id");

            if($scores->rowCount() > 0){
                array_push($criteria_with_scores, $criteria);
            }
        }

        return $criteria_with_scores;
    }

}