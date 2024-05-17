<?php

global $routes, $system_routes;
session_start();

require '../../../routes.php';
require '../../../utils/system_functions.php';


require_once __DIR__ . '/../../../model/scheduleRepo.php';

$schedule_page = $routes['care_giver_schedule_page'];


if (isset($_GET['delete_schedule'])) {
    $scheduleId = $_GET['delete_schedule'];
    $isDeleted = deleteSchedule($scheduleId); // Call the deletePatient function

    if ($isDeleted) {
        navigate($schedule_page);
        exit;
    } else {
        echo '<br><p style="color: #dc3545">Redirecting to Schedule Page BUT Schedule ID not Found</p><br>';
        navigate($schedule_page);
        exit;
    }
}