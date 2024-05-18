<?php

require_once __DIR__ . '/../model/db_connect.php';


function findAllTasksByCareGiverID($id)
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `task` WHERE `care_giver_id` = '.$id;

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
            throw new Exception("No rows found in the 'task' table. Created By Current Care Giver");
        }

        return $rows;
    } catch (Exception $e) {
        echo "taskRepo Error: " . $e->getMessage();
        return null;
    } finally {
        // Close the database connection
        $conn->close();
    }
}
