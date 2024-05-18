<?php

global $routes, $system_routes;
session_start();

require '../../../routes.php';
require '../../../utils/system_functions.php';


require_once __DIR__ . '/../../../model/patientRepo.php';
require_once __DIR__ . '/../../../model/scheduleRepo.php';
require_once __DIR__ . '/../../../model/progressRepo.php';
require_once __DIR__ . '/../../../model/symptom_trackRepo.php';

$patient_page = $routes['care_givers_patients'];


if (isset($_GET['delete_patient'])) {
    $patientId = $_GET['delete_patient'];
    $isDeleted = deletePatient($patientId); // Call the deletePatient function

    if ($isDeleted) {

//        Delete All Schedules by Patient ID
        $delete_schedule_status = deleteAllSchedulesByPatientID($patientId);
        if($delete_schedule_status){
//        Delete All Progress by Patient ID
            $delete_progress_status = deleteAllProgressesByPatientID($patientId);

            if($delete_progress_status){
//        Delete All Symptoms by Patient ID
                $delete_symptoms_status = deleteAllSymptomsTrackByPatientID($patientId);
                navigate($patient_page);
                exit;

            }else{
                echo '<br><p style="color: #dc3545">Redirecting to Patient Page BUT Patient Progress Could not be deleted</p><br>';
                navigate($patient_page);
                exit;
            }
        }else{
            echo '<br><p style="color: #dc3545">Redirecting to Patient Page BUT Patient Schedules Could not be deleted</p><br>';
            navigate($patient_page);
            exit;
        }



    } else {
        echo '<br><p style="color: #dc3545">Redirecting to Patient Page BUT Patient ID not Found so patient Could not be deleted</p><br>';
        navigate($patient_page);
        exit;
    }
}