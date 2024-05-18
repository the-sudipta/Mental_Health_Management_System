<?php

global $routes, $backend_routes, $image_routes;
//include_once '../Navigation_Links.php';
require '../../routes.php';

$login_page = $routes['login'];



$signupController_file = $backend_routes['care_giver_signup_controller'];
$signup_decider = '';


$signup_icon = $image_routes['sign_up_icon'];




?>







<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="../css/main.css" rel="stylesheet">

</head>

<body>

<div class="main pt-5 pb-5">

    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 offset-lg-2 offset-md-0">
                    <div class="signup-content box bg-white d-lg-flex justify-content-between align-items-center p-5 border shadow-sm p-3 mb-5 bg-body rounded cust-box-shadow">
                        <div class="signup-form w-100 mb-2">
                            <h2 class="form-title mb-3">Sign up</h2>
                            <form action="<?php echo $signupController_file ;?>" method="POST" class="register-form" id="register-form">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control" id="name" />
                                    <div class="error-message text-danger" id="name-error"></div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" />
                                    <div class="error-message text-danger" id="email-error"></div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="number" name="phone" class="form-control" id="phone" />
                                    <div class="error-message text-danger" id="phone-error"></div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" name="gender" id="gender" aria-label="Default select example">
                                        <option selected value="null">Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <div class="error-message text-danger" id="gender-error"></div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" />
                                    <div class="error-message text-danger" id="password-error"></div>
                                </div>
                                <div class="form-group form-button">
                                    <input type="submit" name="signup" id="signup" class="form-submit btn btn-primary mt-3 w-100" value="Register" />
                                    <a href="<?php echo $login_page; ?>" class="mt-3 d-block">Already a member? Sign in</a>
                                </div>
                            </form>



                        </div>
                        <div class="signup-image text-center w-100">
                            <figure><img src="<?php echo $signup_icon; ?>" class="img-fluid" alt="sing up image"></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
<script src="../../js/jquery-3.7.1.min.js"></script>

<script>
    $(document).ready(function() {
        $("#register-form").submit(function(event) {
            event.preventDefault();
            validateForm();
        });

        function validateForm() {
            $(".error-message").text("");
            let hasError = false;

            const name = $("#name").val().trim();
            const email = $("#email").val().trim();
            const phone = $("#phone").val().trim();
            const gender = $("#gender").val().trim();
            const password = $("#password").val().trim();

            if (name === "") {
                $("#name-error").text("Please enter your full name.").addClass("d-block");
                hasError = true;
            }

            if (email === "") {
                $("#email-error").text("Please enter your email address.").addClass("d-block");
                hasError = true;
            } else {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    $("#email-error").text("Please enter a valid email address.").addClass("d-block");
                    hasError = true;
                }
            }

            if (phone === "") {
                $("#phone-error").text("Please enter your phone number.").addClass("d-block");
                hasError = true;
            } else {
                const phoneRegex = /^\d{11}$/;
                if (!phoneRegex.test(phone)) {
                    $("#phone-error").text("Please enter a valid 11-digit phone number.").addClass("d-block");
                    hasError = true;
                }
            }

            if (gender === "null") {
                $("#gender-error").text("Please select your gender.").addClass("d-block");
                hasError = true;
            }

            if (password === "") {
                $("#password-error").text("Please enter your password.").addClass("d-block");
                hasError = true;
            } else {
                const passwordStrength = checkPasswordStrength(password);
                if (passwordStrength !== "Strong") {
                    $("#password-error").text(passwordStrength).addClass("d-block");
                    hasError = true;
                }
            }

            if (!hasError) {
                $("#register-form").unbind('submit').submit();
            }
        }

        function checkPasswordStrength(password) {
            if (password.length < 8) {
                return "Password should be at least 8 characters long.";
            }

            const uppercaseRegex = /[A-Z]/;
            const lowercaseRegex = /[a-z]/;
            const digitRegex = /\d/;

            if (!uppercaseRegex.test(password) || !lowercaseRegex.test(password) || !digitRegex.test(password)) {
                return "Password should contain at least one uppercase letter, one lowercase letter, and one digit.";
            }

            // Strong password
            return "Strong";
        }
    });

</script>
</body>

</html>
