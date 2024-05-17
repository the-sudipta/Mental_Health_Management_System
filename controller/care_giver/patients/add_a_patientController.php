<?php

//include_once '../../Navigation_Links.php';
session_start();

global $routes;
require '../../../routes.php';
require '../../../utils/system_functions.php';

require_once __DIR__ . '/../../../model/userRepo.php';
require_once __DIR__ . '/../../../model/care_giverRepo.php';


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

$everythingOKCounter = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    echo "<br>Got Req<br>";

//    Name Validations
    $name = $_POST['name'];;
    if (empty($name)) {

        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br style='color: #dc3545'>Name Can not be Empty<br>";
    } else {
        echo "<br>Name = ".$name."<br>";
        $everythingOK = TRUE;
    }


//* Age Validation
    $age = $_POST['age'];
    if (empty($age)) {
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br style='color: #dc3545'>Age cannot be empty<br>";
    } elseif (!filter_var($age, FILTER_VALIDATE_INT)) {
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br style='color: #dc3545'>Age must be an integer only<br>";
    } else {
        echo "<br>Age = ".$age."<br>";
        $everythingOK = TRUE;
    }

//* Phone Validation
    $phone = $_POST['phone'];
    if (empty($phone)) {
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br style='color: #dc3545'>Phone cannot be empty<br>";
    } elseif (!ctype_digit($phone)) {
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br style='color: #dc3545'>Phone must be digits only<br>";
    } else {
        echo "<br>Phone = ".$phone."<br>";
        $everythingOK = TRUE;
    }



//     gender Validation
    $gender = $_POST['patient_gender'];
    if (empty($gender)) {
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br style='color: #dc3545'>Gender Can not be Empty<br>";
    }elseif ($gender === 'null'){
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br style='color: #dc3545'>Gender Can not be null. Select Gender<br>";
    } else {
        echo "<br>Gender = ".$gender."<br>";
        $everythingOK = TRUE;
    }

//    Diagnosis Validation
    $diagnosis = $_POST['diagnosis'];;
    if (empty($diagnosis)) {

        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br style='color: #dc3545'>Diagnosis Can not be Empty<br>";
    } else {
        echo "<br>Diagnosis = ".$diagnosis."<br>";
        $everythingOK = TRUE;
    }



//    Medication Validation
    $medication = $_POST['medication'];;
    if (empty($medication)) {

        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br style='color: #dc3545'>Medication Can not be Empty<br>";
    } else {
        echo "<br>Medication = ".$medication."<br>";
        $everythingOK = TRUE;
    }



    if ($everythingOK && $everythingOKCounter === 0) {

        echo "<br>all ok<br>";
        $user_id = 0;
//        $user_id = createUser($email, $password, "caregiver");
        echo '<br>Data id = '.$user_id.'<br>';
        $_SESSION["data"] = $user_id;
        $_SESSION["user_id"] = $user_id;

        echo "<br>Creating Care Giver Profile<br>";

        if($user_id > 0){
            $care_giver_id = createCare_giver($name, $gender, $phone, $user_id);

            if($care_giver_id > 0){
                echo '<br style="color: chartreuse">Redirecting to Patient Page<br>';
//                navigate($patient_page);
//                exit;

            }else{
                echo '<br style="color: #dc3545">Redirecting to Patient page BUT Patient Profile could not be created<br>';
//                navigate($patient_page);
//                exit;
            }

        }else{
            echo '<br style="color: #dc3545">Redirecting to Signup file because user Account not created<br>';
//            navigate($patient_page);
//            exit;
        }




    } else {

        echo 'Redirecting to Signup file because of data validation issue';
//        navigate($patient_page);
//        exit;
    }

}else{
    echo '<h1>SORRY! GOT GET REQUEST</h1>';
//    navigate($INDEX_page);
//    exit;
}