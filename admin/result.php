<?php
require('./autoload.php');

date_default_timezone_set('Asia/Manila');

$user = new User();

if(!$user->isLoggedIn() || Input::get('page') == 'logout'){$user->logout();header('Location: ./auth/login.php');}

$event_id = Input::get('event_id');

$event = new Event();

$e = $event->find($event_id);

$contestant = new Contestant();

$contestants = $contestant->findBy('event_id', $event_id);

$criteria = new Criteria();

$criterias = $criteria->findBy('event_id', $event_id);

$title = "Results"
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

        <section class="section dashboard">

        <h2 class=""><?=$e->event_name . ' - ' . $e->event_description;?></h2>

    <div class="table-responsive">

        <table class="table table-bordered table-hover" id="final-result-table" style="width: 100%;">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Baranggay</th>
                    <th>Name</th>
                    <?php foreach($criterias as $criteria): ?>
                    <th><?= $criteria->criteria_name;?></th>
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
                        <span class="badge bg-danger">-</span>
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

    </main>

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

    <script type="text/javascript">
        $(document).ready(function () {
            $("#final-result-table").DataTable({
                paging: false,
                dom: 'Bfrtip',
                // buttons: [
                //     'copy', 'csv', 'excel', 'pdf', 'print'
                // ],
                buttons: [
                    {
                        extend: 'print',
                        title: <?= json_encode([$e->event_name . ' - ' . $e->event_description . ' Results']); ?>,
                        text: 'Print',
                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        }
                    },
                    {
                        extend: 'excel',
                        title: 'Criteria Result',
                        text: 'Excel',
                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        }
                    }
                ]
            });
        });
    </script>

</body>

</html>