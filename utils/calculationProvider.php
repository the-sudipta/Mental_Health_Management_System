<?php

global $routes, $system_routes;

require_once __DIR__ . '/../utils/system_functions.php';
require_once __DIR__ . '/../model/patientRepo.php';
require_once __DIR__ . '/../model/progressRepo.php';
require_once __DIR__ . '/../model/care_giverRepo.php';
require_once __DIR__ . '/../model/scheduleRepo.php';
require_once __DIR__ . '/../model/symptom_trackRepo.php';
require_once __DIR__ . '/../model/userRepo.php';

// echo  __DIR__ . '/system_functions.php' .'<br>';
// echo  __DIR__ . '/../model/patientRepo.php'.'<br>';
// echo  __DIR__ . '/../model/progressRepo.php'.'<br>';
// echo  __DIR__ . '/../model/care_giverRepo.php'.'<br>';
// echo  __DIR__ . '/../model/scheduleRepo.php'.'<br>';
// echo  __DIR__ . '/../model/symptom_trackRepo.php'.'<br>';
// echo  __DIR__ . '/../model/userRepo.php'.'<br>';







//
//$patient_data = findPatientByID(2);
//
//echo $patient_data['name'] . '<br>';
//
//$test = $routes['login'];
//echo 'test = '.$test;


function getOnlineScheduleCountByThePatientsAddedByTheCareGiver($care_giver_id): int
{
    $patients = findAllPatientsByCareGiverID($care_giver_id);
    
    $onlineScheduleCount = 0;

    if ($patients !== null) {
        foreach ($patients as $patient) {
            $schedules = findAllSchedulesByPatientID($patient['id']);
            if ($schedules !== null) {
                foreach ($schedules as $schedule) {
                    if (isset($schedule['type']) && $schedule['type'] === 'Online') {
                        $onlineScheduleCount++;
                    }
                }
            }
        }
    }

    // Return the total count
    return $onlineScheduleCount;
}

function getOfflineScheduleCountByThePatientsAddedByTheCareGiver($care_giver_id): int
{
    $patients = findAllPatientsByCareGiverID($care_giver_id);

    $offlineScheduleCount = 0;

    if ($patients !== null) {
        foreach ($patients as $patient) {
            $schedules = findAllSchedulesByPatientID($patient['id']);
            if ($schedules !== null) {
                foreach ($schedules as $schedule) {
                    if (isset($schedule['type']) && $schedule['type'] === 'Offline') {
                        $offlineScheduleCount++;
                    }
                }
            }
        }
    }

    // Return the total count
    return $offlineScheduleCount;
}


function getTotalPatientCountByCareGiverID($care_giver_id): int
{
    $patients = null;
    // Step 1: Fetch all the Patients from patients table by Care Giver ID
    $patients = findAllPatientsByCareGiverID($care_giver_id);

    if($patients !== null){
        // Step 2: Count the Number of Rows found
        $totalPatientCount = count($patients);

        return $totalPatientCount;
    }else{
        return 0;
    }
}

function getTotal_MALE_PatientCountByCareGiverID($care_giver_id): int
{
    // Step 1: Fetch all the Patients from patients table by Care Giver ID
    $patients = findAllPatientsByCareGiverID($care_giver_id);

    // Initialize the male patient count to 0
    $malePatientCount = 0;

    // Check if $patients is an array and not null
    if (is_array($patients)) {
        // Step 2: Count the Number of Rows if gender is 'Male'
        foreach ($patients as $patient) {
            if ($patient['gender'] === 'Male') {
                $malePatientCount++;
            }
        }
    } else {
        // Log an error message or handle the case where no patients are found
        error_log("No patients found for Care Giver ID: " . $care_giver_id);
    }

    return $malePatientCount;
}

function getTotal_FEMALE_PatientCountByCareGiverID($care_giver_id): int
{
    // Step 1: Fetch all the Patients from patients table by Care Giver ID
    $patients = findAllPatientsByCareGiverID($care_giver_id);
    $femalePatientCount = 0;

    // Check if $patients is an array and not null
    if (is_array($patients)) {
        // Step 2: Count the Number of Rows if gender is 'Female'
        foreach ($patients as $patient) {
            if ($patient['gender'] === 'Female') {
                $femalePatientCount++;
            }
        }
    } else {
        // Log an error message or handle the case where no patients are found
        error_log("No patients found for Care Giver ID: " . $care_giver_id);
    }

    return $femalePatientCount;
}

function getOnlineSchedulePercentageChange($care_giver_id): string
{
    $patients = findAllPatientsByCareGiverID($care_giver_id);
    $currentMonthCount = 0;
    $previousMonthCount = 0;

    if ($patients !== null) {
        // Get the current month and year
        $currentMonth = date('m');
        $currentYear = date('Y');

        // Calculate the previous month and year
        $previousMonth = ($currentMonth == 1) ? 12 : $currentMonth - 1;
        $previousYear = ($currentMonth == 1) ? $currentYear - 1 : $currentYear;

        foreach ($patients as $patient) {
            $schedules = findAllSchedulesByPatientID($patient['id']);
            if ($schedules !== null) {
                foreach ($schedules as $schedule) {
                    if (isset($schedule['type']) && $schedule['type'] === 'Online') {
                        $scheduleDate = new DateTime($schedule['date']);
                        $scheduleYear = $scheduleDate->format('Y');
                        $scheduleMonth = $scheduleDate->format('m');

                        if ($scheduleYear == $currentYear && $scheduleMonth == $currentMonth) {
                            $currentMonthCount++;
                        } elseif ($scheduleYear == $previousYear && $scheduleMonth == $previousMonth) {
                            $previousMonthCount++;
                        }
                    }
                }
            }
        }
    }

    // Calculate the percentage change
    if ($previousMonthCount == 0) {
        // If there were no online schedules in the previous month, the percentage change is 100% if there are schedules in the current month
        $percentageChange = ($currentMonthCount > 0) ? 100.0 : 0.0;
    } else {
        $percentageChange = (($currentMonthCount - $previousMonthCount) / $previousMonthCount) * 100;
    }

    // Determine the sign for the percentage change
    if ($percentageChange > 0) {
        return '+' . number_format($percentageChange, 2) . '%';
    } elseif ($percentageChange < 0) {
        return number_format($percentageChange, 2) . '%';
    } else {
        return '0.00%';
    }
}

function getOfflineSchedulePercentageChange($care_giver_id): string
{
    $patients = findAllPatientsByCareGiverID($care_giver_id);
    $currentMonthCount = 0;
    $previousMonthCount = 0;

    if ($patients !== null) {
        // Get the current month and year
        $currentMonth = date('m');
        $currentYear = date('Y');

        // Calculate the previous month and year
        $previousMonth = ($currentMonth == 1) ? 12 : $currentMonth - 1;
        $previousYear = ($currentMonth == 1) ? $currentYear - 1 : $currentYear;

        foreach ($patients as $patient) {
            $schedules = findAllSchedulesByPatientID($patient['id']);
            if ($schedules !== null) {
                foreach ($schedules as $schedule) {
                    if (isset($schedule['type']) && $schedule['type'] === 'Offline') {
                        $scheduleDate = new DateTime($schedule['date']);
                        $scheduleYear = $scheduleDate->format('Y');
                        $scheduleMonth = $scheduleDate->format('m');

                        if ($scheduleYear == $currentYear && $scheduleMonth == $currentMonth) {
                            $currentMonthCount++;
                        } elseif ($scheduleYear == $previousYear && $scheduleMonth == $previousMonth) {
                            $previousMonthCount++;
                        }
                    }
                }
            }
        }
    }

    // Calculate the percentage change
    if ($previousMonthCount == 0) {
        // If there were no offline schedules in the previous month, the percentage change is 100% if there are schedules in the current month
        $percentageChange = ($currentMonthCount > 0) ? 100.0 : 0.0;
    } else {
        $percentageChange = (($currentMonthCount - $previousMonthCount) / $previousMonthCount) * 100;
    }

    // Determine the sign for the percentage change
    if ($percentageChange > 0) {
        return '+' . number_format($percentageChange, 2) . '%';
    } elseif ($percentageChange < 0) {
        return number_format($percentageChange, 2) . '%';
    } else {
        return '0.00%';
    }
}

