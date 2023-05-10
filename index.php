<?php
require('./autoload.php');

date_default_timezone_set('Asia/Manila');

$page = (Input::get('page')) ? Input::get('page') : 'dashboard';

$title = ucwords(str_replace('_', ' ', $page));

$user = new User();

if(!$user->isLoggedIn() || Input::get('page') == 'logout'){$user->logout();header('Location: ./auth/login.php');}

$event = new Event();

$events = $event->all();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title; ?> | Admin
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
            <a href="index.php" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">
                    <span class="text-primary">Admin</span> Dashboard
                </span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
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
                            <?= $user->getFullName(); ?>
                        </span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>
                                <?= $user->getFullName(); ?>
                            </h6>
                            <span>
                                Admin Role
                            </span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <!-- <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li> -->

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

    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="?page=dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="?page=manage">
                    <i class="bi bi-layout-text-sidebar"></i>
                    <span>Manage</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="?page=events">
                    <i class="bi bi-calendar-event"></i>
                    <span>Events</span>
                </a>
            </li>

        </ul>

    </aside>

    <main id="main" class="main">

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

    <footer id="footer" class="footer">
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

    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./node_modules/toastr/build/toastr.min.js"></script>
    <script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="./node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="./node_modules/datatables.net/js/dataTables.buttons.min.js"></script>
    <script src="./node_modules/datatables.net/js/buttons.print.min.js"></script>
    <script src="./node_modules/datatables.net/js/buttons.html5.min.js"></script>
    <script src="./node_modules/datatables.net/js/jszip.min.js"></script>
    <script src="./node_modules/datatables.net/js/pdfmake.min.js"></script>

    <script src="./js/main.js"></script>
    <script type="text/javascript">
        var event_id = 0;
        var criteria_id = 0;
        function Toast(status, message){
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

        function export_excel(table, title) {
            $(table).DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: title,
                        text:'Export Excel',
                        titleAttr: 'Export Excel',
                        "oSelectorOpts": {filter: 'applied', order: 'current'},
                        exportOptions: {
                                modifier: {
                                page: 'all'
                                },
                                    format: {
                                        header: function ( data, columnIdx ) {
                                            if(columnIdx==1){
                                            return 'Account Number';
                                            }
                                            else{
                                            return data;
                                            }
                                        }
                                    }
                            }
                    },
                ]
            });
        }

        function FetchEventData(id) {
            $.ajax({
                url: "././backend/admin/fetch-event-data.php",
                type: "POST",
                data: {
                    event_id: id
                },
                success: function (data) {
                    data = JSON.parse(data);
                    
                    var contestant = data.contestants;
                    var contestant_html = "";
                    for (var i = 0; i < contestant.length; i++) {

                        contestant_html += "<tr>";
                        contestant_html += "<td>" + contestant[i].contestant_number + "</td>";
                        contestant_html += "<td>" + contestant[i].contestant_name + "</td>";
                        contestant_html += "<td>" + contestant[i].contestant_description + "</td>";
                        contestant_html +=
                            "<td><button class='btn btn-sm btn-primary' onclick='ViewResult(" + contestant[i].id + ")'>Result</button></td>";
                        contestant_html += "</tr>";
                    }
                    $("#e-contestants-table tbody").html(contestant_html);
                    $("#e-contestant-count").html(contestant.length);

                    var judge = data.judges;
                    var judge_html = "";
                    for (var i = 0; i < judge.length; i++) {

                        judge_html += "<tr>";
                        judge_html += "<td>" + judge[i].judge_name + "</td>";
                        judge_html += "<td>" + judge[i].judge_username + "</td>";
                        judge_html += "<td>" + judge[i].judge_password + "</td>";
                        judge_html +=
                            "<td><button class='btn btn-sm btn-primary' onclick='ViewResult(" + judge[i].id + ")'>Result</button></td>";
                        judge_html += "</tr>";
                    }
                    $("#e-judges-table tbody").html(judge_html);
                    $("#e-judge-count").html(judge.length);

                    var criteria = data.criterias;
                    var criteria_html = "";
                    for (var i = 0; i < criteria.length; i++) {

                        var cs;
                        if(criteria[i].is_show == 'true'){
                            cs = '<span class="badge bg-success">Shown</span>'
                        }else{
                            cs = '<div class="d-flex justify-content-between align-items-center"><span class="badge bg-danger">Hidden</span><form id="show-criteria-form"><input type="hidden" name="criteria_id" value="'+criteria[i].id+'"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="is_show" value="true" onchange="ShowCriteria(this.form)"></div></form></div>'
                        }

                        criteria_html += "<tr>";
                        criteria_html += "<td>" + criteria[i].criteria_name + "</td>";
                        criteria_html += "<td>" + criteria[i].criteria_percentage + "</td>";
                        criteria_html += "<td>" + cs + "</td>";
                        criteria_html +=
                            "<td><a class='btn btn-sm btn-primary' target='_blank' href='criteria-result.php?criteria_id=" + criteria[i].id + "'>Result</a></td>";
                        criteria_html += "</tr>";
                    }
                    $("#e-criterias-table tbody").html(criteria_html);
                    $("#e-criteria-count").html(criteria.length);
                }
            });
        }

        function FetchData() {
            $.ajax({
                url: "././backend/admin/fetch-data.php",
                type: "GET",
                success: function (data) {
                    data = JSON.parse(data);

                    var events = data.events;
                    var event_html = "";
                    for (var i = 0; i < events.length; i++) {
                        event_html += "<tr>";
                        event_html += "<td>" + events[i].id + "</td>";
                        event_html += "<td>" + events[i].event_name + "</td>";
                        event_html += "<td>" + events[i].event_date + "</td>";
                        event_html += "<td>" + events[i].event_time + "</td>";
                        event_html += "<td>" + events[i].event_venue + "</td>";
                        event_html += "<td>" + events[i].event_description + "</td>";
                        event_html += "<td>" + (events[i].is_start == 'true' ?
                            '<span class="badge bg-success">Started</span>' :
                            '<span class="badge bg-danger">Not Started</span>') + "</td>";
                        event_html +=
                            "<td><div class='btn-group'><button class='btn btn-sm btn-primary' onclick='EditEvent(" +
                            events[i].id +
                            ")'><i class='bi bi-pencil-square'></i></button><button class='btn btn-sm btn-danger' onclick='DeleteEvent(" +
                            events[i].id + ")'><i class='bi bi-trash'></i></button></div></td>";
                        event_html += "</tr>";

                        event_id = events[i].id;
                    }
                    $("#events-table tbody").html(event_html);
                    $("#e-events-count").html(events.length);

                    var e_event_html = "";
                    for (var i = 0; i < events.length; i++) {
                        e_event_html += "<tr>";
                        e_event_html += "<td>" + events[i].event_name + "</td>";
                        e_event_html += "<td>" + events[i].event_description + "</td>";
                        e_event_html += "<td>" + events[i].event_date + "</td>";
                        e_event_html += "<td>" + events[i].event_time + "</td>";
                        e_event_html += "<td>" + events[i].event_venue + "</td>";
                        e_event_html += "<td>" + (events[i].is_start == 'true' ?
                            '<span class="badge bg-success">Started</span>' :
                            '<span class="badge bg-danger">Not Started</span>') + "</td>";
                        e_event_html +=
                            "<td><div class='btn-group'><a class='btn btn-sm btn-info text-white' href='?page=event&event_id=" + events[i].id + "'><i class='bi bi-eye'></i> View</a><div></td>";
                        e_event_html += "</tr>";
                    }
                    $("#e-events-table tbody").html(e_event_html);

                    var contestant = data.contestants;
                    var contestant_html = "";
                    for (var i = 0; i < contestant.length; i++) {

                        contestant_html += "<tr>";
                        
                        var event_name = '';
                        $.ajax({
                            url: "././backend/admin/get-event-name.php",
                            type: "POST",
                            data: {
                                event_id: contestant[i].event_id
                            },
                            async: false,
                            success: function (data) {
                                event_name = data;
                            }
                        });

                        contestant_html += "<td>" + event_name + "</td>";

                        contestant_html += "<td>" + contestant[i].contestant_number + "</td>";
                        contestant_html += "<td>" + contestant[i].contestant_name + "</td>";
                        contestant_html += "<td>" + contestant[i].contestant_description + "</td>";
                        contestant_html +=
                            "<td><div class='btn-group'><button class='btn btn-sm btn-primary' onclick='EditContestant(" +
                            contestant[i].id +
                            ")'><i class='bi bi-pencil-square'></i></button><button class='btn btn-sm btn-danger' onclick='DeleteContestant(" +
                            contestant[i].id + ")'><i class='bi bi-trash'></i></button></div></td>";
                        contestant_html += "</tr>";
                    }
                    $("#contestants-table tbody").html(contestant_html);

                    var judge = data.judges;
                    var judge_html = "";
                    for (var i = 0; i < judge.length; i++) {
                        judge_html += "<tr>";
                        
                        var event_name = '';
                        $.ajax({
                            url: "././backend/admin/get-event-name.php",
                            type: "POST",
                            data: {
                                event_id: judge[i].event_id
                            },
                            async: false,
                            success: function (data) {
                                event_name = data;
                            }
                        });

                        judge_html += "<td>" + event_name + "</td>";

                        judge_html += "<td>" + judge[i].judge_name + "</td>";
                        judge_html += "<td>" + judge[i].judge_username + "</td>";
                        judge_html += "<td>" + judge[i].judge_password + "</td>";
                        judge_html +=
                            "<td><div class='btn-group'><button class='btn btn-sm btn-primary' onclick='EditJudge(" +
                            judge[i].id +
                            ")'><i class='bi bi-pencil-square'></i></button><button class='btn btn-sm btn-danger' onclick='DeleteJudge(" +
                            judge[i].id + ")'><i class='bi bi-trash'></i></button></div></td>";
                        judge_html += "</tr>";
                    }
                    $("#judges-table tbody").html(judge_html);

                    var criteria = data.criterias;
                    var criteria_html = "";
                    for (var i = 0; i < criteria.length; i++) {
                        criteria_html += "<tr>";
                        
                        var event_name = '';
                        $.ajax({
                            url: "././backend/admin/get-event-name.php",
                            type: "POST",
                            data: {
                                event_id: criteria[i].event_id
                            },
                            async: false,
                            success: function (data) {
                                event_name = data;
                            }
                        });

                        criteria_html += "<td>" + event_name + "</td>";

                        criteria_html += "<td>" + criteria[i].criteria_name + "</td>";
                        criteria_html += "<td>" + criteria[i].criteria_percentage + "</td>";
                        criteria_html += "<td>" + criteria[i].is_show + "</td>";
                        criteria_html +=
                            "<td><div class='btn-group'><button class='btn btn-sm btn-primary' onclick='EditCriteria(" +
                            criteria[i].id +
                            ")'><i class='bi bi-pencil-square'></i></button><button class='btn btn-sm btn-danger' onclick='DeleteCriteria(" +
                            criteria[i].id + ")'><i class='bi bi-trash'></i></button></div></td>";
                        criteria_html += "</tr>";

                        criteria_id = criteria[i].id;
                    }
                    $("#criterias-table tbody").html(criteria_html);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

        function CurrentShowedCriteria(event_id){
            $.ajax({
                url: "././backend/admin/get-current-showed-criteria.php",
                type: "POST",
                data: {
                    event_id: event_id
                },
                success: function (data) {
                    // alert(data);
                    $("#showed-criteria").html(data);
                    $("#current-showed-criteria").html(data);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

        function ShowScore(contestant_id, criteria_id){
            $.ajax({
                url: "././backend/admin/get-score.php",
                type: "POST",
                data: {
                    contestant_id: contestant_id,
                    criteria_id: criteria_id
                },
                success: function (data) {
                    $("#showScoreModal").modal("show");
                    $("#showScoreModalBody").html(data);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

        function ShowTotalScore(contestant_id){
            $.ajax({
                url: "././backend/admin/get-total-score.php",
                type: "POST",
                data: {
                    contestant_id: contestant_id
                },
                success: function (data) {
                    $("#showTotalScoreModal").modal("show");
                    $("#showTotalScoreModalBody").html(data);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

        function EditEvent(id){
            $.ajax({
                url: "././backend/admin/get-event.php",
                type: "POST",
                data: {
                    get_event_id: id
                },
                success: function (data) {
                    var obj = JSON.parse(data);
                    $("#edit_event_id").val(obj.id);
                    $("#edit_event_name").val(obj.event_name);
                    $("#edit_event_description").val(obj.event_description);
                    $("#edit_event_venue").val(obj.event_venue);
                    $("#edit_event_date").val(obj.event_date);
                    $("#edit_event_time").val(obj.event_time);
                    $("#editEventModal").modal("show");
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

        function EditContestant(id){
            $.ajax({
                url: "././backend/admin/get-contestant.php",
                type: "POST",
                data: {
                    get_contestant_id: id
                },
                success: function (data) {
                    var obj = JSON.parse(data);
                    $("#edit_contestant_id").val(obj.id);
                    $("#edit_contestant_number").val(obj.contestant_number);
                    $("#edit_contestant_name").val(obj.contestant_name);
                    $("#edit_contestant_description").val(obj.contestant_description);
                    $("#editContestantModal").modal("show");
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

        function EditJudge(id){
            $.ajax({
                url: "././backend/admin/get-judge.php",
                type: "POST",
                data: {
                    get_judge_id: id
                },
                success: function (data) {
                    var obj = JSON.parse(data);
                    $("#edit_judge_id").val(obj.id);
                    $("#edit_judge_name").val(obj.judge_name);
                    $("#edit_judge_username").val(obj.judge_username);
                    $("#edit_judge_password").val(obj.judge_password);
                    $("#editJudgeModal").modal("show");
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

        function EditCriteria(id){
            $.ajax({
                url: "././backend/admin/get-criteria.php",
                type: "POST",
                data: {
                    get_criteria_id: id
                },
                success: function (data) {
                    var obj = JSON.parse(data);
                    $("#edit_criteria_id").val(obj.id);
                    $("#edit_criteria_name").val(obj.criteria_name);
                    $("#edit_criteria_percentage").val(obj.criteria_percentage);
                    $("#editCriteriaModal").modal("show");
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

        // delete
        function DeleteEvent(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',

                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',

                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "././backend/admin/delete-event.php",
                        type: "POST",
                        data: {
                            delete_event_id: id
                        },
                        success: function (data) {
                            var obj = JSON.parse(data);
                            if(obj.status == "success"){
                                Toast(obj.status, obj.message);
                                FetchData();
                            }else{
                                Toast(obj.status, obj.message);
                            }
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                }
            });
        }

        function DeleteContestant(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',

                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',

                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "././backend/admin/delete-contestant.php",
                        type: "POST",
                        data: {
                            delete_contestant_id: id
                        },
                        success: function (data) {
                            var obj = JSON.parse(data);
                            if(obj.status == "success"){
                                Toast(obj.status, obj.message);
                                FetchData();
                            }else{
                                Toast(obj.status, obj.message);
                            }
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                }
            });
        }

        function DeleteJudge(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',

                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',

                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "././backend/admin/delete-judge.php",
                        type: "POST",
                        data: {
                            delete_judge_id: id
                        },
                        success: function (data) {
                            var obj = JSON.parse(data);
                            if(obj.status == "success"){
                                Toast(obj.status, obj.message);
                                FetchData();
                            }else{
                                Toast(obj.status, obj.message);
                            }
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                }
            });
        }

        function DeleteCriteria(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',

                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',

                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "././backend/admin/delete-criteria.php",
                        type: "POST",
                        data: {
                            delete_criteria_id: id
                        },
                        success: function (data) {
                            var obj = JSON.parse(data);
                            if(obj.status == "success"){
                                Toast(obj.status, obj.message);
                                FetchData();
                            }else{
                                Toast(obj.status, obj.message);
                            }
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                }
            });
        }

        $(document).ready(function () {
            FetchData();
            FetchEventData(<?= Input::get('event_id') ?>);
            CurrentShowedCriteria();

            setInterval(function () {
                FetchData();
                FetchEventData(<?= Input::get('event_id') ?>);
                CurrentShowedCriteria();
            }, 1000);


            //add
            $("#form-add-event").on("submit", function (e) {
                e.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "././backend/admin/add-event.php",
                    type: "POST",
                    data: form_data,
                    success: function (data) {
                        var obj = JSON.parse(data);

                        if(obj.status == 'success') {
                            $("#form-add-event")[0].reset();
                            FetchData();
                            Toast(obj.status, obj.message);
                        } else {
                            Toast(obj.status, obj.message);
                        }
                    },
                    error: function (data) {
                        Toast('error', 'Something went wrong!');
                        console.log(data);
                    }
                });
            });

            $("#form-add-contestant").on("submit", function (e) {
                e.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "././backend/admin/add-contestant.php",
                    type: "POST",
                    data: form_data,
                    success: function (data) {
                        var obj = JSON.parse(data);

                        if(obj.status == 'success') {
                            $("#form-add-contestant")[0].reset();
                            FetchEventData(<?= Input::get('event_id') ?>);
                            Toast(obj.status, obj.message);
                        } else {
                            Toast(obj.status, obj.message);
                        }
                    },
                    error: function (data) {
                        Toast('error', 'Something went wrong!');
                        console.log(data);
                    }
                });
            });

            $("#form-add-judge").on("submit", function (e) {
                e.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "././backend/admin/add-judge.php",
                    type: "POST",
                    data: form_data,
                    success: function (data) {
                        var obj = JSON.parse(data);

                        if(obj.status == 'success') {
                            $("#form-add-judge")[0].reset();
                            FetchEventData(<?= Input::get('event_id') ?>);
                            FetchData();
                            Toast(obj.status, obj.message);
                        } else {
                            Toast(obj.status, obj.message);
                        }
                    },
                    error: function (data) {
                        Toast('error', 'Something went wrong!');
                        console.log(data);
                    }
                });
            });

            $("#form-add-criteria").on("submit", function (e) {
                e.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "././backend/admin/add-criteria.php",
                    type: "POST",
                    data: form_data,
                    success: function (data) {
                        var obj = JSON.parse(data);

                        if(obj.status == 'success') {
                            $("#form-add-criteria")[0].reset();
                            FetchEventData(<?= Input::get('event_id') ?>);
                            FetchData();
                            Toast(obj.status, obj.message);
                        } else {
                            Toast(obj.status, obj.message);
                        }
                    },
                    error: function (data) {
                        Toast('error', 'Something went wrong!');
                        console.log(data);
                    }
                });
            });

            //edit
            $("#form-edit-event").on("submit", function (e) {
                e.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "././backend/admin/edit-event.php",
                    type: "POST",
                    data: form_data,
                    success: function (data) {
                        var obj = JSON.parse(data);

                        if(obj.status == 'success') {
                            $("#form-edit-event")[0].reset();
                            $("#editEventModal").modal("hide");
                            FetchData();
                            Toast(obj.status, obj.message);
                        } else {
                            Toast(obj.status, obj.message);
                        }
                    },
                    error: function (data) {
                        Toast('error', 'Something went wrong!');
                        console.log(data);
                    }
                });
            });

            $("#form-edit-contestant").on("submit", function (e) {
                e.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "././backend/admin/edit-contestant.php",
                    type: "POST",
                    data: form_data,
                    success: function (data) {
                        var obj = JSON.parse(data);

                        if(obj.status == 'success') {
                            $("#form-edit-contestant")[0].reset();
                            $("#editContestantModal").modal("hide");
                            FetchData();
                            Toast(obj.status, obj.message);
                        } else {
                            Toast(obj.status, obj.message);
                        }
                    },
                    error: function (data) {
                        Toast('error', 'Something went wrong!');
                        console.log(data);
                    }
                });
            });

            $("#form-edit-judge").on("submit", function (e) {
                e.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "././backend/admin/edit-judge.php",
                    type: "POST",
                    data: form_data,
                    success: function (data) {
                        var obj = JSON.parse(data);

                        if(obj.status == 'success') {
                            $("#form-edit-judge")[0].reset();
                            $("#editJudgeModal").modal("hide");
                            FetchData();
                            Toast(obj.status, obj.message);
                        } else {
                            Toast(obj.status, obj.message);
                        }
                    },
                    error: function (data) {
                        Toast('error', 'Something went wrong!');
                        console.log(data);
                    }
                });
            });

            $("#form-edit-criteria").on("submit", function (e) {
                e.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "././backend/admin/edit-criteria.php",
                    type: "POST",
                    data: form_data,
                    success: function (data) {
                        var obj = JSON.parse(data);

                        if(obj.status == 'success') {
                            $("#form-edit-criteria")[0].reset();
                            $("#editCriteriaModal").modal("hide");
                            FetchData();
                            Toast(obj.status, obj.message);
                        } else {
                            Toast(obj.status, obj.message);
                        }
                    },
                    error: function (data) {
                        Toast('error', 'Something went wrong!');
                        console.log(data);
                    }
                });
            });

            // start event
            $("#start-event").on('click', function () {
                $.ajax({
                    url: "././backend/admin/start-event.php",
                    type: "POST",
                    data: {
                        event_id: $("#event-id").val(),
                    },
                    success: function (data) {
                        var obj = JSON.parse(data);

                        if(obj.status == 'success') {
                            // $("#stop-event").removeClass('d-none');
                            // $("#start-event").addClass('d-none');
                            Toast(obj.status, obj.message);
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        } else {
                            Toast(obj.status, obj.message);
                        }
                    },
                    error: function (data) {
                        Toast('error', 'Something went wrong!');
                        console.log(data);
                    }
                })
            });

            // stop event
            $("#stop-event").on('click', function () {
                $.ajax({
                    url: "././backend/admin/stop-event.php",
                    type: "POST",
                    data: {
                        event_id: $("#event-id").val(),
                    },
                    success: function (data) {
                        var obj = JSON.parse(data);

                        if(obj.status == 'success') {
                            // $("#start-event").removeClass('d-none');
                            // $("#stop-event").addClass('d-none');
                            Toast(obj.status, obj.message);
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        } else {
                            Toast(obj.status, obj.message);
                        }
                    },
                    error: function (data) {
                        Toast('error', 'Something went wrong!');
                        console.log(data);
                    }
                })
            });

            // control criteria visibility to judges
            $("#form-control-criteria").on('submit', function (e) {
                e.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "././backend/admin/control-criteria.php",
                    type: "POST",
                    data: form_data,
                    success: function (data) {
                        var obj = JSON.parse(data);

                        if(obj.status == 'success') {
                            CurrentShowedCriteria();
                            Toast(obj.status, obj.message);
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        } else {
                            Toast(obj.status, obj.message);
                        }
                    },
                    error: function (data) {
                        Toast('error', 'Something went wrong!');
                        console.log(data);
                    }
                })
            });

            $("#result-event").on('click', function () {
                window.location.href = "./index.php?page=result-export";
            });

            $("#resultTable").DataTable({
                paging: false,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                }
            });

            // $("#e-contestants-table").DataTable();
        });
    </script>

</body>

</html>