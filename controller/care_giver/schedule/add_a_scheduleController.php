<?php

//include_once '../../Navigation_Links.php';
global $routes, $system_routes;
session_start();

require '../../../routes.php';
require '../../../utils/system_functions.php';


require_once __DIR__ . '/../../../model/scheduleRepo.php';

/**
 * Needed Parameters
 * 1. selected_patient_id
 * 2. purpose
 * 3. type
 * 4. time_from
 * 5. time_to
 * 6. date
 * 7. status => set by default => pending
 */


$Login_page =  $routes['login'];
$schedule_page =$routes['care_giver_schedule_page'];
$INDEX_page = $routes['INDEX'];
$error_405 = $system_routes['error_405'];

$everythingOKCounter = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    echo "<br>Got Req<br>";

//    Purpose Validations
    $purpose = $_POST['purpose'];
    if (empty($purpose)) {

        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br><p style='color: #dc3545'>Purpose Can not be Empty</p><br>";
    } else {
        echo "<br>Purpose = ".$purpose."<br>";
        $everythingOK = TRUE;
    }


//* Type Validation
    $type = $_POST['type'];
    if (empty($type)) {
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br><p style='color: #dc3545'>Type cannot be empty</p><br>";
    } else {
        echo "<br>Age = ".$type."<br>";
        $everythingOK = TRUE;
    }

//    Starting Time validation
    $time_from = $_POST['time_from'];
    if (empty($time_from)) {

        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br><p style='color: #dc3545'>Starting Time Can not be Empty</p><br>";
    } else {
        echo "<br>Purpose = ".$time_from."<br>";
        $everythingOK = TRUE;
    }

    //    Ending Time validation
    $time_to = $_POST['time_to'];
    if (empty($time_to)) {

        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br><p style='color: #dc3545'>Ending Time Can not be Empty</p><br>";
    } else {
        echo "<br>Purpose = ".$time_to."<br>";
        $everythingOK = TRUE;
    }

    //    Date validation
    $date = $_POST['schedule_date'];
    if (empty($date)) {

        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "<br><p style='color: #dc3545'>Date Can not be Empty</p><br>";
    } else {
        echo "<br>Purpose = ".$date."<br>";
        $everythingOK = TRUE;
    }

    $selected_patient_id = $_POST['selected_patient_id'];
    echo "<br>Selected Patient = ".$selected_patient_id."<br>"
    ;
    $status = "Pending";
    echo "<br>Selected Patient = ".$status."<br>";



    if ($everythingOK && $everythingOKCounter === 0) {

        echo "<br>all ok<br>";

        $care_giver_id = $_SESSION['user_id'];
        echo '<br>Care giver ID = '.$care_giver_id.'<br>';

        echo "<br>Creating Schedule<br>";

        if($care_giver_id > 0){

            $patient_id = createSchedule($purpose, $type, $time_from, $time_to, $date, $status, $selected_patient_id );

            if($patient_id > 0){
                echo '<br><p style="color: chartreuse">Redirecting to Patient Page</p><br>';
                navigate($schedule_page);
                exit;
            }else{
                echo '<br> <p style="color: #dc3545">Redirecting to Patient page BUT Patient Profile could not be created</p><br>';
                navigate($schedule_page);
                exit;
            }
        }else{
            echo '<br><p style="color: #dc3545">Redirecting to Login Page Because Care Giver ID not Found</p><br>';
            navigate($Login_page);
            exit;
        }
    } else {

        echo '<br><p style="color: #dc3545">Redirecting to Patient Page BUT there is data validation issue</p><br>';
        navigate($schedule_page);
        exit;
    }
}else{
    http_response_code(405);
    navigate($schedule_page);

    echo '<h1 style="color: #ff8839">SORRY! GOT GET REQUEST</h1>';
    navigate($error_405);
    exit;
}