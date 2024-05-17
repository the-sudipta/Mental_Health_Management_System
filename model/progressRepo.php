<?php

require_once __DIR__ . '/../model/db_connect.php';


function findAllProgresses()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `progress`';

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
            throw new Exception("No rows found in the 'progress' table.");
        }

        return $rows;
    } catch (Exception $e) {
        echo 'progressRepo Error = ' . $e->getMessage();
        return null;
    } finally {
        // Close the database connection
        $conn->close();
    }
}

function findProgressByID($id)
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `progress` WHERE `id` = ?';

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
            throw new Exception("No progress found with ID: " . $id);
        }

        // Close the statement
        $stmt->close();

        return $user;
    } catch (Exception $e) {
        echo 'progressRepo Error = ' . $e->getMessage();
        return null;
    } finally {
        // Close the database connection
        $conn->close();
    }
}

function findAllProgressesByPatientID($id)
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `progress` WHERE `patient_id` = '.$id;

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
            throw new Exception("No rows found in the 'progress' table.");
        }

        return $rows;
    } catch (Exception $e) {
        echo 'progressRepo Error = '. $e->getMessage();

        return null;
    } finally {
        // Close the database connection
        $conn->close();
    }
}

function updateProgress($mood, $medicine, $therapy_attended, $date, $id)
{
    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "UPDATE `progress` SET 
                    mood = ?,
                    medicine = ?,
                    therapy_attended = ?,
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
        $stmt->bind_param('ssssi', $mood, $medicine, $therapy_attended, $date, $id);

        // Execute the query
        $stmt->execute();

        // Return true if the update is successful
        return true;
    } catch (Exception $e) {
        // Handle the exception, you might want to log it or return false
        echo 'progressRepo Error = ' . $e->getMessage();
        return false;
    } finally {
        // Close the statement
        $stmt->close();

        // Close the database connection
        $conn->close();
    }
}

function deleteProgress($id) {

    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "DELETE FROM `progress` WHERE id = ?";

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
        echo 'progressRepo Error = ' . $e->getMessage();

        return false;
    } finally {
        // Close the statement
        $stmt->close();

        // Close the database connection
        $conn->close();
    }
}

function createProgress($mood, $medicine, $therapy_attended, $patient_id, $date) {

    $conn = db_conn();


    // Construct the SQL query
    $insertQuery = "INSERT INTO `progress` (mood, medicine, therapy_attended, patient_id, date) VALUES (?, ?, ?, ?, ?)";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($insertQuery);

        // Check if the prepare statement was successful
        if (!$stmt) {
            throw new Exception("Prepare statement for CreateMedicalHistory failed: " . $conn->error);
        }


        // Bind parameters
        $stmt->bind_param('sssis', $mood, $medicine, $therapy_attended, $patient_id, $date);

        // Execute the query
        $stmt->execute();

        // Return the ID of the newly inserted user
        $newUserId = $conn->insert_id;

        // Close the statement
        $stmt->close();

        return $newUserId;
    } catch (Exception $e) {
        echo 'progressRepo Error = '.$e->getMessage();
        return -1;
    } finally {
        // Close the database connection
        $conn->close();
    }
}
