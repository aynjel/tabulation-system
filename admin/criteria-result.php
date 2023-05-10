<?php
require('./autoload.php');

date_default_timezone_set('Asia/Manila');

$user = new User();

if(!$user->isLoggedIn() || Input::get('page') == 'logout'){$user->logout();header('Location: ./auth/login.php');}

$event = new Event();

$events = $event->all();

$criteria_id = Input::get('criteria_id');

$criteria = new Criteria();

$cri = $criteria->find($criteria_id);

$contestant = new Contestant();

$contestants = $contestant->findBy('event_id', $cri->event_id);

$event = new Event();

$e = $event->find($cri->event_id);

$judge = new Judge();

$judges = $judge->findBy('event_id', $cri->event_id);

$title = $e->event_name . ' | ' . $cri->criteria_name;
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
            <a href="index.html" class="logo d-flex align-items-center">
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
            <div class="table-responsive">

                <h1 class="text-center text-uppercase"><?= $e->event_name; ?></h1>
                <h3 class="text-center text-uppercase"><?= $e->event_description; ?></h3>
                <h4 class="text-center text-uppercase"><?= $cri->criteria_name; ?></h4>

                <table class="table table-bordered table-hover text-center" id="criteria-result-table"
                    style="width: 100%;">
                    <thead>

                        <tr>
                            <th>No.</th>
                            <th>Baranggay</th>
                            <th>Name</th>

                            <?php foreach($judges as $judge): ?>
                            <th><?= $judge->judge_name; ?></th>
                            <?php endforeach; ?>

                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($contestants as $key => $con): ?>
                        <tr>
                            <td><?= $con->contestant_number; ?></td>
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
            $("#criteria-result-table").DataTable({
                paging: false,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'print',
                        title: <?= json_encode($e-> event_name.
                            ' - '.$cri-> criteria_name); ?>,
                        text : 'Print',
                        exportOptions: {
                            modifier: {
                                page: 'current',
                            }
                        },
                    },
                    {
                        extend: 'excel',
                        title: <?= json_encode($e-> event_name.
                            ' - '.$cri-> criteria_name); ?>,
                        text : 'Excel',
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