<?php


session_start();
global $routes, $backend_routes, $image_routes;
//include_once '../Navigation_Links.php';
require 'patientRepo.php';
$care_giver_id = $_SESSION['user_id'];
$patientId = $_GET['id'];
// Get caregiver ID from current user (replace with your logic)

$patients = findAllPatientsByCareGiverID($care_giver_id); // Call the function

if (isset($patients) && !empty($patients)) {
    foreach ($patients as $patient) {
        if ($patient['id'] == $patientId) {
            echo json_encode($patient); // Encode data as JSON
            exit(); // Stop script after finding the specific patient
        }
    }
} 

echo json_encode(['error' => 'Patient not found']);


?>