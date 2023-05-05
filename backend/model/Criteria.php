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

    // get showed criteria is_show = true
    public function getShowedCriteria($event_id){
        $criterias = $this->findBy('event_id', $event_id);

        foreach($criterias as $criteria){
            if($criteria->is_show == 'true'){
                return $criteria;
            }
        }
    }
}