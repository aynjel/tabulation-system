<?php

class Tops extends Model{
    protected $table = 'tops';

    public function __construct(){
        parent::__construct($this->table);
    }

    public function findByEventId($event_id){
        return $this->findBy('event_id', $event_id, 'id')[0];
    }

    // public function updateByEventId($event_id, $data){
    //     $this->db->query("UPDATE $this->table SET is_show = '$data[is_show]' WHERE event_id = $event_id");
    // }

    // get showed tops in this event
    public function getShowedTops(){
        return $this->findBy('is_show', 'true');
    }
}