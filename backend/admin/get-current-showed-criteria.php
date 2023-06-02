<?php

require './autoload.php';

$event_id = Input::get('event_id');

$event = new Event();
$criteria = new Criteria();

$showedCriteria = $criteria->findShowedCriteria($event_id);

foreach ($showedCriteria as $criteria) {
    echo "{$criteria->criteria_name} ({$criteria->criteria_percentage}%)<br>";
}
