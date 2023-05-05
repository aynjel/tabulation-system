<?php

class Config{
    private static $config = [
        'mysql' => [
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'db' => 'tabulation_db'
        ],
        'email' => [
            'host' => 'smtp.gmail.com',
            'port' => 587,
            'username' => 'ortegacanillo76@gmail.com',
            'password' => 'password',
            'from' => 'Tabulation System'
        ],
        'website' => [
            'name' => 'Tabulation System',
            'short_name' => 'TS',
            'url' => 'http://localhost/tabulation'
        ],
        'system' => [
            'admin' => 'admin',
            'password' => 'password'
        ],
        'pages' => [
            'dashboard' => 'Dashboard',
            'activities' => 'Activities',
            'activity' => 'Activity',
            'departments' => 'Departments',
            'department' => 'Department',
            'judges' => 'Judges',
            'criterias' => 'Criterias',
            'criteria' => 'Criteria',
            'contestants' => 'Contestants',
            'candidate' => 'Candidate',
            'events' => 'Events',
            'event' => 'Event',
            'score' => 'Score',
            'results' => 'Results',
            'event_edit' => 'Edit Event',
            'start_event' => 'Start Event',
            'start' => 'Start',
            'logout' => 'Logout'
        ],
    ];

    public static function get($path = null){
        if($path){
            $config = self::$config;
            $path = explode('/', $path);

            foreach($path as $bit){
                if(isset($config[$bit])){
                    $config = $config[$bit];
                }
            }

            return $config;
        }

        return false;
    }

    public static function getPageKey($key = null){
        if($key){
            $pages = self::$config['pages'];

            foreach($pages as $page => $value){
                if($value == $key){
                    return $page;
                }
            }
        }

        return false;
    }

    public static function getPageValue($value = null){
        if($value){
            $pages = self::$config['pages'];

            foreach($pages as $page => $key){
                if($page == $value){
                    return $key;
                }
            }
        }

        return false;
    }
}
