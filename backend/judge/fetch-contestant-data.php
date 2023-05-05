<?php

require('./autoload.php');

$event_id = Input::get('event_id');

$contestant = new Contestant();

$contestants = $contestant->findBy('event_id', $event_id);

$judge = new Judge();

$html_table = '';

$html_table = '<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th class="text-center">Contestant #</th>
            <th class="text-center">Description</th>
            <th class="text-center">Name</th>
            <th class="text-center">Score</th>
        </tr>
    </thead>
    <tbody>';

foreach($contestants as $con) {
$html_table .= '<tr>
    <td class="text-center">'. $con->contestant_number .'</td>
    <td class="text-center">'. $con->contestant_description .'</td>
    <td class="text-center">'. $con->contestant_name .'</td>
    <td class="text-center">';

    $score = new Score();

    $scores = $score->GetContestantScore($event_id, $con->id);

    if($scores){
        $html_table .= $scores;
    }else{
        $html_table .= '<form class="form-score">
            <input type="hidden" name="contestant_id" value="'. $con->id .'">
            <input type="hidden" name="judge_id" value="'. $judge->getJudgeId() .'">
            <input type="hidden" name="event_id" value="'. $judge->getEventId() .'">
            <input type="number" class="form-control" name="score" id="score"
            min="1" max="10" step="0.01" required>
        </form>';
    }

    $html_table .= '</td>';

    $html_table .= '</tr>';
}

$html_table .= '</tbody>
</table>';

echo $html_table;