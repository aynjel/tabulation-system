<?php

class Event extends Model{
    protected $table = 'events';

    public function __construct(){
        parent::__construct($this->table);
    }

    // fetch all events from the database
    public function fetchEvents(){
        return $this->all('id', 'DESC');
    }

    public function EventById($id){
        return $this->find($id);
    }
}