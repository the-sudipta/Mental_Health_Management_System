<?php

// Define routes
$routes = [
    '/' => '/',
    'INDEX' => '/index.php',
    'login' => '/view/login.php',
    'signup_decider' => '/view/signup_decider.php',

    'care_giver_signup' => '/view/care_giver/signup.php',
    'care_giver_dashboard' => '/view/care_giver/dashboard.php',
    'care_giver_emergency_support' => '/view/care_giver/emergency_support.php',
    'care_givers_patients' => '/view/care_giver/patients.php',
    'care_giver_progress_tracking' => '/view/care_giver/progress_tracking.php',
    'care_giver_symptoms_tracking_behaviour' => '/view/care_giver/symptoms_tracking_behaviour.php',
    'care_giver_schedule_page' => '/view/care_giver/schedule.php',
    'care_giver_education_and_resource' => '/view/care_giver/education_resources.php',

];

$backend_routes = [
    'login_controller' => '/controller/loginController.php',
    'logout_controller' => '/controller/logoutController.php',
    'care_giver_signup_controller' => '/controller/care_giver/signupController.php',


    'care_giver_add_a_patient_controller' => '/controller/care_giver/patients/add_a_patientController.php',
    'care_giver_delete_patient_controller' => '/controller/care_giver/patients/delete_patientsController.php',
    'care_giver_edit_patient_controller' => '/controller/care_giver/patients/edit_patientController.php',

    'care_giver_add_a_schedule_controller' => '/controller/care_giver/schedule/add_a_scheduleController.php',
    'care_giver_delete_a_schedule_controller' => '/controller/care_giver/schedule/delete_scheduleController.php',

    'care_giver_add_progress_controller' => '/controller/care_giver/add_progressController.php',
    'care_giver_add_symptoms_tracking_controller' => '/controller/care_giver/add_symptoms_trackingController.php',

];


$image_routes = [

    'user_icon' => '/img/user.png',
    'sign_in_icon' => '/img/signin-image.jpg',
    'sign_up_icon' => '/img/signup.png',
    'support_bg_icon' => '/img/supportbg.png',
];


$system_routes = [
    'bootstrap' => '/bootstrap.php',
    'error_404' => '/error/404.php',
    'error_405' => '/error/405.php',
    'error_500' => '/error/500.php',
    'error_database' => '/error/database_error.php',
];

?>
