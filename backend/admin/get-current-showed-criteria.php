<?php

require('./autoload.php');

$criteria = new Criteria();

$criteria_id = Input::get('control_criteria_id');

// get current showed criteria
$scs = $criteria->findBy('is_show', 'true');

foreach($scs as $sc){
    echo $sc->criteria_name . ' ' . '(' . $sc->criteria_percentage . '%)' . '<br>';
}