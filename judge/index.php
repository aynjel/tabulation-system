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
    <title>
        <?= $title; ?> | Judge
    </title>

    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../node_modules/toastr/build/toastr.min.css">
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">

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

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>

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

    <div class="modal fade" id="notice-modal" data-bs-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-1">
                                <i class="bi bi-person-check fs-1"></i>
                            </div>
                            <div class="col-11">
                                <h5 class="modal-title fw-bold" id="scrollableModalTitle">
                                    Hi, <?= $j->judge_name; ?>! Welcome to the Judge Tabulator!
                                    <br>
                                    You are now judging the event of <span
                                        class="text-success"><?= $e->event_name; ?></span>
                                    <p class="text-muted mb-0 fs-6 fw-normal">
                                        Please read the following instructions carefully.
                                    </p>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="jumbotron container">
                        <p class="lead fs-6 fw-normal">
                            <ol>
                                <li>
                                    You can only input a score of <strong>1 to 10</strong>. Otherwise it will be
                                    invalid.
                                </li>
                                <li>
                                    Be careful in inputting the score. Once you submit it, you can't change it anymore.
                                </li>
                                <li>
                                    You can only submit your score once. So be sure that you are satisfied with your
                                    score.
                                </li>
                                <li>
                                    To submit your score, click the <code>Submit</code> beside the score input box.
                                    You can also press the <code>Enter</code> key on your keyboard to submit your score.
                                </li>
                                <li>
                                    If your having issues using the system please contact the event organizer. Thank
                                    you! <i class="bi bi-emoji-smile"></i>
                                </li>
                                <li>
                                    Enjoy! <i class="bi bi-emoji-smile"></i> <i class="bi bi-emoji-smile"></i> <i
                                        class="bi bi-emoji-smile"></i>
                                </li>
                            </ol>
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">
                        <i class="bi bi-check-circle"></i>
                        I understand
                    </button>
                </div>
            </div>
        </div>
    </div>

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

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../node_modules/toastr/build/toastr.min.js"></script>
    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

    <script src="./js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            if (localStorage.getItem('notice') == null) {
                $('#notice-modal').modal('show');
                localStorage.setItem('notice', 'true');
            }

            var judge_id = <?= $j-> id; ?>;
            var event_id = <?= $j-> event_id; ?>;
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
                        
                        if (obj.status == "started") {
                            $('#loading-modal').modal('hide');
                            FetchCriteriaData();
                            FetchContestant();
                        } else {
                            $('#loading-modal').modal('show');

                            setTimeout(function () {
                                CheckEvent();
                            }, 1000);
                        }
                    }
                });
            }

            function FetchCriteriaData() {
                $.ajax({
                    url: "./../backend/judge/fetch-criteria-data.php",
                    type: "POST",
                    data: {
                        event_id: event_id
                    },
                    async: false,
                    success: function (data) {
                        var obj = JSON.parse(data);

                        var criteria = obj.criteria;

                        $("#criteria-label").html(obj.criteria.criteria_name + " (" + obj.criteria
                            .criteria_percentage + "%)");

                        $("#criteria-id").html(obj.criteria.id);
                        criteria_id = obj.criteria.id;
                    }
                });
            }


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
                                location.reload();
                                $("#submit-all-score").attr('disabled', 'disabled');
                            }
                        }
                    });
                }
            });

            $(document).ready(function () {
                CheckEvent();
                setInterval(function () {
                    CheckEvent();
                    FetchCriteriaData();    
                }, 2000);
                FetchCriteriaData();
                FetchContestant();
            });
        });
    </script>

</body>

</html>