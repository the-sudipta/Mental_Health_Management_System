<?php

require_once __DIR__ . '/../model/db_connect.php';
require_once __DIR__ . '/../routes.php';
//require '../utils/system_functions.php';

global $system_routes, $error_page;
$error_page = $system_routes['error_database'];


function db_conn()
{
    global $error_page;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mental_health_management_system";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        http_response_code(500);
        navigate($error_page . "?error_message=" . urlencode($conn->connect_error));
//        die("Connection failed: " . $conn->connect_error);
        die();
    }

    return $conn;
}
