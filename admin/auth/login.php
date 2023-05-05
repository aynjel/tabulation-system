<?php
require('./../autoload.php');

date_default_timezone_set('Asia/Manila');

$user = new User();

if($user->isLoggedIn()){header('Location: ./index.php');}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Admin Login
    </title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../node_modules/toastr/build/toastr.min.css">
    <link rel="stylesheet" href="../../node_modules/sweetalert2/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="./login.css">
</head>

<body class="text-center">

    <main style="height: 100vh; display: flex; align-items: center; justify-content: center;">
        <div class="card shadow rounded" style="max-width: 400px; width: 100%;">
            <div class="card-body">
                <form id="login-form" class="form-signin" method="POST">
                    <h1 class="h3 mb-3 fw-normal">
                        Admin Login
                    </h1>

                    <div class="alert alert-danger d-none" id="login-alert" role="alert">
                        <ul id="login-alert-list"></ul>
                    </div>

                    <div class="form-floating mb-1">
                        <input type="text" class="form-control" id="login-username" name="username"
                            placeholder="Username" autofocus>
                        <label for="login-username">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="login-password" name="password"
                            placeholder="Password">
                        <label for="login-password">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit" id="login-btn">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </main>

    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../node_modules/toastr/build/toastr.min.js"></script>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

    <script src="./../js/admin.js"></script>
</body>

</html>