<?php

$criteria_id = Input::get('criteria_id');

$criteria = new Criteria();

$cri = $criteria->find($criteria_id);

$contestant = new Contestant();

$contestants = $contestant->findBy('event_id', $cri->event_id);

$event = new Event();

$e = $event->find($cri->event_id);

$judge = new Judge();

$judges = $judge->findBy('event_id', $cri->event_id);

?>

<section class="section dashboard">
    <div class="table-responsive">

    <h1 class="text-center text-uppercase"><?= $e->event_name; ?></h1>
    <h3 class="text-center text-uppercase"><?= $cri->criteria_name . ' (' . $cri->criteria_percentage . '%)'; ?></h3>

        <table class="table table-bordered table-hover text-center" id="criteria-result-table" style="width: 100%;">
            <thead>
                
                <tr>
                    <th>Baranggay</th>
                    <th>Candidate Name</th>

                    <?php foreach($judges as $judge): ?>
                    <th><?= $judge->judge_name; ?></th>
                    <?php endforeach; ?>

                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($contestants as $key => $con): ?>
                <tr>
                    <td><?= $con->contestant_description; ?></td>
                    <td><?= $con->contestant_name; ?></td>
                    <?php foreach($judges as $judge): ?>
                    <td>
                        <?php
                        $scr = $contestant->getScoreByJudge($judge->id, $criteria_id, $con->id);
                        echo $scr;
                        ?>
                    </td>
                    <?php endforeach; ?>
                    <td>
                        <?php
                        $total = 0;
                        foreach($judges as $judge){
                            $total += $contestant->getScoreByJudge($judge->id, $criteria_id, $con->id);
                        }
                        echo $total;
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
</section>