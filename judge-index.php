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
                                <span class="criteria-percentage"></span>
                            </h3>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive" id="judge-contestants-table">
                                <table class="table table-hover table-bordered align-middle" id="j-contestants-table"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Number</th>
                                            <th scope="col" class="text-center">Description</th>
                                            <th scope="col" class="text-center">Contingent</th>
                                            <th scope="col" class="text-center">Score (1 - <span class="criteria-percentage"></span>)</th>
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
                    <!-- <h5 class="modal-title"><strong>Scores Submitted Successfully</strong></h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto text-center">
                    <h1 class="modal-title text-center">
                        Scores Submitted Successfully
                    </h1>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">OK</button>
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
    <script src="./js/judge.js"></script>

</body>

</html>