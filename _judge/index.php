<?php
require('./autoload.php');

date_default_timezone_set('Asia/Manila');

$page = (Input::get('page')) ? Input::get('page') : 'dashboard';

$title = ucwords(str_replace('_', ' ', $page));

$judge = new Judge();

$j = $judge->find(Session::get('judge_id'));

if(!$judge->isLoggedIn() || Input::get('page') == 'logout'){$judge->logout();echo '<script>window.location.href = "./../auth/login.php";</script>';}

$event = new Event();

$e = $event->find($j->event_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title; ?> | Judge
    </title>

    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../node_modules/toastr/build/toastr.min.css">
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../node_modules/datatables.net/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../node_modules/datatables.net/css/buttons.dataTables.min.css">
    

    <link rel="stylesheet" href="./css/judge.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">
                    <span class="text-primary">Judge</span> Dashboard
                </span>
            </a>
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i>
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            <?= $j->judge_name; ?>
                        </span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>
                                <?= $j->judge_name; ?>
                            </h6>
                            <span>
                                Judge Role
                            </span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="?page=logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>

    </header>

    <main class="container-fluid main">

        <div class="pagetitle">
            <h1>
                <?= $title; ?>
            </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
                    <li class="breadcrumb-item active"><?= $title; ?></li>
                </ol>
            </nav>
        </div>

        <?php

            if(file_exists('./pages/' . $page . '.php')){
                require('./pages/' . $page . '.php');
            }else{
                echo '<h1>404</h1>';
            }

        ?>

    </main>

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

    <div class="modal fade" id="loading-modal" data-bs-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="jumbotron container text-center py-5">
                        <h5 class="modal-title fw-bold" id="scrollableModalTitle">
                            Please wait for the event organizer to start the event. Thank you!
                        </h5>
                        
                        <br>
                        <br>


                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="score-ranking-modal" data-bs-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fw-bold" id="criteria-name-score-ranking">
                    </h2>
                    <h5 class="modal-title fw-bold" id="scrollableModalTitle">
                        Score Ranking
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="table-responsive" id="score-ranking-table">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="score-ranking-modal-close">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

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

    <script type="text/javascript">
        function Toast(status, message) {
            Command: toastr[status](message)

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        }

            var judge_id = <?= $j->id; ?>;
            var event_id = <?= $j->event_id; ?>;
            var criteria_id = 0;
            var contestant_id = 0;

            // check if the event is started
            function CheckEvent() {
                $.ajax({
                    url: "./../backend/judge/check-event.php",
                    type: "POST",
                    data: {
                        event_id: event_id
                    },
                    async: false,
                    success: function (data) {
                        var obj = JSON.parse(data);
                        
                        if (obj.status == "success") {
                            $('#loading-modal').modal('hide');
                        } else {
                            $('#loading-modal').modal('show');

                            setTimeout(function () {
                                CheckEvent();
                            }, 1000);
                        }
                    }
                });
            }

            function CheckShowedCriteria() {
                $.ajax({
                    url: "./../backend/judge/check-showed-criteria.php",
                    type: "POST",
                    data: {
                        event_id: event_id
                    },
                    async: false,
                    success: function (data) {
                        var obj = JSON.parse(data);

                        if(obj.status == "success") {
                            $("#criteria-name").html(obj.criteria.criteria_name);
                            $("#criteria-name-score-ranking").html(obj.criteria.criteria_name);
                            $("#table-responsive").show();

                            // check if previous criteria is the same as the current criteria
                            if(criteria_id != obj.criteria.id) {
                                criteria_id = obj.criteria.id;
                                FetchContestantData();
                            }
                        } else {
                            $("#criteria-name").html("<span class='badge bg-danger'>No Criteria to be judged!</span><br><br><p class='text-muted'>Please wait for the event organizer to add criteria.</p>");
                            $("#table-responsive").hide();
                        }

                    }
                });
            }
            
            function FetchContestantData(){
                $.ajax({
                    url: "./../backend/judge/fetch-contestant-data.php",
                    type: "POST",
                    data: {
                        event_id: event_id,
                    },
                    async: false,
                    success: function (data) {
                        $("#j-contestants-table tbody").html(data);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            }

            function JudgeScoreRanking(){
                $.ajax({
                    url: "./../backend/judge/judge-score-ranking.php",
                    type: "POST",
                    data: {
                        event_id: event_id,
                        criteria_id: criteria_id,
                    },
                    async: false,
                    success: function (data) {
                        $("#score-ranking-table").html(data);
                        $("#judge-score-ranking-table").DataTable({
                            'paging': false,
                            'searching': false,
                            'info': false
                        });
                        // $(".form-score").hide();
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            }

            $(document).ready(function () {

                CheckEvent();
                CheckShowedCriteria();
                FetchContestantData();
                JudgeScoreRanking();
                
                setInterval(function () {
                    CheckEvent();
                    CheckShowedCriteria();
                }, 2000);

                $(".form-score").on('keyup', function () {
                    var input_boxes = $(this).find('input[type="number"]');
                    var is_filled = true;
                    var is_valid = true;
                    
                    $.each(input_boxes, function (index, input_box) {
                        if ($(input_box).val() == '' || $(input_box).val() == null) {
                            is_filled = false;
                        }

                        var value = $(input_box).val();
                        if (value < 1 || value > 10) {
                            is_valid = false;
                            $(input_box).val(null);
                        }
                    });

                    if (is_filled && is_valid) {
                        $("#submit-all-score").removeAttr('disabled');
                    } else {
                        $("#submit-all-score").attr('disabled', 'disabled');
                    }
                });

                $("#submit-all-score").on('click', function (e) {
                    e.preventDefault();

                    $("#submit-all-score").html(
                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting...'
                    );
                    
                    var forms = $(".form-score");
                    
                    for (var i = 0; i < forms.length; i++) {
                        var form = forms[i];
                        $.ajax({
                            url: './../backend/judge/submit_scores.php',
                            type: 'POST',
                            data: {
                                criteria_id: criteria_id,
                                judge_id: $(form).find('input[name="judge_id"]').val(),
                                event_id: $(form).find('input[name="event_id"]').val(),
                                contestant_id: $(form).find('input[name="contestant_id"]').val(),
                                score: $(form).find('input[name="score"]').val()
                            },
                            success: function (data) {
                                var obj = JSON.parse(data);
                                if (obj.status == 'success') {
                                    
                                    setTimeout(function () {
                                        $("#submit-all-score").html('Submit');
                                        $("#score-ranking-modal").modal('show');

                                        JudgeScoreRanking();

                                        $('#score-ranking-modal').on('hidden.bs.modal', function () {
                                            location.reload();
                                        });
                                    }, 3000);
                                    
                                }
                            }
                        });
                    }
                });

            });
    </script>

</body>

</html>