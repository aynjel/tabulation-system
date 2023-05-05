<?php

session_start();

date_default_timezone_set('Asia/Manila');

function autoload($className) {
    if (file_exists('../backend/core/' . $className . '.php')) {
        require('../backend/core/' . $className . '.php');
    } elseif (file_exists('../../backend/core/' . $className . '.php')) {
        require('../../backend/core/' . $className . '.php');
    } elseif (file_exists('../backend/model/' . $className . '.php')) {
        require('../backend/model/' . $className . '.php');
    } elseif (file_exists('../../backend/model/' . $className . '.php')) {
        require('../../backend/model/' . $className . '.php');
    } else{
        die('Class ' . $className . ' not found');
    }
}

spl_autoload_register('autoload');
