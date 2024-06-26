<?php

//include_once '../../Navigation_Links.php';
global $routes, $system_routes;
session_start();

require '../../../routes.php';
require '../../../utils/system_functions.php';


require_once __DIR__ . '/../../../model/patientRepo.php';

/**
 * Needed Parameters
 * 1. name
 * 2. age
 * 3. diagnosis
 * 4. medication
 * 5. gender
 * 6. phone
 */


$Login_page =  $routes['login'];
$patient_page =$routes['care_givers_patients'];
$INDEX_page = $routes['INDEX'];
$error_405 = $system_routes['error_405'];

$everythingOKCounter = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    echo "<br>Got Req<br>";

//    Name Validations
    $name = $_POST['name'];;
    if (empty($name)) {

        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br><p style='color: #dc3545'>Name Can not be Empty</p><br>";
    } else {
        echo "<br>Name = ".$name."<br>";
        $everythingOK = TRUE;
    }


//* Age Validation
    $age = $_POST['age'];
    if (empty($age)) {
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br><p style='color: #dc3545'>Age cannot be empty</p><br>";
    } elseif (!filter_var($age, FILTER_VALIDATE_INT)) {
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br><p style='color: #dc3545'>Age must be an integer only</p><br>";
    } else {
        echo "<br>Age = ".$age."<br>";
        $everythingOK = TRUE;
    }

//* Phone Validation
    $phone = $_POST['phone'];
    if (empty($phone)) {
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br><p style='color: #dc3545'>Phone cannot be empty</p><br>";
    } elseif (!ctype_digit($phone)) {
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br><p style='color: #dc3545'>Phone must be digits only</p><br>";
    } else {
        echo "<br>Phone = ".$phone."<br>";
        $everythingOK = TRUE;
    }



//     gender Validation
    $gender = $_POST['patient_gender'];
    if (empty($gender)) {
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br><p style='color: #dc3545'>Gender Can not be Empty</p><br>";
    }elseif ($gender === 'null'){
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br><p style='color: #dc3545'>Gender Can not be null. Select Gender</p><br>";
    } else {
        echo "<br>Gender = ".$gender."<br>";
        $everythingOK = TRUE;
    }

//    Diagnosis Validation
    $diagnosis = $_POST['diagnosis'];;
    if (empty($diagnosis)) {

        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br><p style='color: #dc3545'>Diagnosis Can not be Empty</p><br>";
    } else {
        echo "<br>Diagnosis = ".$diagnosis."<br>";
        $everythingOK = TRUE;
    }



//    Medication Validation
    $medication = $_POST['medication'];;
    if (empty($medication)) {

        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br><p style='color: #dc3545'>Medication Can not be Empty</p><br>";
    } else {
        echo "<br>Medication = ".$medication."<br>";
        $everythingOK = TRUE;
    }



    if ($everythingOK && $everythingOKCounter === 0) {

        echo "<br>all ok<br>";
        $care_giver_id = $_SESSION['user_id'];
//        $user_id = createUser($email, $password, "caregiver");
        echo '<br>Care giver ID = '.$care_giver_id.'<br>';

        echo "<br>Creating Patient Profile<br>";

        if($care_giver_id > 0){
            $date = date('Y-m-d');
            $patient_id = createPatient($name, $age, $phone, $gender, $care_giver_id, $medication, $diagnosis, $date);

            if($patient_id > 0){
                echo '<br><p style="color: chartreuse">Redirecting to Patient Page</p><br>';
                navigate($patient_page);
                exit;
            }else{
                echo '<br> <p style="color: #dc3545">Redirecting to Patient page BUT Patient Profile could not be created</p><br>';
                navigate($patient_page);
                exit;
            }
        }else{
            echo '<br><p style="color: #dc3545">Redirecting to Login Page Because Care Giver ID not Found</p><br>';
            navigate($Login_page);
            exit;
        }
    } else {

        echo '<br><p style="color: #dc3545">Redirecting to Patient Page BUT there is data validation issue</p><br>';
        navigate($patient_page);
        exit;
    }
}else{
    http_response_code(405);
    navigate($patient_page);

    echo '<h1 style="color: #ff8839">SORRY! GOT GET REQUEST</h1>';
    navigate($error_405);
    exit;
}