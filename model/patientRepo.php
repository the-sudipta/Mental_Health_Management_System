<?php

require_once __DIR__ . '/../model/db_connect.php';

function findAllPatients()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `patient`';

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
            throw new Exception("No rows found in the 'patient' table.");
        }

        return $rows;
    } catch (Exception $e) {
        echo "patientRepo Error = " . $e->getMessage();
        return null;
    } finally {
        // Close the database connection
        $conn->close();
    }
}


function findPatientByID($id)
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `patient` WHERE `id` = ?';

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
            throw new Exception("No patient found with ID: " . $id);
        }

        // Close the statement
        $stmt->close();

        return $user;
    } catch (Exception $e) {
        echo 'patientRepo Error = ' . $e->getMessage();
        return null;
    } finally {
        // Close the database connection
        $conn->close();
    }
}


function findAllPatientsByCareGiverID($id)
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `patient` WHERE `care_giver_id` = '.$id;

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
            throw new Exception("No rows found in the 'patient' table. Created By Current Care Giver");
        }

        return $rows;
    } catch (Exception $e) {
        echo "patientRepo Error: " . $e->getMessage();
        return null;
    } finally {
        // Close the database connection
        $conn->close();
    }
}


function updatePatient($name, $age, $phone, $gender, $medication, $diagnosis, $id)
{
    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "UPDATE `patient` SET 
                    name = ?,
                    age = ?,
                    phone = ?,
                    gender = ?,
                    medication = ?,
                    diagnosis = ?
                    WHERE id = ?";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($updateQuery);

        // Check if the prepare statement was successful
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param('ssssssi', $name, $age, $phone, $gender, $medication, $diagnosis, $id);

        // Execute the query
        $stmt->execute();

        // Return true if the update is successful
        return true;
    } catch (Exception $e) {
        // Handle the exception, you might want to log it or return false
        echo "patientRepo Error = " . $e->getMessage();
        return false;
    } finally {
        // Close the statement
        $stmt->close();

        // Close the database connection
        $conn->close();
    }
}

function deletePatient($id) {
    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "DELETE FROM `patient` WHERE id = ?";

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
        echo "patientRepo Error = " . $e->getMessage();
        return false;
    } finally {
        // Close the statement
        $stmt->close();

        // Close the database connection
        $conn->close();
    }
}


function createPatient($name, $age, $phone, $gender, $care_giver_id, $medication, $diagnosis, $date) {
    $conn = db_conn();

    // Construct the SQL query
    $insertQuery = "INSERT INTO `patient` (name, age, phone, gender, care_giver_id, medication, diagnosis, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($insertQuery);

        if (!$stmt) {
            // Handle prepare error
            echo "Failed to prepare the statement: " . $conn->error;
            return -1;
        }

        // Bind parameters
        $stmt->bind_param('ssssisss', $name, $age, $phone, $gender, $care_giver_id, $medication, $diagnosis, $date);

        // Execute the query
        if (!$stmt->execute()) {
            // Handle execute error
            echo "Execute failed: " . $stmt->error;
            return -1;
        }

        // Return the ID of the newly inserted user
        $newUserId = $stmt->insert_id;

        // Close the statement
        $stmt->close();

        return $newUserId;
    } catch (Exception $e) {
        // Handle the exception, you might want to log it or return false
        echo "patientRepo Error: " . $e->getMessage();
        return -1;
    } finally {
        // Close the database connection
        $conn->close();
    }
}
