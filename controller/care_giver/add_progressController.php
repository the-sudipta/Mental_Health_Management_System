<?php

//include_once '../../Navigation_Links.php';
global $routes, $system_routes;
session_start();

require '../../routes.php';
require '../../utils/system_functions.php';


require_once __DIR__ . '/../../model/progressRepo.php';

/**
 * Needed Parameters
 * 1. mood
 * 2. medicine
 * 3. therapy_name
 * 4. patient_id
 * 5. date
 */


$Login_page =  $routes['login'];
$patient_progress_page =$routes['care_giver_progress_tracking'];
$INDEX_page = $routes['INDEX'];
$error_405 = $system_routes['error_405'];

$everythingOKCounter = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    echo "<br>Got Req<br>";


    $patient_id = $_POST['patient_id'];

//    Medicine Validations
    $medicine = $_POST['medication_adherence'];
    if (empty($medicine) || $medicine === null || $medicine === 'null') {

        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br><p style='color: #dc3545'>Medication Adherence must be selected</p><br>";
    } else {
        echo "<br>Name = ".$medicine."<br>";
        $everythingOK = TRUE;
    }


//* Mood Validation
    $mood = $_POST['patient_mood'];
    if (empty($mood) || $mood === null || $mood === 'null') {
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br><p style='color: #dc3545'>Mood Must be Selected</p><br>";
    } else {
        echo "<br>Age = ".$mood."<br>";
        $everythingOK = TRUE;
    }

//* Therapy Validation
    $therapy = $_POST['therapy'];
    if (empty($therapy)) {
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br><p style='color: #dc3545'>Therapy Session Attended cannot be empty</p><br>";
    }  elseif (!filter_var($therapy, FILTER_VALIDATE_INT)) {
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br><p style='color: #dc3545'>Number of Therapy attended must be in integer only</p><br>";
    }else {
        echo "<br>Phone = ".$therapy."<br>";
        $everythingOK = TRUE;
    }

//    Date Validation
    $date =  $_POST['date'];






    if ($everythingOK && $everythingOKCounter === 0) {

        echo "<br>all ok<br>";
        $care_giver_id = $_SESSION['user_id'];
//        $user_id = createUser($email, $password, "caregiver");
        echo '<br>Care giver ID = '.$care_giver_id.'<br>';

        echo "<br>Creating Patient Profile<br>";

        if($care_giver_id > 0){

            $progress_id = createProgress($mood, $medicine, $therapy, $patient_id, $date);

            echo "<br>Progress ID".$progress_id."<br>";
            if($progress_id > 0){
                echo '<br><p style="color: darkgreen">Redirecting to Patient Page</p><br>';
                navigate($patient_progress_page);
                exit;
            }else{
                echo '<br> <p style="color: #dc3545">Redirecting to Progress tracking page BUT Patient Profile could not be created</p><br>';
                navigate($patient_progress_page);
                exit;
            }
        }else{
            echo '<br><p style="color: #dc3545">Redirecting to Login Page Because Care Giver ID not Found</p><br>';
            navigate($Login_page);
            exit;
        }
    } else {

        echo '<br><p style="color: #dc3545">Redirecting to Progress tracking Page BUT there is data validation issue</p><br>';
        navigate($patient_progress_page);
        exit;
    }
}else{
    http_response_code(405);

    echo '<h1 style="color: #ff8839">SORRY! GOT GET REQUEST</h1>';
    navigate($error_405);
    exit;
}