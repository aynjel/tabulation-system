<?php

class User extends Model{
    protected $table = 'users';

    public function __construct() {
        parent::__construct($this->table);
    }

    public function login($username, $password) {
        $user = $this->findFirst('username', $username);
        if($user) {
            if($user->password === $password) {
                Session::put('user_id', $user->id);
                Session::put('user_name', $user->username);
                return true;
            }
        }
        return false;
    }

    public function logout() {
        Session::delete('user_id');
        Session::delete('user_name');
    }

    public function isLoggedIn() {
        return Session::exists('user_id');
    }

    public function getFullName() {
        $user = $this->find(Session::get('user_id'));
        return $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name;
    }

    public function getUserName() {
        $user = $this->find(Session::get('user_id'));
        return $user->username;
    }
}