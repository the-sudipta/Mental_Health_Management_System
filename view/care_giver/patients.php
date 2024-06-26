<?php


session_start();
global $routes, $backend_routes, $image_routes;
//include_once '../Navigation_Links.php';
require '../../routes.php';
require '../../utils/system_functions.php';
require '../../model/patientRepo.php';
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

$add_patient_controller = $backend_routes['care_giver_add_a_patient_controller'];
$delete_patient_controller = $backend_routes['care_giver_delete_patient_controller'];
$Logout_Controller = $backend_routes['logout_controller'];
$edit_patient_controller = $backend_routes['care_giver_edit_patient_controller'];


$care_giver_id = $_SESSION['user_id'];

$patient_by_id='';
if(isset($_GET['patient_id'])) {
    $patient_id = $_GET['patient_id'];

    // Fetch patient details from the database based on the patient_id
    $patient_by_id = findPatientByID($patient_id);

    // Check if patient details are fetched successfully

}


$care_giver_data = findCareGiverByUserID($care_giver_id);
$currentDate = date('j, F Y');



?>










<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patients</title>
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
                        <li class="nav-item"><a href="<?php echo $Patients_Page; ?>" class="active-sidebar-button nav-link"><i class="fa-solid fa-user-group"></i> Patients</a></li>
                        <li class="nav-item"><a href="<?php echo $Schedule_Page; ?>" class="nav-link"><i class="fa-solid fa-calendar"></i> Schedule</a></li>
                        <!--                            <li class="nav-item"><a href="#" class="nav-link"><i class="fa-regular fa-calendar-check"></i> Tasks</a></li>-->
                        <!--                            <li class="nav-item"><a href="#" class="nav-link"><i class="fa-regular fa-envelope"></i> Chats</a></li>-->
                        <li class="nav-item"><a href="<?php echo $Progress_Tracking_Page; ?>" class=" nav-link"><i class="fa-solid fa-chart-simple"></i> Progress Tracking</a></li>
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
                            <label class="cust-color1"></label><br>
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

                        <label class="text-secondary mb-3">Dashboard > Patients</label>
                        <div class="content-box rounded bg-white p-4 px-3">
                            <div class="overall-patient-ratio ">

                                <div class="row">




                                    <div class="col-12 p-0">

                                        <div class="row">

                                            <div class="col-12 ">
                                                <div class="d-flex justify-content-between pb-2">
                                                    <h6><b>List of Patients</b></h6>

                                                    <a href="#" class="cust-color1" data-bs-toggle="modal" data-bs-target="#addpatientsModal">Add new patients <span class="border p-1"><i class="fa-solid fa-plus"></i></span></a>
                                                </div>

                                            </div>

                                            <div class="col-12 mt-3">
                                                <div class="table-container">
                                                    <?php

                                                    // Call the PHP function to fetch data
                                                    $patients = findAllPatientsByCareGiverID($care_giver_id);

                                                    // Check if data is fetched successfully
                                                    if ($patients) {
                                                        ?>
                                                        <table class="table table-bordered mt-2" id="patientlist">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Name</th>
                                                                <th>Age</th>
                                                                <th>Diagnosis</th>
                                                                <th>Medication</th>
                                                                <th>Gender</th>
                                                                <th>Number</th>
                                                                <th>Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php

                                                            $rowCounter = 1;

                                                            // Sort patients by date in descending order
                                                            usort($patients, function($a, $b) {
                                                                return strtotime($b['date']) - strtotime($a['date']);
                                                            });

                                                            // Loop through each patient and display their details
                                                            foreach ($patients as $patient) {
                                                                echo "<tr>";
                                                                echo "<td>" . $rowCounter++ . "</td>"; // Increment index to start from 1
                                                                echo "<td>" . htmlspecialchars($patient['name']) . "</td>"; // Patient's name
                                                                echo "<td>" . htmlspecialchars($patient['age']) . "</td>"; // Patient's age
                                                                echo "<td>" . htmlspecialchars($patient['diagnosis']) . "</td>"; // Patient's diagnosis
                                                                echo "<td>" . htmlspecialchars($patient['medication']) . "</td>"; // Patient's medication
                                                                echo "<td>" . htmlspecialchars($patient['gender']) . "</td>"; // Patient's gender
                                                                echo "<td>" . htmlspecialchars($patient['phone']) . "</td>"; // Patient's phone
                                                                echo "<td>" . htmlspecialchars($patient['date']) . "</td>"; // Date (assuming it's the registration date or similar)
                                                                echo "<td>";
                                                                echo "<a href='?patient_id=" . htmlspecialchars($patient['id']) . "' class='border mx-1 text-primary btn-sm edit-button'><i class='fa-regular fa-pen-to-square'></i></a>";
                                                                echo "<a href='{$delete_patient_controller}?delete_patient=" . htmlspecialchars($patient['id']) . "' class='border mx-1 text-danger btn-sm'><i class='fa-regular fa-trash-can'></i></a>";
                                                                echo "</td>";
                                                                echo "</tr>";
                                                            }

                                                            ?>





                                                            </tbody>
                                                        </table>
                                                        <?php
                                                    } else {
                                                        // If no data is fetched, display a message in a single row
                                                        echo "<tr><td colspan='9'>No patients found.</td></tr>";
                                                    }

                                                    ?>
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
    <div class="modal fade" id="addpatientsModal" tabindex="-1" aria-labelledby="addpatientsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Patient Info</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">



                    <form class="row g-3" action="<?php echo $add_patient_controller; ?>" method="post" id="addpatientForm">
                        <div class="col-md-6">
                            <label for="patient_name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="patient_name">

                        </div>

                        <div class="col-md-6">
                            <label for="patient_age" class="form-label">Age</label>
                            <input type="number" class="form-control" name="age" id="patient_age">

                        </div>
                        <div class="col-md-6">
                            <label for="patient_diagnosis" class="form-label">Diagnosis</label>
                            <input type="text" name="diagnosis" class="form-control" id="patient_diagnosis">

                        </div>


                        <div class="col-md-6">
                            <label for="patient_medication" class="form-label">Medication</label>
                            <input type="text" name="medication" class="form-control" id="patient_medication">

                        </div>
                        <div class="col-md-12">
                            <label for="patient_gender" class="form-label">Gender</label>
                            <select class="form-select" name="patient_gender" id="patient_gender" aria-label="Default select example">
                                <option selected value="null">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>




                        <div class="col-md-12">
                            <label for="contact_number" class="form-label">Contact Number</label>
                            <input type="number" name="phone" class="form-control" id="contact_number">

                        </div>

                        <div class="col-12">
                            <button class="btn cust-bg-color1 w-100" type="submit">Register</button>
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
        $('.edit-button').on('click', function(event) {

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
        new DataTable('#patientlist');

    });
    $(document).ready(function() {
        $('#addpatientForm').submit(function(e) {
            // Prevent the form from submitting
            e.preventDefault();

            // Remove any existing error messages
            $('.error-message').remove();

            var isValid = true;

            // Validate name
            var name = $('#patient_name').val().trim();
            if (name === "") {
                $('#patient_name').after('<div class="error-message text-danger">Please enter the patient\'s name</div>');
                isValid = false;
            }

            // Validate age
            var age = $('#patient_age').val();
            if (age === "") {
                $('#patient_age').after('<div class="error-message text-danger">Please enter the patient\'s age</div>');
                isValid = false;
            } else if (age < 0) {
                $('#patient_age').after('<div class="error-message text-danger">Age cannot be negative</div>');
                isValid = false;
            }

            // Validate diagnosis
            var diagnosis = $('#patient_diagnosis').val().trim();
            if (diagnosis === "") {
                $('#patient_diagnosis').after('<div class="error-message text-danger">Please enter the diagnosis</div>');
                isValid = false;
            }

            // Validate medication
            var medication = $('#patient_medication').val().trim();
            if (medication === "") {
                $('#patient_medication').after('<div class="error-message text-danger">Please enter the medication</div>');
                isValid = false;
            }

            // Validate gender
            var gender = $('#patient_gender').val();
            if (gender === "null") {
                $('#patient_gender').after('<div class="error-message text-danger">Please select the patient\'s gender</div>');
                isValid = false;
            }

            // Validate contact number
            var contactNumber = $('#contact_number').val().trim();
            if (contactNumber === "") {
                $('#contact_number').after('<div class="error-message text-danger">Please enter the contact number</div>');
                isValid = false;
            } else if (!/^\d+$/.test(contactNumber)) {
                $('#contact_number').after('<div class="error-message text-danger">Please enter a valid contact number</div>');
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
<?php
if($patient_by_id) {
    // Output patient name
    echo $patient_by_id['name'];

    // Output modal script
    echo "
    <script>
        $(document).ready(function() {
            // Dynamically create modal HTML
            var modalHTML = `
            <div class='modal fade' id='updatepatientsModal' tabindex='-1' aria-labelledby='updatepatientsModalLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Update Patient Info</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                        <form action='".$edit_patient_controller."' method='POST' class='row g-3'>
                            <input hidden name='selected_patient_id' value='".$patient_by_id['id']."' />
                        <div class='col-md-6'>
                            <label for='update_patient_name' class='form-label'>Name</label>
                            <input type='text' name='name' class='form-control' id='update_patient_name' value='" . htmlspecialchars($patient_by_id['name'] ? : '') . "'>
                        </div>
                        <div class='col-md-6'>
                            <label for='update_patient_age' class='form-label'>Age</label>
                            <input type='number' name='age' class='form-control' id='update_patient_age' value='" . htmlspecialchars($patient_by_id['age'] ? : '') . "'>
                        </div>
                        <div class='col-md-6'>
                            <label for='update_patient_diagnosis' class='form-label'>Diagnosis</label>
                            <input type='text' name='diagnosis' class='form-control' id='update_patient_diagnosis' value='" . htmlspecialchars($patient_by_id['diagnosis'] ? : '') . "'>
                        </div>
                        <div class='col-md-6'>
                            <label for='update_patient_medication' class='form-label'>Medication</label>
                            <input type='text' name='medication' class='form-control' id='update_patient_medication' value='" . htmlspecialchars($patient_by_id['medication'] ? : '') . "'>
                        </div>
                        <div class='col-md-12'>
                            <label for='update_patient_gender' class='form-label'>Gender</label>
                            <select class='form-select' name='patient_gender' id='update_patient_gender'>
                                <option value='Male' " . (isset($patient_by_id['gender']) && $patient_by_id['gender'] == 'Male' ? 'selected' : '') . ">Male</option>
                                <option value='Female' " . (isset($patient_by_id['gender']) && $patient_by_id['gender'] == 'Female' ? 'selected' : '') . ">Female</option>
                            </select>
                        </div>
                        <div class='col-md-12'>
                            <label for='contact_number' class='form-label'>Contact Number</label>
                            <input type='text' name='phone' class='form-control' id='contact_number' value='" . htmlspecialchars($patient_by_id['phone'] ?? '') . "'>
                        </div>
                        <div class='col-12'>
                            <button class='btn cust-bg-color1 w-100' type='submit'>Update</button>
                        </div>
                    </form>
                    
                        </div>
                    </div>
                </div>
            </div>
            `;
           
                // Append modal HTML to the body
                $('body').append(modalHTML);

                // Show the modal
                $('#updatepatientsModal').modal('show');

                // Event listener for modal hidden event
                $('#updatepatientsModal').on('hidden.bs.modal', function () {
                    // Remove the patient_id parameter from the URL
                    var url = new URL(window.location.href);
                    url.searchParams.delete('patient_id');
                    window.history.replaceState({}, document.title, url.toString());

                    // Optionally, remove the modal HTML from the body
                    $('#updatepatientsModal').remove();
                });
            });
    </script>
    ";
}
?>
</body>

</html>
