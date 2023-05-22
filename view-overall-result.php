<?php
require('./autoload.php');

date_default_timezone_set('Asia/Manila');

$event = new Event();

$event_id = Input::get('event_id');

$e = $event->find($event_id);

if(!$e || $event_id == null){header('Location: ./');}

$title = ucwords(str_replace('_', ' ', $e->event_name));

// $user = new User();

// if(!$user->isLoggedIn() || Input::get('page') == 'logout'){$user->logout();header('Location: ./auth/login.php');}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title; ?> | Live Result
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

    <header id="header" class="header fixed-top d-flex align-items-center justify-content-center flex-column bg-white py-3">

        <h1 class='text-center text-uppercase'><?= $e->event_name; ?></h1>
        <h3 class='text-center text-uppercase'>Overall Result - <?= $e->event_description; ?></h3>

    </header>

    <main class="main" style="margin-top: 100px;">

        <div class="container-fluid">
            <div class="card my-5">
                <div class="card-body">
                    <div id="e-overall-results-table"></div>
                </div>
            </div>
        </div>

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
        var event_id = <?= $event_id; ?>;
        
        function ViewOverallResult() {

            $.ajax({
                url: "./backend/admin/view-overall-result.php",
                type: "POST",
                data: {
                    event_id: event_id
                },
                success: function (data) {
                    data = JSON.parse(data);

                    if(data.status == 'success'){
                        $("#e-overall-results-table").html(data.html_table);
                    }else{
                        $("#e-overall-results-table").html(data.message);
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

        $(document).ready(function () {

            $("#e-overall-results-table").html(
                '<div class="mt-5 d-flex justify-content-center align-items-center h-100"><div class="spinner-border text-primary mb-5" role="status"><span class="visually-hidden">Loading...</span></div></div>' + '<p class="text-center">Tallying Overall Result...</p>' + '<p class="text-center">Please wait...</p>');
            
            ViewOverallResult();

            setInterval(function () {
                ViewOverallResult();
            }, 1000);
        });
    </script>

</body>

</html>