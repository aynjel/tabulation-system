<?php
require('./autoload.php');

date_default_timezone_set('Asia/Manila');

$page = (Input::get('page')) ? Input::get('page') : 'dashboard';

$title = ucwords(str_replace('_', ' ', $page));

$judge = new Judge();

$j = $judge->find(Session::get('judge_id'));

if(!$judge->isLoggedIn() || Input::get('page') == 'logout'){$judge->logout();echo '<script>window.location.href = "./auth/login.php";</script>';}

$event = new Event();

$e = $event->find($j->event_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Event: <?= $e->event_name; ?> <input type="readonly" id="event-id" value="<?= $e->id; ?>"> <br>
    Judge: <?= $j->judge_name; ?> <input type="readonly" id="judge-id" value="<?= $j->id; ?>"> <br>
    Showed Criteria: <span id="showed-criteria"></span> <input type="readonly" id="showed-criteria-id"> <br>

    <br>
    
    <div id="contestants"></div>

    <script src="./../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./index.js"></script>
</body>
</html>