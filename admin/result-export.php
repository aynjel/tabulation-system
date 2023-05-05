<?php

require('./autoload.php');

date_default_timezone_set('Asia/Manila');

$page = (Input::get('page')) ? Input::get('page') : 'dashboard';

$title = ucwords(str_replace('_', ' ', $page));

$user = new User();

if(!$user->isLoggedIn() || Input::get('page') == 'logout'){$user->logout();header('Location: ./auth/login.php');}

$event_id = Input::get('event_id');

$event = new Event();

$e = $event->find($event_id);

$contestant = new Contestant();

$contestants = $contestant->findBy('event_id', $event_id);

$criteria = new Criteria();

$criterias = $criteria->findBy('event_id', $event_id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Result - <?= $e->event_name; ?>
    </title>

    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../node_modules/toastr/build/toastr.min.css">
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../node_modules/datatables.net/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../node_modules/datatables.net/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

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

<footer class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>
                <?= Config::get('website/name'); ?> <script>
                    document.write(new Date().getFullYear());
                </script>
            </span></strong>. All Rights Reserved <br>
    </div>
    <div class="credits">
        Designed by <a href="https://fb.com/">Junie</a>
    </div>
</footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
</a>

<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../node_modules/toastr/build/toastr.min.js"></script>
<script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="../node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../node_modules/datatables.net/js/dataTables.buttons.min.js"></script>
<script src="../node_modules/datatables.net/js/buttons.print.min.js"></script>
<script src="../node_modules/datatables.net/js/buttons.html5.min.js"></script>
<script src="../node_modules/datatables.net/js/jszip.min.js"></script>
<script src="../node_modules/datatables.net/js/pdfmake.min.js"></script>

<script src="./js/main.js"></script>

</body>
</html>