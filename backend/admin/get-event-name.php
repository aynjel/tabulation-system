<?php

require('./autoload.php');

$event_id = Input::get('event_id');

$event = new Event();

$e = $event->find($event_id);

echo $e->event_name;