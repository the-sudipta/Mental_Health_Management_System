<?php

require_once __DIR__ . '/../model/db_connect.php';


function findAllSymptomsTrackForAllPatients()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `symptom_track`';

    try {
        $result = $conn->query($selectQuery);

        // Check if the query was successful
        if (!$result) {
            throw new Exception("Query failed: " . $conn->error);
        }

        $rows = array();

        // Fetch rows one by one
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        // Check for an empty result set
        if (empty($rows)) {
            throw new Exception("No rows found in the 'symptom_track' table.");
        }

        return $rows;
    } catch (Exception $e) {
        echo 'symptom_trackRepo Error = ' . $e->getMessage();
        return null;
    } finally {
        // Close the database connection
        $conn->close();
    }
}

function findSymptomsTrackByID($id)
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `symptom_track` WHERE `id` = ?';

    try {
        $stmt = $conn->prepare($selectQuery);

        // Check if the prepare statement was successful
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }

        // Bind the parameter
        $stmt->bind_param("i", $id);

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Fetch the user as an associative array
        $user = $result->fetch_assoc();

        // Check for an empty result set
        if (!$user) {
            throw new Exception("No symptom_track found with ID: " . $id);
        }

        // Close the statement
        $stmt->close();

        return $user;
    } catch (Exception $e) {
        echo 'symptom_trackRepo Error = ' . $e->getMessage();
        return null;
    } finally {
        // Close the database connection
        $conn->close();
    }
}

function findAllSymptomsTrackByPatientID($id)
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `symptom_track` WHERE `patient_id` = '.$id;

    try {
        $result = $conn->query($selectQuery);

        // Check if the query was successful
        if (!$result) {
            throw new Exception("Query failed: " . $conn->error);
        }

        $rows = array();

        // Fetch rows one by one
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        // Check for an empty result set
        if (empty($rows)) {
            throw new Exception("No rows found in the 'symptom_track' table.");
        }

        return $rows;
    } catch (Exception $e) {
        echo 'symptom_trackRepo Error = '. $e->getMessage();

        return null;
    } finally {
        // Close the database connection
        $conn->close();
    }
}

function updateSymptomsTrack($symptoms, $date, $id)
{
    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "UPDATE `symptom_track` SET 
                    symptoms = ?,
                    date = ?
                    WHERE id = ?";


    try {
        // Prepare the statement
        $stmt = $conn->prepare($updateQuery);

        // Check if the prepare statement was successful
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param('ssi', $symptoms, $date, $id);

        // Execute the query
        $stmt->execute();

        // Return true if the update is successful
        return true;
    } catch (Exception $e) {
        // Handle the exception, you might want to log it or return false
        echo 'symptom_trackRepo Error = ' . $e->getMessage();
        return false;
    } finally {
        // Close the statement
        $stmt->close();

        // Close the database connection
        $conn->close();
    }
}

function deleteSymptom_track($id) {

    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "DELETE FROM `symptom_track` WHERE id = ?";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($updateQuery);

        // Check if the prepare statement was successful
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }

        // Bind parameter
        $stmt->bind_param('i', $id);

        // Execute the query
        $stmt->execute();

        // Return true if the update is successful
        return true;
    } catch (Exception $e) {
        // Handle the exception, you might want to log it or return false
        echo 'symptom_trackRepo Error = ' . $e->getMessage();

        return false;
    } finally {
        // Close the statement
        $stmt->close();

        // Close the database connection
        $conn->close();
    }
}

function deleteAllSymptomsTrackByPatientID($patient_id)
{
    $conn = db_conn();

    // Construct the SQL query
    $deleteQuery = "DELETE FROM `symptom_track` WHERE patient_id = ?";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($deleteQuery);

        // Check if the prepare statement was successful
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }

        // Bind parameter
        $stmt->bind_param('i', $patient_id);

        // Execute the query
        if (!$stmt->execute()) {
            throw new Exception("Execution failed: " . $stmt->error);
        }

        // Return true if the delete is successful
        return true;
    } catch (Exception $e) {
        // Handle the exception, you might want to log it or return false
        echo "Error deleting records: " . $e->getMessage();
        return false;
    } finally {
        // Close the statement
        if ($stmt) {
            $stmt->close();
        }

        // Close the database connection
        $conn->close();
    }
}



function createSymptom_track($symptoms, $date, $patient_id, $care_giver_id) {

    $conn = db_conn();


    // Construct the SQL query
    $insertQuery = "INSERT INTO `symptom_track` (symptoms, date, patient_id, care_giver_id) VALUES (?, ?, ?, ?)";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($insertQuery);

        // Check if the prepare statement was successful
        if (!$stmt) {
            throw new Exception("Prepare statement for CreateMedicalHistory failed: " . $conn->error);
        }


        // Bind parameters
        $stmt->bind_param('ssii', $symptoms, $date, $patient_id, $care_giver_id);

        // Execute the query
        $stmt->execute();

        // Return the ID of the newly inserted user
        $newUserId = $conn->insert_id;

        // Close the statement
        $stmt->close();

        return $newUserId;
    } catch (Exception $e) {
        echo 'progressRepo Error = '.$e->getMessage();
        header("Location: /error/database_error.php?error_message=".$e->getMessage());
        return -1;
    } finally {
        // Close the database connection
        $conn->close();
    }
}
