<?php

global $routes, $system_routes;
session_start();

require '../../../routes.php';
require '../../../utils/system_functions.php';


require_once __DIR__ . '/../../../model/patientRepo.php';

$patient_page = $routes['care_givers_patients'];


if (isset($_GET['delete_patient'])) {
    $patientId = $_GET['delete_patient'];
    $isDeleted = deletePatient($patientId); // Call the deletePatient function

    if ($isDeleted) {
        navigate($patient_page);
        exit;
    } else {
        echo '<br><p style="color: #dc3545">Redirecting to Patient Page BUT Patient ID not Found</p><br>';
        navigate($patient_page);
        exit;
    }
}