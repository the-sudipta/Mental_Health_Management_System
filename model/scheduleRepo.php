<?php

require_once __DIR__ . '/../model/db_connect.php';


function findAllSchedules()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `schedule`';

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
            throw new Exception("No rows found in the 'schedule' table.");
        }

        return $rows;
    } catch (Exception $e) {
        echo 'progressRepo Error = '.$e->getMessage();
        header("Location: /Mental_Health_Management_System/error/database_error.php?error_message=".$e->getMessage());
        return null;
    } finally {
        // Close the database connection
        $conn->close();
    }
}

function findScheduleByID($id)
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `schedule` WHERE `id` = ?';

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
            throw new Exception("No schedule found with ID: " . $id);
        }

        // Close the statement
        $stmt->close();

        return $user;
    } catch (Exception $e) {
        echo 'scheduleRepo Error = ' . $e->getMessage();
        return null;
    } finally {
        // Close the database connection
        $conn->close();
    }
}

function findAllSchedulesByPatientID($id)
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `schedule` WHERE `patient_id` = '.$id;

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

        // Check for an empty result set and throw an exception if no rows are found
        if (empty($rows)) {
           return ["No rows found in the 'schedule' table."];
        }

        return $rows;
    } catch (Exception $e) {
        echo 'scheduleRepo Error = '. $e->getMessage();
        return null;
    } finally {
        // Close the database connection
        $conn->close();
    }
}

function updateSchedule($date, $time, $type, $id)
{
    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "UPDATE `schedule` SET 
                    date = ?,
                    time = ?,
                    type = ?
                    WHERE id = ?";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($updateQuery);

        // Check if the prepare statement was successful
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param('sssi', $date, $time, $type, $id);

        // Execute the query
        $stmt->execute();

        // Return true if the update is successful
        return true;
    } catch (Exception $e) {
        // Handle the exception, you might want to log it or return false
        echo 'scheduleRepo Error = ' . $e->getMessage();
        return false;
    } finally {
        // Close the statement
        $stmt->close();

        // Close the database connection
        $conn->close();
    }
}

function updateScheduleStatus($status, $id)
{
    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "UPDATE `schedule` SET 
                    status = ?
                    WHERE id = ?";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($updateQuery);

        // Check if the prepare statement was successful
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param('si', $status, $id);

        // Execute the query
        $stmt->execute();

        // Return true if the update is successful
        return true;
    } catch (Exception $e) {
        // Handle the exception, you might want to log it or return false
        echo 'scheduleRepo Error = ' . $e->getMessage();
        return false;
    } finally {
        // Close the statement
        $stmt->close();

        // Close the database connection
        $conn->close();
    }
}

function deleteSchedule($id) {

    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "DELETE FROM `schedule` WHERE id = ?";

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
        echo 'scheduleRepo Error = ' . $e->getMessage();

        return false;
    } finally {
        // Close the statement
        $stmt->close();

        // Close the database connection
        $conn->close();
    }
}

function createSchedule($date, $time, $type, $status) {

    $conn = db_conn();


    // Construct the SQL query
    $insertQuery = "INSERT INTO `schedule` (date, time, type, status) VALUES (?, ?, ?, ?)";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($insertQuery);

        // Check if the prepare statement was successful
        if (!$stmt) {
            throw new Exception("Prepare statement for CreateMedicalHistory failed: " . $conn->error);
        }


        // Bind parameters
        $stmt->bind_param('ssss', $date, $time, $type, $status);

        // Execute the query
        $stmt->execute();

        // Return the ID of the newly inserted user
        $newUserId = $conn->insert_id;

        // Close the statement
        $stmt->close();

        return $newUserId;
    } catch (Exception $e) {
        echo 'ScheduleRepo Error = '.$e->getMessage();
        return -1;
    } finally {
        // Close the database connection
        $conn->close();
    }
}
