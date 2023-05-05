<?php

class Judge extends Model{
    protected $table = 'judges';

    public function __construct(){
        parent::__construct($this->table);
    }

    // fetch all judges from the database
    public function fetchJudges(){
        return $this->all();
    }

    // login judge
    public function login($username, $password){
        $judge = $this->findBy('judge_username', $username);
        if($judge[0]){
            if($judge[0]->judge_password === $password){
                Session::put('judge_id', $judge[0]->id);
                return true;
            }
        }
    }

    // check if judge is logged in
    public function isLoggedIn(){
        return Session::exists('judge_id');
    }

    // logout judge
    public function logout(){
        Session::delete('judge_id');
    }

    // get judge id 
    public function getJudgeId(){
        return Session::get('judge_id');
    }

    public function getEventId(){
        $judge = $this->find($this->getJudgeId());
        return $judge->event_id;
    }

    // get judge event id
    public function getJudgeEventId(){
        $judge = $this->find($this->getJudgeId());
        return $judge->event_id;
    }
}