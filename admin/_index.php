<?php
require('./autoload.php');

date_default_timezone_set('Asia/Manila');

$page = (Input::get('page')) ? Input::get('page') : 'dashboard';

$title = ucwords(str_replace('_', ' ', $page));

$user = new User();

if(!$user->isLoggedIn() || Input::get('page') == 'logout'){$user->logout();header('Location: ./auth/login.php');}

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
    <link rel="stylesheet" href="../node_modules/toastr/build/toastr.min.css">
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body style="min-height: 75rem;
  padding-top: 4.5rem;">
    
    <?php

        if(file_exists('./pages/' . $page . '.php')){
            require('./pages/' . $page . '.php');
        }else{
            echo '<h1>404</h1>';
        }

    ?>

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../node_modules/toastr/build/toastr.min.js"></script>
    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

    <script src="./js/main.js"></script>
    <script src="./js/admin.js"></script>
</body>
</html>