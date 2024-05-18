<?php

require_once __DIR__ . '/../model/db_connect.php';



function findCareGiverByUserID($id)
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `care_giver` WHERE `user_id` = ?';

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
            throw new Exception("No care_giver found with current user ID: " . $id);
        }

        // Close the statement
        $stmt->close();

        return $user;
    } catch (Exception $e) {
        echo "care_giverRepo Error = " . $e->getMessage();
        return null;
    } finally {
        // Close the database connection
        $conn->close();
    }
}


function findCareGiverByID($id)
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `care_giver` WHERE `id` = ?';

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
            throw new Exception("No care_giver found with current ID: " . $id);
        }

        // Close the statement
        $stmt->close();

        return $user;
    } catch (Exception $e) {
        echo "care_giverRepo Error = " . $e->getMessage();
        return null;
    } finally {
        // Close the database connection
        $conn->close();
    }
}


function updateCareGiver($name, $gender, $phone, $id)
{
    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "UPDATE `care_giver` SET 
                    name = ?,
                    gender = ?,
                    phone = ?
                    WHERE id = ?";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($updateQuery);

        // Check if the prepare statement was successful
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param('sssi', $name, $gender, $phone, $id);

        // Execute the query
        $stmt->execute();

        // Return true if the update is successful
        return true;
    } catch (Exception $e) {
        // Handle the exception, you might want to log it or return false
        echo "care_giverRepo Error = " . $e->getMessage();
        return false;
    } finally {
        // Close the statement
        $stmt->close();

        // Close the database connection
        $conn->close();
    }
}


function deleteCareGiver($id) {
    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "DELETE FROM `care_giver` WHERE id = ?";

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
        echo "care_giverRepo Error = " . $e->getMessage();
        return false;
    } finally {
        // Close the statement
        $stmt->close();

        // Close the database connection
        $conn->close();
    }
}

function deleteCareGiverByUserID($user_id)
{
    $conn = db_conn();

    // Construct the SQL query
    $deleteQuery = "DELETE FROM `care_giver` WHERE user_id = ?";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($deleteQuery);

        // Check if the prepare statement was successful
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }

        // Bind parameter
        $stmt->bind_param('i', $user_id);

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


function createCare_giver($name, $gender, $phone, $user_id) {
    $conn = db_conn();

    // Construct the SQL query
    $insertQuery = "INSERT INTO `care_giver` (name, gender, phone, user_id) VALUES (?, ?, ?, ?)";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($insertQuery);

        // Bind parameters
        $stmt->bind_param('sssi', $name, $gender, $phone, $user_id);

        // Execute the query
        $stmt->execute();

        // Return the ID of the newly inserted user
        $newUserId = $stmt->insert_id;

        // Close the statement
        $stmt->close();

        return $newUserId;
    } catch (Exception $e) {
        // Handle the exception, you might want to log it or return false
        echo "care_giverRepo Error = " . $e->getMessage();
        return -1;
    } finally {
        // Close the database connection
        $conn->close();
    }
}
