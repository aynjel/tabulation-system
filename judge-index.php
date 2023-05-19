<?php
require('./autoload.php');

$title = 'Judge';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title; ?> | Tabulation System
    </title>

    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./node_modules/toastr/build/toastr.min.css">
    <link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./node_modules/datatables.net/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./node_modules/datatables.net/css/buttons.dataTables.min.css">
    

    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <div class="logo d-flex align-items-center">
                <span class="d-lg-block">
                    <span class="text-primary">Judge</span>
                </span>
            </div>
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i>
                        <span class="d-none d-md-block dropdown-toggle ps-2 judge-name"></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6 class="text-overflow m-0 judge-name"></h6>
                            <span class="text-overflow text-muted judge-username"></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)" onclick="SignOut()">
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

        <section class="section dashboard" id="judge-content">
            <div class="row">

                <div class="col-xxl-12 col-md-12">
                    <div class="card info-card revenue-card text-center">

                        <div class="card-header mt-5">
                            <h1 class="h1 display-6 text-primary text-uppercase event-name"></h1>

                            <h5 class="card-text">
                                <i class="bi bi-calendar-event"></i>
                                <span class="text-uppercase event-date"></span> |
                                <i class="bi bi-clock"></i>
                                <span class="text-uppercase event-time"></span> |
                                <i class="bi bi-geo-alt"></i>
                                <span class="text-uppercase event-venue"></span> <br>
                                <br>
                                <span class="text-uppercase event-description"></span>
                            </h5>

                            <h3 class="card-text">
                                <span class="text-uppercase criteria-name"></span>
                            </h3>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive" id="judge-contestants-table">
                                <table class="table table-hover table-bordered align-middle" id="j-contestants-table"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Number</th>
                                            <th scope="col" class="text-center">Baranggay</th>
                                            <th scope="col" class="text-center">Name</th>
                                            <th scope="col" class="text-center">Score (1 - 10)</th>
                                            <th scope="col" class="text-center d-none" id="header-ranking">Ranking</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                                <div class="text-center">
                                    <button class="btn btn-primary" id="submit-all-score" onclick="submitScore()" disabled>
                                        Submit Score
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            
                        </div>

                    </div>
                </div>

            </div>
        </section>

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

    <div class="modal fade" id="judge-scores-modal" data-bs-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong>Scores Submitted Successfully</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="modal-title">
                        Scores Submitted Successfully
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./node_modules/toastr/build/toastr.min.js"></script>
    <script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="./node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="./node_modules/datatables.net/js/dataTables.buttons.min.js"></script>
    <script src="./node_modules/datatables.net/js/buttons.print.min.js"></script>
    <script src="./node_modules/datatables.net/js/buttons.html5.min.js"></script>
    <script src="./node_modules/datatables.net/js/jszip.min.js"></script>

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

            var judge_id = 0;
            var event_id = 0;
            var criteria_id = 0;

            function CheckJudge(){
                $.ajax({
                    url: "./backend/judge/check-judge.php",
                    method: "POST",
                    success: function (data) {
                        var result = JSON.parse(data);
                        if (result.status == "success") {
                            var judge = result.data;
                            $(".judge-name").html(judge.full_name);
                            $(".judge-username").html(judge.user_name);
                            judge_id = judge.judge_id;
                            event_id = judge.event_id;

                            GetEventDetails();
                            GetContestants();

                        } else {
                            window.location.href = "auth/login.php";
                        }
                    }
                });
            }

            function GetEventDetails(){
                $.ajax({
                    url: "./backend/judge/get-event-details.php",
                    method: "POST",
                    success: function (data) {
                        var result = JSON.parse(data);
                        if (result.status == "success") {
                            var event = result.data;
                            $(".event-name").html(event.event_name);
                            $(".event-date").html(event.event_date);
                            $(".event-time").html(event.event_time);
                            $(".event-venue").html(event.event_venue);
                            $(".event-description").html(event.event_description);
                        } else {
                            Toast(result.status, result.message);
                        }
                    }
                });
            }

            function CheckEvent(){
                $.ajax({
                    url: "./backend/judge/check-event.php",
                    method: "POST",
                    success: function (data) {
                        var result = JSON.parse(data);
                        if (result.status == "success" && result.data.event_status == "started") {
                            $("#loading-modal").modal("hide");
                        } else {
                            $("#loading-modal").modal("show");
                        }
                    }
                });
            }

            // get showed criteria
            function GetShowedCriteria(){
                $.ajax({
                    url: "./backend/judge/get-showed-criteria.php",
                    method: "POST",
                    success: function (data) {
                        var result = JSON.parse(data);
                        if (result.status == "success") {
                            var criteria = result.data;
                            
                            if(criteria_id != criteria.criteria_id){
                                criteria_id = criteria.criteria_id;
                                $("#header-ranking").addClass("d-none");
                                GetContestants();
                            }

                            GetCriteriaDetails();

                            $("#judge-contestants-table").show();
                            $("#submit-score-btn").attr("disabled", false);

                            var forms = $(".form-score");

                            $.each(forms, function(index, form){
                                $(form).find("input[name='criteria_id']").val(criteria.criteria_id);
                                $(form).find("input[name='score']").attr("disabled", false);
                            });

                        } else {
                            $("#judge-contestants-table").hide();

                            $(".criteria-name").html("<span class='text-danger'>No criteria showed</span>");
                            $("#submit-score-btn").attr("disabled", true);
                            var forms = $(".form-score");

                            $.each(forms, function(index, form){
                                $(form).find("input[name='criteria_id']").val(0);
                                $(form).find("input[name='score']").attr("disabled", true);
                            });
                        }
                    }
                });
            }

            // get criteria details
            function GetCriteriaDetails(){
                $.ajax({
                    url: "./backend/judge/get-criteria-details.php",
                    method: "POST",
                    data: {
                        criteria_id: criteria_id
                    },
                    success: function (data) {
                        var result = JSON.parse(data);
                        if (result.status == "success") {
                            var criteria = result.data;
                            $(".criteria-name").html(criteria.criteria_name);
                            // $(".criteria-percentage").html(criteria.criteria_percentage + "%");
                            
                            var forms = $(".form-score");

                            $.each(forms, function(index, form){
                                $(form).find("input[name='criteria_id']").val(criteria_id);
                            });
                        } else {
                            Toast(result.status, result.message);
                        }
                    }
                });
            }

            function SignOut() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to sign out?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, sign out!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "./backend/judge/sign-out.php",
                            type: "POST",
                            success: function (data) {
                                data = JSON.parse(data);

                                if (data.status == "success") {
                                    Swal.fire({
                                        title: 'Signing out...',
                                        text: 'Please wait...',
                                        allowOutsideClick: false,
                                        timer: 2000,
                                        onBeforeOpen: () => {
                                            Swal.showLoading()
                                        },
                                        timerProgressBar: true,
                                        showConfirmButton: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                        allowEnterKey: false,
                                    }).then((result) => {
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            window.location.href = "./auth/login.php";
                                        }
                                    })
                                } else {
                                    Toast("error", "Something went wrong!");
                                }
                            }
                        });
                    }
                })
            }

            function GetContestants(){
                $.ajax({
                    url: "./backend/judge/get-contestants.php",
                    method: "POST",
                    data: {
                        criteria_id: criteria_id
                    },
                    success: function (data) {
                        var result = JSON.parse(data);
                        if (result.status == "success") {
                            var contestants = result.data;
                            var html = "";
                            for(var i = 0; i < contestants.length; i++){
                                html += "<tr>";
                                html += "<td class='text-center'>" + contestants[i].number + "</td>";
                                html += "<td class='text-center'>" + contestants[i].baranggay + "</td>";
                                html += "<td class='text-center'>" + contestants[i].name + "</td>";
                                
                                // check if the contestant has a score else show the score form
                                if(contestants[i].score == null || contestants[i].score == 0 || contestants[i].rank == null || contestants[i].rank == 0){
                                    html += "<td class='text-center'>";
                                    html += "<form class='form-score'>";
                                    html += "<input type='hidden' name='contestant_id' value='" + contestants[i].id + "'>";
                                    html += "<input type='hidden' name='event_id' value='" + event_id + "'>";
                                    html += "<input type='hidden' name='judge_id' value='" + judge_id + "'>";
                                    html += "<input type='hidden' name='criteria_id' value='" + criteria_id + "'>";
                                    html += "<input type='number' name='score' class='form-control score text-center mx-auto w-50' min='0' max='10' step='0.01' placeholder='Score'>";
                                    html += "</form>";
                                    html += "</td>";
                                } else {
                                    html += "<td class='text-success'>" + contestants[i].score + "</td>";

                                    $("#header-ranking").removeClass("d-none");
                                    html += "<td class='text-success'>" + contestants[i].rank + "</td>";
                                }

                                
                                html += "</tr>";
                            }
                            $("#j-contestants-table tbody").html(html);

                            
                        } else {
                            Toast(result.status, result.message);
                        }
                    }
                });
            }

            function submitScore(){
                $("#submit-all-score").html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting...'
                );
                
                var forms = $(".form-score");
                
                // check if all score is filled
                var isFilled = true;
                $.each(forms, function(index, form){
                    var score = $(form).find("input[name='score']").val();
                    if(score == ""){
                        isFilled = false;
                    }
                });

                if(isFilled){
                    var forms = $(".form-score");

                    // variable to store all score data
                    var score_data = [];

                    for (var i = 0; i < forms.length; i++) {
                        var form = forms[i];
                        score_data.push({
                            contestant_id: $(form).find("input[name='contestant_id']").val(),
                            score: $(form).find("input[name='score']").val()
                        });
                    }

                    score_data.sort(function(a, b) {
                        return parseFloat(b.score) - parseFloat(a.score);
                    });

                    const count = {};

                    for (let i = 0; i < score_data.length; i++) {
                        var currentScore = score_data[i].score;
                        if (count[currentScore]) {
                            count[currentScore]++;
                        } else {
                            count[currentScore] = 1;
                        }
                    }

                    var rank = 0;
                    var dupctr = 1;

                    // loop through score data
                    $.each(score_data, function(index, score) {
                        var dup = count[score.score];

                        // variable to store rank of contestant
                        var contestant_rank = 0;

                        // if score is not duplicate
                        if (dup == 1) {
                            rank++;
                            console.log("Contestant ID: " + score.contestant_id + " SCORE: " + score.score + " RANK:" + rank);
                            contestant_rank = rank;
                        } else if (dup > 1 && dupctr < dup) {
                            console.log("Contestant ID: " + score.contestant_id + " SCORE: " + score.score + " RANK:" + (rank + 1.5));
                            contestant_rank = rank + 1.5;
                            dupctr++;
                        } else {
                            console.log("Contestant ID: " + score.contestant_id + " SCORE: " + score.score + " RANK:" + (rank + 1.5));
                            contestant_rank = rank + 1.5;
                            rank += dup;
                            dupctr = 1;
                        }

                        // submit score
                        $.ajax({
                            url: "./backend/judge/submit-scores.php",
                            method: "POST",
                            data: {
                                event_id: event_id,
                                judge_id: judge_id,
                                criteria_id: criteria_id,
                                contestant_id: score.contestant_id,
                                score: score.score,
                                rank: contestant_rank
                            },
                            success: function (data) {
                                var result = JSON.parse(data);
                                if (result.status == "success") {
                                    $("#submit-all-score").attr("disabled", true);
                                    $("#judge-scores-modal").modal("show");
                                    GetContestants();
                                } else {
                                    Toast(result.status, result.message);
                                }
                            }
                        });
                    });


                }else{
                    Toast("error", "Please fill all score");
                    $("#submit-all-score").html("Submit");
                }
            }

            $(document).ready(function () {

                CheckJudge();
                GetShowedCriteria();

                setInterval(function(){
                    CheckEvent();
                    GetShowedCriteria();
                }, 1000);

            });

            // validate input score where judge can only input 1 to 10 score
            $(document).on("keyup", ".score", function(){
                var score = $(this).val();
                if(score > 10){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Score must be 1 to 10 only, You can also score with decimal',
                    }).then((result) => {
                        $("#submit-all-score").attr("disabled", true);
                        $(this).val("");
                    });
                    $(this).css({
                        "border-color": "#dc3545",
                        "border-width": "2px",
                        "color": "#dc3545"
                    });
                }else if(score < 0){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Score must be 1 to 10 only, You can also score with decimal',
                    }).then((result) => {
                        $("#submit-all-score").attr("disabled", true);
                        $(this).val("");
                    });
                    $(this).css({
                        "border-color": "#dc3545",
                        "border-width": "2px",
                        "color": "#dc3545"
                    });
                }else{
                    $(this).css({
                        "border-color": "#28a745",
                        "border-width": "2px",
                        "color": "#28a745"
                    });
                }

                // check if all inout score is filled
                var forms = $(".form-score");

                var filled = true;
                $.each(forms, function(index, form){
                    var score = $(form).find("input[name='score']").val();
                    if(score == ""){
                        filled = false;
                    }
                });

                if(filled){
                    $("#submit-all-score").attr("disabled", false);
                }else{
                    $("#submit-all-score").attr("disabled", true);
                }
            });
    </script>

</body>

</html>