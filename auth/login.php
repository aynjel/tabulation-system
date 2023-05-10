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
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/toastr/build/toastr.min.css">
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">

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

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/toastr/build/toastr.min.js"></script>
    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

    <script>
        function Login() {
            $("#login-form").on("submit", function (e) {
                e.preventDefault();

                var username = $("#login-username").val();
                var password = $("#login-password").val();

                // check if username and password is empty
                if (username == "" || password == "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Failed',
                        text: 'Username or Password is empty',
                    });
                    return;
                }

                // if(username == "admin" && password == "admin"){
                //     Swal.fire({
                //         icon: 'success',
                //         title: 'Login Success',
                //         text: 'You will be redirected to the dashboard',
                //     });
                //     // location.href = "../index.php";
                //     return;
                // }

                $.ajax({
                    url: "./../backend/admin/login-handler.php",
                    type: this.method,
                    data: {
                        username: username,
                        password: password
                    },
                    success: function (data) {
                        data = JSON.parse(data);
                        if (data.status == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Login Success',
                                text: data.message +
                                    " You will be redirected to the dashboard",
                                timer: 3000,
                                timerProgressBar: true,
                                onBeforeOpen: () => {
                                    Swal.showLoading()
                                },
                                showConfirmButton: false,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                allowEnterKey: false,
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    location.href = "./../index.php";
                                }
                            });
                        }

                        if (data.status == "error") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Login Failed',
                                text: data.message,
                            });
                        }

                    },
                    error: function (data) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Failed',
                            text: 'Username or Password is incorrect',
                        });
                    }
                });
            });
        }

        $(document).ready(function () {
            Login();
        });
    </script>
</body>

</html>