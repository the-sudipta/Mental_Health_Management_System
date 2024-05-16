<?php

// Define routes
$routes = [
    '/' => '/Mental_Health_Management_System/',
    'INDEX' => '/Mental_Health_Management_System/index.php',
    'login' => '/Mental_Health_Management_System/view/login.php',
    'care_giver_signup' => '/Mental_Health_Management_System/view/care_giver/signup.php',
    'care_giver_dashboard' => '/Mental_Health_Management_System/view/care_giver/dashboard.php',
];

$backend_routes = [
    'login_controller' => '/Mental_Health_Management_System/controller/loginController.php',
    'care_giver_signup_controller' => '/Mental_Health_Management_System/controller/care_giver/signupController.php',
    'logout_controller' => '/Mental_Health_Management_System/controller/logoutController.php',
];


$image_routes = [

    'user_icon' => '/Mental_Health_Management_System/img/user.png',
    'sign_in_icon' => '/Mental_Health_Management_System/img/signin-image.jpg',
    'sign_up_icon' => '/Mental_Health_Management_System/img/signup.png',
    'support_bg_icon' => '/Mental_Health_Management_System/img/supportbg.png',
];


$system_routes = [
    'bootstrap' => '/Mental_Health_Management_System/bootstrap.php',
    'error_404' => '/Mental_Health_Management_System/error/404.php',
    'error_500' => '/Mental_Health_Management_System/error/500.php',
];

?>
