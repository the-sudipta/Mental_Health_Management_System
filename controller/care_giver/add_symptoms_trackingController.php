<?php

//include_once '../../Navigation_Links.php';
global $routes, $system_routes;
session_start();

require '../../routes.php';
require '../../utils/system_functions.php';


require_once __DIR__ . '/../../model/symptom_trackRepo.php';

/**
 * Needed Parameters
 * 1. symptoms
 * 2. date
 * 3. care_giver_id
 * 4. patient_id
 */


$Login_page =  $routes['login'];
$patient_symptoms_page =$routes['care_giver_symptoms_tracking_behaviour'];
$INDEX_page = $routes['INDEX'];
$error_405 = $system_routes['error_405'];

$everythingOKCounter = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    echo "<br>Got Req<br>";



//    Patient ID Validations
    $patient_id = $_POST['selected_patient_id'];

    if ($patient_id < 0 && $patient_id === null) {

        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br><p style='color: #dc3545'>A Patient must be selected</p><br>";
    } else {
        echo "<br>Patient ID = ".$patient_id."<br>";
        $everythingOK = TRUE;
    }


    $date =  $_POST['date'];
    echo "<br> Date = ".$date."<br>";


//    Get Symptoms
    $selected_symptoms = $_POST['symptoms_data'];
    echo "<br> Selected Symptoms = ".$selected_symptoms."<br>";



    if ($everythingOK && $everythingOKCounter === 0) {

        echo "<br>all ok<br>";
        $care_giver_id = $_SESSION['user_id'];
//        $user_id = createUser($email, $password, "caregiver");
        echo '<br>Care giver ID = '.$care_giver_id.'<br>';

        echo "<br>Creating Patient Profile<br>";

        if($care_giver_id > 0){

            $inserted_id = 0;
            $inserted_id = createSymptom_track($selected_symptoms, $date, $patient_id, $care_giver_id);

            if($inserted_id > 0){
                echo '<br><p style="color: darkgreen">Redirecting to Symptoms Tracking Page</p><br>';
                navigate($patient_symptoms_page);
                exit;
            }else{
                echo '<br> <p style="color: #dc3545">Redirecting to Symptoms tracking page BUT Symptoms Could not be added</p><br>';
                navigate($patient_symptoms_page);
                exit;
            }
        }else{
            echo '<br><p style="color: #dc3545">Redirecting to Login Page Because Care Giver ID not Found</p><br>';
            navigate($Login_page);
            exit;
        }
    } else {

        echo '<br><p style="color: #dc3545">Redirecting to Symptoms tracking Page BUT there is data validation issue</p><br>';
        navigate($patient_symptoms_page);
        exit;
    }
}else{
    http_response_code(405);

    echo '<h1 style="color: #ff8839">SORRY! GOT GET REQUEST</h1>';
    navigate($error_405);
    exit;
}