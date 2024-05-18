<?php


session_start();
global $routes, $backend_routes, $image_routes;
//include_once '../Navigation_Links.php';
require '../../routes.php';
require '../../utils/system_functions.php';
require '../../model/patientRepo.php';
require '../../model/care_giverRepo.php';
require '../../utils/calculationProvider.php';
require '../../model/taskRepo.php';


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

$Logout_Controller = $backend_routes['logout_controller'];
$add_schedule_controller = $backend_routes['care_giver_add_a_schedule_controller'];

$care_giver_id = $_SESSION['user_id'];

$patients_of_care_giver = findAllPatientsByCareGiverID($care_giver_id);

//echo '<h1>Total Online Schedule = '.getOnlineScheduleCountByThePatientsAddedByTheCareGiver($care_giver_id).'</h1>';
//echo '<h1>Total Offline Schedule = '.getOfflineScheduleCountByThePatientsAddedByTheCareGiver($care_giver_id).'</h1>';
//echo '<h1>Total Patients = '.getTotalPatientCountByCareGiverID($care_giver_id).'</h1>';
//echo '<h1>Total Male Patients = '.getTotal_MALE_PatientCountByCareGiverID($care_giver_id).'</h1>';
//echo '<h1>Total Female Patients = '.getTotal_FEMALE_PatientCountByCareGiverID($care_giver_id).'</h1>';

$total_online_schedule = getOnlineScheduleCountByThePatientsAddedByTheCareGiver($care_giver_id);
$total_offline_schedule = getOfflineScheduleCountByThePatientsAddedByTheCareGiver($care_giver_id);
$total_patients = getTotalPatientCountByCareGiverID($care_giver_id);
$total_male_patients = getTotal_MALE_PatientCountByCareGiverID($care_giver_id);
$total_female_patients = getTotal_FEMALE_PatientCountByCareGiverID($care_giver_id);
$online_schedule_percentage_change = getOnlineSchedulePercentageChange($care_giver_id);
$offline_schedule_percentage_change = getOfflineSchedulePercentageChange($care_giver_id);

$care_giver_data = findCareGiverByUserID($care_giver_id);
$tasks_data = findAllTasksByCareGiverID($care_giver_id);
$currentDate = date('j, F Y');



?>








<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
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

                            <li class="nav-item"><a href="<?php echo $Dashboard_Page; ?>" class="active-sidebar-button nav-link "><i class="fa-solid fa-chart-line"></i> Dashboard</a></li>
                            <li class="nav-item"><a href="<?php echo $Patients_Page; ?>" class="nav-link"><i class="fa-solid fa-user-group"></i> Patients</a></li>
                            <li class="nav-item"><a href="<?php echo $Schedule_Page; ?>" class="nav-link"><i class="fa-solid fa-calendar"></i> Schedule</a></li>
                            <!--                            <li class="nav-item"><a href="#" class="nav-link"><i class="fa-regular fa-calendar-check"></i> Tasks</a></li>-->
                            <!--                            <li class="nav-item"><a href="#" class="nav-link"><i class="fa-regular fa-envelope"></i> Chats</a></li>-->
                            <li class="nav-item"><a href="<?php echo $Progress_Tracking_Page; ?>" class=" nav-link"><i class="fa-solid fa-chart-simple"></i> Progress Tracking</a></li>

                            <!-- This is a popup link -->
                            <li class="nav-item"><a data-bs-toggle="modal" data-bs-target="#education_resourcesModal" class="nav-link"><i class="fa-regular fa-calendar-check"></i> Education And Resource</a></li>
                            <!-- This is a popup link -->

                            <li class="nav-item"><a href="<?php echo $Symptoms_Tracking_Page; ?>" class="nav-link"><i class="fa-solid fa-chart-simple"></i> Symptom Tracking</a></li>
                            <li class="nav-item"><a href="<?php echo $Emergency_Support; ?>" class="nav-link"><i class="fa-solid fa-file-waveform"></i> Emergency Support</a></li>
                        </ul>

                    </div>
                    <div class="mt-auto w-100">
                        <div class="mx-2 d-flex justify-content-center ">
                            <div class="user-title-box text-center d-lg-none d-block">
                                <label class="cust-color1"><?php echo $care_giver_data['name']; ?></label><br>
                                <h6><b>Care Givers</b></h6>

                            </div>

                        </div>
                        <div class="mx-2 text-center">
                            <div class="date m-2 d-lg-none d-block">

                                <label><?php echo $currentDate; ?></label>
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
                                            <label class="cust-color1"><?php echo $care_giver_data['name']; ?></label><br>
                                            <h6><b>Care Giver</b></h6>

                                        </div>

                                    </div>
                                    <div class="mx-2">
                                        <div class="date border p-1 px-2 d-lg-block d-none">

                                            <label><?php echo $currentDate; ?></label>
                                        </div>
                                    </div>
                                    <div class="mx-2">
                                        <div class="icon-group">
                                            <a href="<?php echo $Logout_Controller;?>" class="text-secondary"> <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                                            <button id="sidebarToggler" class="border-0 bg-white d-lg-none"><i class="fa-solid fa-bars-staggered"></i></button>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dash-summery">
                        <div class="container-fluid mt-3">


                            <label class="text-secondary mb-3">Dashboard > Summary</label>
                            <div class="content-box ">
                                <div class="overall-summary-ratio ">

                                    <div class="row">

                                        <div class="col-12">
                                            <div class="row">

                                                <div class="col-lg-4 col-md-6">

                                                    <div class="box bg-white mb-3 p-3 rounded">
                                                        <div class="d-flex justify-content-between mb-2">
                                                            <h6 class="text-left"><b>Online Consultations</b></h6>
                                                            <a href="#"><i class="text-right fa-solid fa-ellipsis"></i></a>
                                                        </div>

                                                        <div class="d-flex p-4 px-0 justify-content-between  align-items-center">
                                                            <h1 class="text-left"><b><?php echo $total_online_schedule; ?></b></h1>
                                                            <div class="graph">
                                                            </div>
                                                        </div>

                                                        <div class="d-flex ">
                                                            <label class="text-success"><i class="fa-solid fa-circle-arrow-up"></i> <?php echo $online_schedule_percentage_change; ?></label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-lg-4 col-md-6 ">

                                                    <div class="box bg-white mb-3 p-3 rounded ">
                                                        <div class="d-flex justify-content-between mb-2">
                                                            <h6 class="text-left"><b>Offline Consultations</b></h6>
                                                            <a href="#"><i class="text-right fa-solid fa-ellipsis"></i></a>
                                                        </div>

                                                        <div class="d-flex p-4 px-0 justify-content-between  align-items-center">
                                                            <h1 class="text-left"><b><?php echo $total_offline_schedule; ?></b></h1>
                                                            <div class="graph">


                                                            </div>
                                                        </div>


                                                        <div class="d-flex">
                                                            <label class="text-danger"><i class="fa-solid fa-circle-arrow-up"></i> <?php echo $offline_schedule_percentage_change; ?></label>

                                                        </div>



                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 ">

                                                    <div class="box box3 bg-white mb-3 p-3 rounded ">
                                                        <div class="d-flex justify-content-between mb-2">
                                                            <h5><b>Total Patients</b></h5>
                                                            <a href="#"><i class="text-right fa-solid fa-ellipsis"></i></a>
                                                        </div>

                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <h1 class="text-left"><b><?php echo $total_patients; ?></b></h1>
                                                            <div class="graph">
                                                                <div class="ratio">

                                                                </div>
                                                                <div class="label-container">
                                                                    <label class="text-danger"><b><?php echo $total_female_patients; ?> Female</b></label>
                                                                    <label class="cust-color2"><b><?php echo $total_male_patients; ?> Male</b></label>
                                                                </div>

                                                            </div>
                                                        </div>






                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12 ">
                                            <div class="row ">
                                                <div class="col-xxl-8 col-xl-6">
                                                    <div class="task-table bg-white p-3 rounded">
                                                        <div class="row">

                                                            <div class="col-12 ">
                                                                <div class="d-flex justify-content-between pb-2">
                                                                    <h6><b>Tasks</b></h6>
                                                                </div>

                                                            </div>


                                                            <?php
                                                                
                                                                if ($tasks_data) {

                                                                    // Loop through each symptom
                                                                    foreach ($tasks_data as $index => $task_data) {
                                                            ?>
                                                            <div class="col-12  mb-2">
                                                                <div class="box">
                                                                    <div class="row">

                                                                        <div class="col-8">
                                                                            <div class="left-box">
                                                                                <div class="task-name d-flex">
                                                                                    <?php
                                                                                    if($task_data['status']=="Task Completed Successfully"){
                                                                                        ?>
                                                                                    <i class="text-primary fa-solid fa-square-check"></i>

                                                                                    <?php
                                                                                    }else{
                                                                                        ?>
                                                                                    <i class="text-secondary fa-regular fa-square"></i>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                    <label class="mx-1"><b><?php echo $task_data['status']; ?></b></label>
                                                                                </div>
                                                                                <p class="px-md-3 px-0"><?php echo $task_data['task_name']; ?></p>

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-4">

                                                                            <div class="right-box">
                                                                                <label class="d-block text-end px-md-3 px-0"><?php echo $task_data['date']; ?></label>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <?php } } ?>









                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="col-xxl-4 col-xl-6 col-lg-8">

                                                    <div class="right-box mt-xl-0 mt-5 bg-white p-3 rounded">

                                                        <div class="row">

                                                            <div class="col-12 ">
                                                                <div class="d-flex justify-content-between pb-2">
                                                                    <h6><b>Upcoming schedule</b></h6>
                                                                    <a href="#" class="cust-color1" data-bs-toggle="modal" data-bs-target="#addAppointmentModal">New appointment <span class="border p-1"><i class="fa-solid fa-plus"></i></span></a>
                                                                </div>

                                                            </div>


                                                            <?php
if (!empty($patients_of_care_giver)) {
  $rowCounter = 1;
  $scheduleIds = [];
  $lastDate = null;

  foreach ($patients_of_care_giver as $patient) {
    $schedule_Lists = findAllSchedulesByPatientID($patient['id']);
    if ($schedule_Lists && !in_array("No rows found in the 'schedule' table.", $schedule_Lists)) {
      foreach ($schedule_Lists as $schedule_List) {
        if ($patient['id'] === $schedule_List['patient_id']) {
          $scheduleIds[] = $schedule_List['id'];
        }
      }
    }
  }

  rsort($scheduleIds);

  foreach ($scheduleIds as $scheduleId) {
    foreach ($patients_of_care_giver as $patient) {
      $schedule_Lists = findAllSchedulesByPatientID($patient['id']);
      if ($schedule_Lists && !in_array("No rows found in the 'schedule' table.", $schedule_Lists)) {
        foreach ($schedule_Lists as $schedule_List) {
          if ($schedule_List['id'] == $scheduleId && $patient['id'] === $schedule_List['patient_id']) {
            // Check if the current date is the same as the last date displayed
            
            ?>
                                                            <div class="col-12 mt-3">
                                                                <ul class="appointment-list">
                                                                    <li class="time-slot time-parent-hour">
                                                                        <?php
                                                                        if ($schedule_List['date'] !== $lastDate) {
              // Display the date
              ?>
                                                                        <span><?php echo $schedule_List['date']; ?></span>
                                                                        <?php
              $lastDate = $schedule_List['date'];
            }
                                                                        ?>

                                                                        <span><i class="fa-solid fa-circle"></i></span>
                                                                    </li>
                                                                    <li class="appointments ">
                                                                        <span class="long-span"></span>
                                                                        <ul>

                                                                            <li class="appointment" data-details="John Smith, 8:00-8:20 AM, Consultation">


                                                                                <span class="appointment-short-details d-flex ">

                                                                                    <i class="text-success fa-solid fa-circle"></i>
                                                                                    <span class="time time-child-hour"><b><?php echo $schedule_List['time_from'].' - '. $schedule_List['time_to'] ?></b></span>
                                                                                    <span class="name mx-3"><?php echo $patient['name']; ?></span>

                                                                                    <span class="ms-auto">
                                                                                        <span class="mx-2 text-secondary"><?php echo $schedule_List['status']; ?> </span>
                                                                                        <i class="border p-1 text-primary fa-solid fa-angle-down"></i>
                                                                                    </span>


                                                                                </span>


                                                                                <div class="appointment-details">
                                                                                    <ul>
                                                                                        <li><b>Patient:</b> <?php echo $patient['name']; ?><?php
                                                                                        if($patient['gender']=="Male"){
                                                                                        ?>
                                                                                            <small><span class="p-1  rounded-0  text-primary">(Male)</span></small>
                                                                                            <?php } else { ?>
                                                                                            <small><span class="p-1  rounded-0  text-danger">(Female)</span></small>
                                                                                            <?php } ?>
                                                                                        </li>

                                                                                        <li><b>Time:</b> <?php echo $schedule_List['time_from'].' - '. $schedule_List['time_to'] ?></li>
                                                                                        <li><b>Purpose:</b> <?php echo $schedule_List['purpose']; ?></li>
                                                                                        <li><b>Type:</b> <?php echo $schedule_List['type']; ?></li>
                                                                                        <li><b>Status:</b> <?php echo $schedule_List['status']; ?></li>
                                                                                    </ul>


                                                                                </div>
                                                                            </li>



                                                                        </ul>

                                                                    </li>

                                                                </ul>

                                                            </div>
                                                            <?php } } } } } }?>
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
        </div>



    </section>



    <section class="modals">




        <!-- Task Add -->
        <div class="modal fade" id="taskAddModal" tabindex="-1" aria-labelledby="taskAddModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Task</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">



                        <form class="row g-3">


                            <div class="col-md-12">
                                <label for="taskname" class="form-label">Task name</label>
                                <input type="text" class="form-control" id="taskname">

                            </div>


                            <div class="col-md-12">
                                <label for="validationCustom04" class="form-label">Status</label>
                                <select class="form-select" id="status">
                                    <option selected disabled value="">Choose...</option>
                                    <option>Task Completed Successfully</option>
                                    <option>Task Not Completed</option>
                                </select>

                            </div>
                            <div class="col-md-12">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date">

                            </div>
                            <div class="col-12">
                                <button class="btn cust-bg-color1" type="submit">Submit</button>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>





        <!-- Add Appointment -->
        <div class="modal fade" id="addAppointmentModal" tabindex="-1" aria-labelledby="addAppointmentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Appointment</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">



                        <form action="<?php echo $add_schedule_controller; ?>" method="post" class="row g-3" id="appointmentForm">


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
                                <input name="purpose" type="text" class="form-control" id="purpose">

                            </div>





                            <div class="col-12">
                                <label for="fromtime" class="form-label">Type</label>

                                <div class="d-flex align-items-center">

                                    <div class="form-check mx-1">
                                        <input class="form-check-input" value="Online" type="radio" name="type" id="Online">
                                        <label class="form-check-label" for="Online">
                                            Online
                                        </label>
                                    </div>
                                    <div class="form-check mx-1">
                                        <input class="form-check-input" value="Offline" type="radio" name="type" id="Offline" checked>
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
                                        <input type="time" name="time_from" class="form-control" id="fromtime">

                                    </div>

                                    <div class="col-6">
                                        <input type="time" name="time_to" class="form-control" id="totime">

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


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script src="../../js/jquery-3.7.1.min.js"></script>
    <script src="../../js/main.js"></script>

    <script>
        $(document).ready(function() {
            $('.appointment').click(function(event) {
                var details = $(this).find('.appointment-details');
                var shortDetails = $(this).find('.appointment-short-details');
                var angleDown = $(this).find('.fa-angle-down');
                if (!$(event.target).closest('.appointment-details').length) {
                    details.toggleClass('active');
                    shortDetails.toggleClass('appointment-short-details-active');
                    angleDown.toggleClass('active');
                    angleDown.toggleClass('rotate', details.hasClass('active'));
                }
            });
        });

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
