<?php

// Define routes
$routes = [
    '/' => '/Mental_Health_Management_System/',
    'INDEX' => '/Mental_Health_Management_System/index.php',
    'login' => '/Mental_Health_Management_System/view/login.php',
    'signup_decider' => '/Mental_Health_Management_System/view/signup_decider.php',

    'care_giver_signup' => '/Mental_Health_Management_System/view/care_giver/signup.php',
    'care_giver_dashboard' => '/Mental_Health_Management_System/view/care_giver/dashboard.php',
    'care_giver_emergency_support' => '/Mental_Health_Management_System/view/care_giver/emergency_support.php',
    'care_givers_patients' => '/Mental_Health_Management_System/view/care_giver/patients.php',
    'care_giver_progress_tracking' => '/Mental_Health_Management_System/view/care_giver/progress_tracking.php',
    'care_giver_symptoms_tracking_behaviour' => '/Mental_Health_Management_System/view/care_giver/symptoms_tracking_behaviour.php',
    'care_giver_schedule_page' => '/Mental_Health_Management_System/YOUR_PAGE_HERE',
    'care_giver_education_and_resource' => '/Mental_Health_Management_System/view/care_giver/education_resources.php',

];

$backend_routes = [
    'login_controller' => '/Mental_Health_Management_System/controller/loginController.php',
    'logout_controller' => '/Mental_Health_Management_System/controller/logoutController.php',
    'care_giver_signup_controller' => '/Mental_Health_Management_System/controller/care_giver/signupController.php',


    'care_giver_add_a_patient_controller' => '/Mental_Health_Management_System/controller/care_giver/patients/add_a_patientController.php',
    'care_giver_delete_patient_controller' => '/Mental_Health_Management_System/controller/care_giver/patients/delete_patientsController.php',
    'care_giver_edit_patient_controller' => '/Mental_Health_Management_System/controller/care_giver/patients/edit_patientController.php',

    'care_giver_add_a_schedule_controller' => '/Mental_Health_Management_System/controller/care_giver/patients/edit_patientController.php',
    'care_giver_delete_a_schedule_controller' => '/Mental_Health_Management_System/controller/care_giver/schedule/delete_scheduleController.php',

    'care_giver_add_progress_controller' => '/Mental_Health_Management_System/controller/care_giver/add_progressController.php',
    'care_giver_add_symptoms_tracking_controller' => '/Mental_Health_Management_System/controller/care_giver/add_symptoms_trackingController.php',

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
    'error_405' => '/Mental_Health_Management_System/error/405.php',
    'error_500' => '/Mental_Health_Management_System/error/500.php',
    'error_database' => '/Mental_Health_Management_System/error/database_error.php',
];

?>
