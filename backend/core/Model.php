<?php

class Model {
    protected $db, $table;

    public function __construct($table) {
        $this->db = Database::getInstance();
        $this->table = $table;
    }

    public function all($order = 'id', $sort = 'ASC') {
        return $this->db->query("SELECT * FROM {$this->table} ORDER BY {$order} {$sort}")->results();
    }

    public function find($id) {
        return $this->db->query("SELECT * FROM {$this->table} WHERE id = ?", [$id])->first();
    }

    public function findBy($field, $value) {
        return $this->db->query("SELECT * FROM {$this->table} WHERE {$field} = ?", [$value])->results();
    }

    public function findFirst($field, $value) {
        return $this->db->query("SELECT * FROM {$this->table} WHERE {$field} = ?", [$value])->first();
    }

    public function findByScore($criteria_id, $contestant_id, $judge_id) {
        $this->db->query("SELECT * FROM {$this->table} WHERE criteria_id = ? AND contestant_id = ? AND judge_id = ?", [$criteria_id, $contestant_id, $judge_id]);
        if($this->db->count()) {
            return $this->db->first();
        }
        return false;
    }

    public function findByScoreAndContestant($criteria_id, $contestant_id) {
        $this->db->query("SELECT * FROM {$this->table} WHERE criteria_id = ? AND contestant_id = ?", [$criteria_id, $contestant_id]);
        if($this->db->count()) {
            return $this->db->first();
        }
        return false;
    }


    public function create($fields = []) {
        $this->db->insert($this->table, $fields);
        return $this->db->lastInsertId();
    }

    public function update($id, $fields = []) {
        $this->db->update($this->table, $id, $fields);
        return $this->db->lastInsertId();
    }

    public function delete($id){
        return $this->db->delete($this->table, $id);
    }

    public function deleteAll(){
        return $this->db->deleteAll($this->table);
    }

    public function exists($id) {
        return $this->db->query("SELECT * FROM {$this->table} WHERE id = ?", [$id])->count();
    }
}