$(document).ready(function () {
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

            $.ajax({
                url: "./../../backend/judge/login-handler.php",
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
                            text: data.message + " You will be redirected to the dashboard",
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
});