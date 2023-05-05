<?php

$event_id = Input::get('event_id');

$event = new Event();

$e = $event->find($event_id);

$contestant = new Contestant();

$contestants = $contestant->findBy('event_id', $event_id);

$criteria = new Criteria();

$criterias = $criteria->findBy('event_id', $event_id);

?>

<section class="section dashboard">
    <div class="table-responsive">

        <table class="table table-bordered table-hover" id="resultTable" style="width: 100%;">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Baranggay</th>
                    <th>Candidate Name</th>
                    <?php foreach($criterias as $criteria): ?>
                    <th><?= $criteria->criteria_name . ' (' . $criteria->criteria_percentage . '%)'; ?></th>
                    <?php endforeach; ?>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($contestants as $con): ?>
                <tr>
                    <td><?= $con->contestant_number; ?></td>
                    <td><?= $con->contestant_description; ?></td>
                    <td><?= $con->contestant_name; ?></td>
                    <?php foreach($criterias as $criteria): ?>
                    <td>
                        <?php
                        $scr = $contestant->getScore($criteria->id, $con->id);
                        if($scr == 0):?>
                        <span class="badge bg-danger">N/A</span>
                        <?php else: ?>
                        <button class="btn btn-lg" onclick="ShowScore(<?= $con->id; ?>, <?= $criteria->id; ?>)">
                            <span class="badge bg-success"><?= $scr; ?></span>
                        </button>
                        <?php endif; ?>
                    </td>
                    <?php endforeach; ?>
                    <td>
                        <?php
                        $total = 0;
                        foreach($criterias as $criteria){
                            $total += $contestant->getScore($criteria->id, $con->id);
                        }
                        ?>
                        <button class="btn btn-lg" onclick="ShowTotalScore(<?= $con->id; ?>)">
                            <span class="badge bg-success"><?= $total; ?></span>
                        </button>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                
            </tfoot>
        </table>
    </div>
</section>

<!-- show score modal -->
<div class="modal fade" id="showScoreModal" tabindex="-1" aria-labelledby="showScoreModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="showScoreModalLabel">Score Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="showScoreModalBody" class="modal-body">
            </div>
        </div>
    </div>
</div>

<!-- show total score modal -->
<div class="modal fade" id="showTotalScoreModal" tabindex="-1" aria-labelledby="showTotalScoreModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="showTotalScoreModalLabel">Total Score Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="showTotalScoreModalBody" class="modal-body">
            </div>
        </div>
    </div>
</div>