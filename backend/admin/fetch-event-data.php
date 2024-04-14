<?php

require('./autoload.php');

$event_id = Input::get('event_id');
// $event_id = 44;

$event = new Event();
$e = $event->find($event_id);
$contestant = new Contestant();
$judge = new Judge();
$criteria = new Criteria();
$tops = new Tops();

$criteria_tops = [];

foreach($criteria->findBy('event_id', $event_id) as $cri){
    if($cri->top_id == null){
        array_push($criteria_tops, [
            'criteria' => $cri,
            'top' => null,
            'top_name' => 'Overall',
        ]);
    }else{
        array_push($criteria_tops, [
            'criteria' => $cri,
            'top' => $tops->find($cri->top_id),
            'top_name' => $tops->find($cri->top_id)->name,
        ]);
    }
}

echo json_encode([
    'contestants' => $contestant->findBy('event_id', $event_id),
    'judges' => $judge->findBy('event_id', $event_id),
    'criterias' => $criteria_tops,
    'event' => $e,
], JSON_PRETTY_PRINT);