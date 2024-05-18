<?php


session_start();
global $routes, $backend_routes, $image_routes;
//include_once '../Navigation_Links.php';
require '../../routes.php';
require '../../utils/system_functions.php';
require '../../model/patientRepo.php';
require '../../model/progressRepo.php';
require '../../model/care_giverRepo.php';

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
$add_progressController = $backend_routes['care_giver_add_progress_controller'];


$care_giver_id = $_SESSION['user_id'];

$patients_of_care_giver = findAllPatientsByCareGiverID($care_giver_id);

$care_giver_data = findCareGiverByUserID($care_giver_id);
$currentDate = date('j, F Y');




?>








<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patient Progress Track</title>
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
                        <li class="nav-item"><a href="<?php echo $Patients_Page; ?>" class="nav-link"><i class="fa-solid fa-user-group"></i> Patients</a></li>
                        <li class="nav-item"><a href="<?php echo $Schedule_Page; ?>" class="nav-link"><i class="fa-solid fa-calendar"></i> Schedule</a></li>
                        <!--                            <li class="nav-item"><a href="#" class="nav-link"><i class="fa-regular fa-calendar-check"></i> Tasks</a></li>-->
                        <!--                            <li class="nav-item"><a href="#" class="nav-link"><i class="fa-regular fa-envelope"></i> Chats</a></li>-->
                        <li class="nav-item"><a href="<?php echo $Progress_Tracking_Page; ?>" class="active-sidebar-button nav-link"><i class="fa-solid fa-chart-simple"></i> Progress Tracking</a></li>
                        <!-- This is a popup link -->
                        <li class="nav-item"><a href="#" data-bs-toggle="modal" data-bs-target="#education_resourcesModal" class="nav-link"><i class="fa-regular fa-calendar-check"></i> Education And Resource</a></li>
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
                                        <h6><b>Care Givers</b></h6>

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
                <div class="dash-summery patinet-summery">
                    <div class="container-fluid mt-3">

                        <label class="text-secondary mb-3">Progress Report</label>
                        <div class="content-box rounded bg-white p-4 px-3">
                            <div class="overall-patient-ratio ">

                                <div class="row">




                                    <div class="col-12 p-0">

                                        <div class="row">

                                            <div class="col-12 ">
                                                <div class="d-flex justify-content-between pb-2">
                                                    <h4><b>Patients Progress Report</b></h4>

                                                    <a href="#" class="cust-color1" data-bs-toggle="modal" data-bs-target="#addpatientsprogressModal">Add Progress Report <span class="border p-1"><i class="fa-solid fa-plus"></i></span></a>
                                                </div>

                                            </div>

                                            <div class="col-12 mt-3">
                                                <div class="table-container">
                                                    <table class="table table-bordered  mt-2" id="patient_progress">
                                                        <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Name</th>
                                                            <th>Medication Adherence</th>
                                                            <th>Patients Mood</th>
                                                            <th>Therapy Sessions Attended</th>
                                                            <th>Date</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $patients = findAllPatientsByCareGiverID($care_giver_id);

                                                        if (!empty($patients)) { // Check if patients array is not empty
                                                            $rowCounter = 1; // Initialize a row counter
                                                            $progressIds = array(); // Array to store progress IDs for sorting

                                                            // Loop through each patient
                                                            foreach ($patients as $patient) {
                                                                $progressList = findAllProgressesByPatientID($patient['id']);

                                                                // Check if progress data is fetched successfully and not an error message
                                                                if ($progressList !== null && !in_array("No rows found in the 'progress' table.", $progressList)) {
                                                                    // Add progress IDs to the array for sorting
                                                                    foreach ($progressList as $progress) {
                                                                        $progressIds[] = $progress['id'];
                                                                    }
                                                                }
                                                            }

                                                            // Sort progress IDs in descending order
                                                            rsort($progressIds);

                                                            // Loop through sorted progress IDs and display corresponding progress records
                                                            foreach ($progressIds as $progressId) {
                                                                // Find the progress record with this ID
                                                                foreach ($patients as $patient) {
                                                                    $progressList = findAllProgressesByPatientID($patient['id']);
                                                                    foreach ($progressList as $progress) {
                                                                        if(isset($progress['id'])){
                                                                            if ($progress['id'] == $progressId) {
                                                                                // Display the progress record
                                                                                echo "<tr>";
                                                                                echo "<td>" . $rowCounter++ . "</td>"; // Use the row counter and increment it
                                                                                echo "<td>" . htmlspecialchars($patient['name']) . "</td>";
                                                                                echo "<td>" . htmlspecialchars($progress['mood']) . "</td>";
                                                                                echo "<td>" . htmlspecialchars($progress['medication_adherence']) . "</td>";
                                                                                echo "<td>" . htmlspecialchars($progress['therapy_attended']) . "</td>";
                                                                                echo "<td>" . htmlspecialchars($progress['date']) . "</td>";
                                                                                echo "</tr>";
                                                                            }
                                                                        }
                                                                    }
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




    <!-- Patient Progress Add -->
    <div class="modal fade" id="addpatientsprogressModal" tabindex="-1" aria-labelledby="addpatientsprogressModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Patient Progress</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">



                    <form class="row g-3" action="<?php echo $add_progressController; ?>" method="post" id="progressForm">



                        <div class="col-md-6">
                            <label for="patient_name" class="form-label">Select Patient</label>


                            <select class="form-select" aria-label="Default select example" name="patient_id" id="patient_name">
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
                        <div class="col-md-6">
                            <label for="medication_adherence" class="form-label">Medication Adherence</label>
                            <select class="form-select" aria-label="Default select example" name="medication_adherence" id="medication_adherence">
                                <option selected>Select Adherence</option>
                                <option value="Irregular">Irregular</option>
                                <option value="Poor">Poor</option>
                                <option value="Regular">Regular</option>
                                <option value="Excellent">Excellent</option>
                            </select>

                        </div>
                        <div class="col-md-12">
                            <label for="patient_mood" class="form-label">Patients Mood</label>
                            <select class="form-select" aria-label="Default select example" name="patient_mood" id="patient_mood">
                                <option selected>Select Patient Current Mood</option>
                                <option value="Very Happy 😁">😁 (Very Happy)</option>
                                <option value="Happy 😃">😃 (Happy)</option>
                                <option value="Sad 😐">😐 (Sad) </option>
                                <option value="Not Good 😔">😔 (Not Good) </option>
                            </select>

                        </div>


                        <div class="col-md-12">
                            <label for="therapy" class="form-label">Therapy Sessions Attended</label>
                            <input placeholder="0" type="number" class="form-control" name="therapy" id="therapy">

                        </div>


                        <div class="col-md-12">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date">

                        </div>


                        <div class="col-12">
                            <button class="btn cust-bg-color1 w-100" type="submit">Create</button>
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

    $(document).ready(function() {
        if (tableData.length > 0) {
            $('#patient_progress').DataTable();
        }else{
            console.log('No data available to display in DataTable.');

        }

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
        $('#progressForm').submit(function(e) {
            // Prevent the form from submitting
            e.preventDefault();

            // Remove any existing error messages
            $('.error-message').remove();

            var isValid = true;

            // Validate patient name
            var patientName = $('#patient_name').val();
            if (patientName === "Select Your Patient") {
                $('#patient_name').after('<div class="error-message text-danger">Please select a patient</div>');
                isValid = false;
            }

            // Validate medication adherence
            var medicationAdherence = $('#medication_adherence').val();
            if (medicationAdherence === "Select Adherence") {
                $('#medication_adherence').after('<div class="error-message text-danger">Please select medication adherence</div>');
                isValid = false;
            }

            // Validate patient mood
            var patientMood = $('#patient_mood').val();
            if (patientMood === "Select Patient Current Mood") {
                $('#patient_mood').after('<div class="error-message text-danger">Please select the patients current mood</div>');
                isValid = false;
            }

            // Validate therapy sessions
            var therapy = $('#therapy').val();
            if (therapy === "") {
                $('#therapy').after('<div class="error-message text-danger">Please enter the number of therapy sessions attended</div>');
                isValid = false;
            } else if (therapy < 0) {
                $('#therapy').after('<div class="error-message text-danger">Therapy sessions attended cannot be negative</div>');
                isValid = false;
            }

            // Validate date
            var date = $('#date').val();
            if (date === "") {
                $('#date').after('<div class="error-message text-danger">Please select a date</div>');
                isValid = false;
            }

            // If all validation passes, submit the form
            if (isValid) {
                this.submit();
            }
        });

        // Remove error message on change or input
        $('select, input').on('change input', function() {
            $(this).next('.error-message').remove();
        });
    });

</script>
</body>

</html>
