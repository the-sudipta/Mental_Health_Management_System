<?php


session_start();
global $routes, $backend_routes, $image_routes;
//include_once '../Navigation_Links.php';
require '../../routes.php';
require '../../utils/system_functions.php';
require '../../utils/calculationProvider.php';
require '../../model/symptom_trackRepo.php';
require '../../model/patientRepo.php';
require '../../model/scheduleRepo.php';


$Login_page = $routes['login'];
if($_SESSION["user_id"] <= 0 && $_SESSION["role"] !== "caregiver"){
    echo '<h1>'.$_SESSION["user_id"] .'</h1>';
    navigate($Login_page);
}

// Frontend Redirections
$Dashboard_Page = $routes['care_giver_dashboard'];
$Patients_Page = $routes['care_givers_patients'];
$Schedule_Page = $routes['care_giver_schedule_page'];
$Progress_Tracking_Page = $routes['care_giver_progress_tracking'];
$Education_And_Resources_Page = $routes['care_giver_education_and_resource'];
$Symptoms_Tracking_Page = $routes['care_giver_symptoms_tracking_behaviour'];
$Emergency_Support = $routes['care_giver_emergency_support'];


// Backend Redirections


$add_symptoms_tracking_controller = $backend_routes['care_giver_add_symptoms_tracking_controller'];
$delete_appointment_schedule = $backend_routes['care_giver_delete_a_schedule_controller'];
$Logout_Controller = $backend_routes['logout_controller'];
$care_giver_id = $_SESSION['user_id'];

//echo '<h1>'.$care_giver_id.'</h1>';
$patients_of_care_giver = findAllPatientsByCareGiverID($care_giver_id);

?>









<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboarad</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="../../css/main.css" rel="stylesheet">



</head>

<body>


    <section class="dashboard-part ">

        <div id="education_resources"></div>


        <div class="row">


            <div class="col-xxl-2 col-xl-3 col-lg-3 p-0">
                <div class="sidebar-part border border d-flex align-items-start flex-column ">
                    <div class="s-title p-3 border border-top-0 border-end-0 border-start-0  w-100">
                        <h4 class="text-center cust-color1"><b>Mental Health<br> Management System</b></h4>

                    </div>
                    <div class="nav-box w-100">
                        <label class="px-2 p-3 text-secondary">Menu</label>
                        <ul class="nav navbar-nav text-secondary">

                            <li class="nav-item"><a href="<?php echo $Dashboard_Page; ?>" class=" nav-link "><i class="fa-solid fa-chart-line"></i> Dashboard</a></li>
                            <li class="nav-item"><a href="<?php echo $Patients_Page; ?>" class=" nav-link"><i class="fa-solid fa-user-group"></i> Patients</a></li>
                            <li class="nav-item"><a href="<?php echo $Schedule_Page; ?>" class="active-sidebar-button nav-link"><i class="fa-solid fa-calendar"></i> Schedule</a></li>
                            <!--                            <li class="nav-item"><a href="#" class="nav-link"><i class="fa-regular fa-calendar-check"></i> Tasks</a></li>-->
                            <!--                            <li class="nav-item"><a href="#" class="nav-link"><i class="fa-regular fa-envelope"></i> Chats</a></li>-->
                            <li class="nav-item"><a href="<?php echo $Progress_Tracking_Page; ?>" class=" nav-link"><i class="fa-solid fa-chart-simple"></i> Progress Tracking</a></li>
                            <!-- This is a popup link -->
                            <li class="nav-item"><a href="#" data-bs-toggle="modal" data-bs-target="#education_resourcesModal" class="nav-link"><i class="fa-regular fa-calendar-check"></i> Education And Resource</a></li>
                            <!-- This is a popup link -->

                            <li class="nav-item"><a href="<?php echo $Symptoms_Tracking_Page; ?>" class=" nav-link"><i class="fa-solid fa-chart-simple"></i> Symptom Tracking</a></li>
                            <li class="nav-item"><a href="<?php echo $Emergency_Support; ?>" class="nav-link"><i class="fa-solid fa-file-waveform"></i> Emergency Support</a></li>
                        </ul>

                    </div>
                    <div class="mt-auto w-100">
                        <div class="mx-2 d-flex justify-content-center ">
                            <div class="user-title-box text-center d-lg-none d-block">
                                <label class="cust-color1">Tofayal Ahmed</label><br>
                                <h6><b>Care Givers</b></h6>

                            </div>

                        </div>
                        <div class="mx-2 text-center">
                            <div class="date m-2 d-lg-none d-block">

                                <label>12,March 2024</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xxl-10 col-xl-9 col-lg-9 p-0">
                <div class="dash-content ">
                    <div class="dash-header bg-white">
                        <div class=" d-flex justify-content-between">
                            <div class="left-box ">
                                <div class="w-100 d-lg-none d-block">
                                    <div class="s-title p-3 border ">
                                        <h4 class="text-center cust-color1"><b>Mental Health<br> Management System</b></h4>

                                    </div>
                                </div>
                            </div>
                            <div class="right-box p-3">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="mx-2 d-flex justify-content-center ">
                                        <div class="user-title-box text-center d-lg-block d-none">
                                            <label class="cust-color1">Tofayal Ahmed</label><br>
                                            <h6><b>Care GIvers</b></h6>

                                        </div>

                                    </div>
                                    <div class="mx-2">
                                        <div class="date border p-1 px-2 d-lg-block d-none">

                                            <label>12,March 2024</label>
                                        </div>
                                    </div>
                                    <div class="mx-2">
                                        <div class="icon-group">
                                            <a href="#" class="text-secondary "> <i class="fa-regular fa-envelope"></i> <i class="fa-solid fa-circle  notification-active"></i></a>
                                            <a href="#" class="text-secondary"> <i class="fa-regular fa-bell"></i> <i class="fa-solid fa-circle  notification-active"></i></a>
                                            <a href="<?php echo $Logout_Controller;?>" class="text-secondary"> <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                                            <button id="sidebarToggler" class="border-0 bg-white d-lg-none"><i class="fa-solid fa-bars-staggered"></i></button>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dash-summery patinet-summery">
                        <div class="container-fluid mt-3">

                            <label class="text-secondary mb-3">Schedule</label>
                            <div class="content-box rounded bg-white p-4 px-3">
                                <div class="overall-patient-ratio ">

                                    <div class="row">




                                        <div class="col-12 p-0">

                                            <div class="row">

                                                <div class="col-12 ">
                                                    <div class="d-flex justify-content-between pb-2">
                                                        <h6><b>Patients Schedule List</b></h6>

                                                        <a href="#" class="cust-color1" data-bs-toggle="modal" data-bs-target="#addpatientsModal">Add new schedule <span class="border p-1"><i class="fa-solid fa-plus"></i></span></a>
                                                    </div>

                                                </div>

                                                <div class="col-12 mt-3">
                                                    <div class="table-container">
                                                        <table class="table table-bordered  mt-2" id="schedule_list">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Name</th>
                                                                    <th>Status</th>
                                                                    <th>Type</th>
                                                                    <th>Date</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="symptoms-table-body">

                                                                <?php

                                                                    // Check if data is fetched successfully
                                                                // Check if data is fetched successfully
                                                                // Check if data is fetched successfully
                                                                if (!empty($patients_of_care_giver)) {
                                                                    // Loop through each patient
                                                                    foreach ($patients_of_care_giver as $index => $patient) {
//                                                                        echo '<h1 style="color: #dc3545">'.$patient['id'].'</h1>';

                                                                        // Verify first if the patient has any schedule or not
                                                                        $schedule_Lists = findAllSchedulesByPatientID($patient['id']);

                                                                        // If there are schedules for the patient and the returned array does not contain the specific message
                                                                        if ($schedule_Lists !== null && !in_array("No rows found in the 'schedule' table.", $schedule_Lists)) {
                                                                            // Loop through each schedule record
                                                                            foreach ($schedule_Lists as $schedule_List) {
                                                                                if ($patient['id'] === $schedule_List['patient_id']) {
//                                                                                    echo '<h1 style="color: #0f1b9d"> DATE = ' .$schedule_List['date'].'</h1>';
                                                                                    echo "<tr>";
                                                                                    echo "<td>" . ($index + 1) . "</td>"; // Increment index to start from 1
                                                                                    echo "<td>" . htmlspecialchars($patient['name']) . "</td>";
                                                                                    echo "<td>" . htmlspecialchars($schedule_List['status']) . "</td>";
                                                                                    echo "<td>" . htmlspecialchars($schedule_List['type']) . "</td>";
                                                                                    echo "<td>" . htmlspecialchars($schedule_List['date']) . "</td>";
                                                                                    echo "<td><a href='{$delete_appointment_schedule}?delete_schedule=".$schedule_List['id']."' class='border text-danger btn-sm'><i class='fa-regular fa-trash-can'></i></a></td>";
                                                                                    echo "</tr>";
                                                                                }
                                                                            }
                                                                        } else {
//                                                                            echo "<tr><td colspan='7'>No schedules found for " . htmlspecialchars($patient['name']) . ".</td></tr>";
                                                                        }
                                                                    }
                                                                } else {
                                                                    // If no patients found, display a message in a single row
                                                                    echo "<tr><td colspan='6'>No patients found.</td></tr>";
                                                                }


                                                                ?>
                                                            </tbody>

                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>



    </section>

    <section class="modals">




        <!-- Schedule Add -->
        <div class="modal fade" id="addpatientsModal" tabindex="-1" aria-labelledby="addpatientsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Patient Info</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <form class="row g-3" id="appointmentForm">


                            <div class="col-md-12">
                                <label for="appointment_name" class="form-label">Appointment name</label>
                                <select id="patient_name" class="form-control" name="selected_patient_id" id="appointment_name">
                                    <option selected>Select Your Patient</option>
                                    <?php
                                    if (!empty($patients_of_care_giver)) {
                                        // Iterate through each patient
                                        foreach ($patients_of_care_giver as $patient) {
                                            if ($patient['care_giver_id'] == $care_giver_id) {
                                                // Output the option for each patient
                                                echo '<option value="'.$patient['id'].'" >' . $patient['name'] . '</option>';
//                                                echo '<input hidden name="selected_patient_id" type="number" value="'.$patient['id'].'"/>';

                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="purpose" class="form-label">Purpose</label>
                                <input type="text" class="form-control" id="purpose">

                            </div>



                            

                            <div class="col-12">
                                <label for="fromtime" class="form-label">Type</label>

                                <div class="d-flex align-items-center">

                                    <div class="form-check mx-1">
                                        <input class="form-check-input" type="radio" name="type" id="Online">
                                        <label class="form-check-label" for="Online">
                                            Online
                                        </label>
                                    </div>
                                    <div class="form-check mx-1">
                                        <input class="form-check-input" type="radio" name="type" id="Offline" checked>
                                        <label class="form-check-label" for="Offline">
                                            Offline
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12">
                                <label for="fromtime" class="form-label">Time Duration</label>
                               <div class="row">
                                    <div class="col-6">
                                        <input type="time" class="form-control" id="fromtime">

                                    </div>
                                    
                                    <div class="col-6">
                                        <input type="time" class="form-control" id="totime">

                                    </div>



                                    <div class="col-12 time_duration" id="time_duration"></div>
                               </div>

                            </div>
                            <div class="col-12">
                                <label for="schedule_date" class="form-label">Date</label>
                                <input type="date" class="form-control" name="schedule_date" id="schedule_date">

                            </div>

                            <div class="col-12">
                                <button class="btn cust-bg-color1" type="submit">Submit</button>
                            </div>
                        </form>



                    </div>

                </div>
            </div>

        </div>



    </section>



    <script src="../../js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script src="../../js/main.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Fetch modal content from progresstrackingmodal.html
            fetch('education_resources.php')
                .then(response => response.text())
                .then(data => {
                    // Inject modal content into the modalContainer div
                    document.getElementById('education_resources').innerHTML = data;
                })
                .catch(error => console.error(error));

        });

        $(document).ready(function() {
            new DataTable('#schedule_list');

        });


   
        $(document).ready(function() {
    $('#appointmentForm').submit(function(e) {
        // Prevent the form from submitting
        e.preventDefault();

        // Remove any existing error messages
        $('.error-message').remove();

        var isValid = true;

        // Validate appointment name
        var appointmentName = $('#patient_name').val().trim();
        if (appointmentName === "" || appointmentName === "Select Your Patient") {
            $('#patient_name').after('<div class="error-message text-danger">Please select a patient</div>');
            isValid = false;
        }

        // Validate purpose
        var purpose = $('#purpose').val().trim();
        if (purpose === "") {
            $('#purpose').after('<div class="error-message text-danger">Please enter the purpose</div>');
            isValid = false;
        }

        // Validate schedule date
        var scheduleDate = $('#schedule_date').val().trim();
        if (scheduleDate === "") {
            $('#schedule_date').after('<div class="error-message text-danger">Please enter the date</div>');
            isValid = false;
        }

        // Validate time duration
        var fromTime = $('#fromtime').val();
        var toTime = $('#totime').val();
        if (fromTime === "" || toTime === "") {
            $('#fromtime').after('<div class="error-message text-danger">Please enter both start and end time</div>');
            isValid = false;
        } else if (fromTime >= toTime) {
            $('#totime').after('<div class="error-message text-danger">End time must be after start time</div>');
            isValid = false;
        }

        // Validate type
        var type = $('input[name="type"]:checked').length;
        if (type === 0) {
            $('#type-label').after('<div class="error-message text-danger">Please select a type</div>'); // Assuming you have an element with id "type-label"
            isValid = false;
        }

        // If all validation passes, submit the form
        if (isValid) {
            this.submit();
        }
    });

    // Remove error message on input change
    $('input, select').on('input change', function() {
        $(this).next('.error-message').remove();
    });
});

    </script>

</body>

</html>
