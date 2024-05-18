<?php

//include_once '../../Navigation_Links.php';

global $routes;
require '../../routes.php';
require '../../utils/system_functions.php';
session_start();

require_once __DIR__ . '/../../model/userRepo.php';
require_once __DIR__ . '/../../model/care_giverRepo.php';


session_start();

$Login_page =  $routes['login'];
$signup_page =$routes['care_giver_signup'];
$INDEX_page = $routes['INDEX'];

//echo $_SERVER['REQUEST_METHOD'];
$everythingOKCounter = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    echo "<br>Got Req<br>";

//    Name Validations
    $name = $_POST['name'];;
    if (empty($name)) {

        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "Name error 1";
    } else {
        $everythingOK = TRUE;
    }


//* Email Validation
    $email = $_POST['email'];
    if (empty($email)) {

        $everythingOK = FALSE;
        $everythingOKCounter += 1;

        echo "Mail error 1";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "Mail error 2";
    } else {
        $everythingOK = TRUE;
    }

//* Password Validation
    $password = $_POST['password'];
    if (empty($password) || strlen($password) < 8) {
        // check if password size in 8 or more and  check if it is empty

        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "Pass error 1";
    } else {
        $everythingOK = TRUE;
    }

//    Phone Validation
    $phone = $_POST['phone'];
    if (empty($phone)) {
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "Phone error 1";
    }elseif (strlen($phone)  < 9){
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "Phone error 2";
    } else {
        $everythingOK = TRUE;
    }

//     gender Validation
    $gender = $_POST['gender'];
    if (empty($phone)) {
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "Gender error 1";
    }elseif ($gender === 'null'){
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "Gender error 2";
    } else {
        $everythingOK = TRUE;
    }



    if ($everythingOK && $everythingOKCounter === 0) {

        echo "<br>all ok<br>";
        $user_id = createUser($email, $password, "caregiver");
        echo '<br>Data id = '.$user_id.'<br>';
        $_SESSION["data"] = $user_id;
        $_SESSION["user_id"] = $user_id;

        echo "<br>Creating Care Giver Profile<br>";

        if($user_id > 0){
            $care_giver_id = createCare_giver($name, $gender, $phone, $user_id);

            if($care_giver_id > 0){
                echo 'Redirecting to Login file';
               navigate($Login_page);
               exit;

            }else{
                echo 'Redirecting to Signup file because Care Giver Profile not created';
               navigate($signup_page);
               exit;
            }

        }else{
            echo 'Redirecting to Signup file because user Account not created';
           navigate($signup_page);
           exit;
        }




    } else {

        echo 'Redirecting to Signup file because of data validation issue';
       navigate($signup_page);
       exit;
    }

}else{
    echo '<h1>SORRY! GOT GET REQUEST</h1>';
   navigate($INDEX_page);
   exit;
}