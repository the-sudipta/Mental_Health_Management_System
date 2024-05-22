<?php

//include_once '../Navigation_Links.php';
require_once __DIR__ . '/../model/UserRepo.php';
global $routes, $system_routes, $error_page;
require '../routes.php';
require '../utils/system_functions.php';

$error_page = $system_routes['error_500'];
$error_message = '';


session_start();


$Login_page = $routes['login'];
$care_giver_Dashboard_page = $routes['care_giver_dashboard'];

//echo $_SERVER['REQUEST_METHOD'];
$everythingOKCounter = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    echo "<br>Got Req</br>";

//* Email Validation
    $email = $_POST['email'];
    if (empty($email)) {

        $everythingOK = FALSE;
        $everythingOKCounter += 1;

        echo '<br>Mail Error 1<br>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo '<br>Mail Error 2<br>';
    } else {
        $everythingOK = TRUE;
    }

//* Password Validation
    $password = $_POST['password'];
    if (empty($password) || strlen($password) < 8) {
        // check if password size in 8 or more and  check if it is empty

        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo '<br>Pass error 1<br>';
    } else {
        $everythingOK = TRUE;
    }

    if ($everythingOK && $everythingOKCounter === 0) {
        $data = findUserByEmailAndPassword($email, $password);

//        echo '<br><br>';
        echo '<br>Everything is ok<br>';
        echo '<br>ID found = '.isset($data["id"]).' <br>';
        if ($data && isset($data["id"])) {
            $_SESSION["data"] = $data;
            $_SESSION["role"] = $data['role'];
            $_SESSION["user_id"] = $data["id"];

            if ($data['role'] === 'caregiver') {
                echo '<br>Heading to CareGiver Dashboard<br>';
                header("Location: {$care_giver_Dashboard_page}");
                exit;
            } else {
                header("Location: {$Login_page}");
                exit;
            }
        } else {
            echo '<br>Returning to Login page because ID Password did not matched<br>';
            header("Location: {$Login_page}");
            exit;

        }
    } else {
        echo '<br>Returning to Login page because The data user provided is not properly validated like 
                in password: 1-upper_case, 1-lower_case, 1-number, 1-special_character and at least 8 character long it must be provided <br>';
        header("Location: {$Login_page}");
        exit;

    }






}


