<?php

$event_id = Input::get('event_id');

$event = new Event();

$e = $event->find($event_id);

?>

<section class="section dashboard">
    <div class="table-responsive">

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Criteria</th>
                    <th>Percentage</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $criteria = new Criteria();
            $criterias = $criteria->findBy('event_id', $event_id);
            $total_percentage = 0;
            foreach($criterias as $c){
                $total_percentage += $c->criteria_percentage;
                echo '<tr>';
                echo '<td>' . $c->criteria_name . '</td>';
                echo '<td>' . $c->criteria_percentage . '</td>';
                // get criteria score by criteria id
                $score = new Score();
                $scores = $score->findBy('criteria_id', $c->id);
                echo '<td>';
                $total_score = 0;
                foreach($scores as $s){
                    // add all score
                    $total_score += $s->score;
                }
                echo $total_score;
                echo '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <th><?= $total_percentage; ?></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</section>