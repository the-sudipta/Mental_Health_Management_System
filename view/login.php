<?php

global $routes, $backend_routes;
//include_once '../Navigation_Links.php';
require '../routes.php';

//echo '<h1>'.login_page().'</h1>'

$loginController_file = $backend_routes['login_controller'];
$signup_decider = '';


?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="../css/main.css" rel="stylesheet">

    <script>
        // Function to validate email format
        function validateEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        // Function to show modal with validation message
        function showModal(message) {
            document.getElementById("validationMessage").innerHTML = message;
            document.getElementById("validationModal").style.display = "block";
        }

        close_modal = () => {
            document.getElementById("validationModal").style.display = "none";
            // location.reload(true);
        }



        function validateForm() {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            if (email === "" || email === null) {
                // emailErrorLabel.innerHTML = "Email is required.";
                showModal("Email is Required");
                return false;
            }

            if (password === "" || password === null) {
                // Display error message
                showModal("Password is Required");
                return false;
            }

            return true;
        }

        // Attach the validation function to the form's onsubmit event
        document.getElementById("form").onsubmit = function() {
            return validateForm();
        };

    </script>

</head>

<body>

    <div class="main pt-5 pb-5">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 offset-lg-2 offset-md-0">
                        <div class="signup-content box bg-white d-lg-flex justify-content-between p-5 border shadow-sm p-3 mb-5 bg-body rounded cust-box-shadow">
                            <div class="signin-image text-center w-100">
                                <figure><img src="../img/signin-image.jpg" class="img-fluid" alt="sign in image"></figure>
                            </div>

                            <div class="signin-form w-100">
                                <h2 class="form-title mb-3">Sign In</h2>
                                <form action="<?php echo $loginController_file; ?>" method="POST" class="register-form" id="form">
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" />
                                    </div>
                                    <div class="form-group form-button">
                                        <input type="submit" name="signin" id="signin" class="form-submit btn-primary btn mt-3 w-100" value="Sign In" />
                                        <a href="<?php echo $signup_decider; ?>" class="mt-3 d-block">Create an account</a>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

</body>

</html>
