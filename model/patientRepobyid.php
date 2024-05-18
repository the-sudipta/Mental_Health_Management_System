<?php

require_once __DIR__ . '/../model/db_connect.php';

// Function to fetch patient data by ID using a direct query
function getPatientData($patientId) {
    $conn = db_conn();
    $patientId = intval($patientId); // Sanitize the input to prevent SQL injection
    $sql = "SELECT name, age, diagnosis, medication, gender, phone FROM patient WHERE id = $patientId";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        $data = ['error' => 'No patient found with the given ID'];
    }

    $conn->close();
    return $data;
}

// Main script execution
header('Content-Type: application/json');

if (isset($_GET['id'])) {
    $patientId = intval($_GET['id']); // Convert to integer to avoid SQL injection
    $data = getPatientData($patientId);
    echo json_encode($data);
} else {
    echo json_encode(['error' => 'No ID provided']);
}
?>
