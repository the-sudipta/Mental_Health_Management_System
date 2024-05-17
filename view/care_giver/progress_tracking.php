<?php


session_start();
global $routes, $backend_routes, $image_routes;
//include_once '../Navigation_Links.php';
require '../../routes.php';
require '../../utils/system_functions.php';
require '../../utils/calculationProvider.php';


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
$progress_add_trackingController = $backend_routes['care_giver_add_progress_controller'];



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
                            <li class="nav-item"><a href="<?php echo $Education_And_Resources_Page; ?>" class="nav-link"><i class="fa-regular fa-calendar-check"></i> Education And Resource</a></li>
                            <li class="nav-item"><a href="<?php echo $Symptoms_Tracking_Page; ?>" class="nav-link"><i class="fa-solid fa-chart-simple"></i> Symptom Tracking</a></li>
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
                                                        <table class="table" id="patient_progress">
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
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>John Doe</td>
                                                                    <td>Regular</td>
                                                                    <td>😊</td>
                                                                    <td>5</td>
                                                                    <td>10/05/2023</td>
                                                                </tr>
                                                                <tr>
                                                                      <td>2</td>
                                                                      <td>Jane Smith</td>
                                                                      <td>Irregular</td>
                                                                      <td>😐</td>
                                                                      <td>3</td>
                                                                      <td>15/08/2023</td>
                                                                </tr>
                                                                <tr>
                                                                      <td>3</td>
                                                                      <td>Michael Johnson</td>
                                                                      <td>Regular</td>
                                                                      <td>😔</td>
                                                                      <td>8</td>
                                                                      <td>22/06/2023</td>
                                                                </tr>
                                                                <tr>
                                                                      <td>4</td>
                                                                      <td>Emily Davis</td>
                                                                      <td>Irregular</td>
                                                                      <td>😊</td>
                                                                      <td>4</td>
                                                                      <td>01/09/2023</td>
                                                                </tr>
                                                                <tr>
                                                                      <td>5</td>
                                                                      <td>William Brown</td>
                                                                      <td>Regular</td>
                                                                      <td>😐</td>
                                                                      <td>6</td>
                                                                      <td>11/11/2023</td>
                                                                </tr>
                                                                <tr>
                                                                      <td>6</td>
                                                                      <td>Sarah Wilson</td>
                                                                      <td>Regular</td>
                                                                      <td>😊</td>
                                                                      <td>7</td>
                                                                      <td>03/04/2023</td>
                                                                </tr>
                                                                <tr>
                                                                      <td>7</td>
                                                                      <td>David Martinez</td>
                                                                      <td>Irregular</td>
                                                                      <td>😔</td>
                                                                      <td>2</td>
                                                                      <td>19/07/2023</td>
                                                                </tr>
                                                                <tr>
                                                                      <td>8</td>
                                                                      <td>Emma Garcia</td>
                                                                      <td>Regular</td>
                                                                      <td>😊</td>
                                                                      <td>9</td>
                                                                      <td>28/10/2023</td>
                                                                </tr>
                                                                <tr>
                                                                      <td>9</td>
                                                                      <td>James Rodriguez</td>
                                                                      <td>Irregular</td>
                                                                      <td>😐</td>
                                                                      <td>5</td>
                                                                      <td>07/12/2023</td>
                                                                </tr>
                                                                <tr>
                                                                      <td>10</td>
                                                                      <td>Ava Lopez</td>
                                                                      <td>Regular</td>
                                                                      <td>😊</td>
                                                                      <td>4</td>
                                                                      <td>14/02/2023</td>
                                                                </tr>
                                                                <tr>
                                                                      <td>11</td>
                                                                      <td>Benjamin Lee</td>
                                                                      <td>Regular</td>
                                                                      <td>😔</td>
                                                                      <td>6</td>
                                                                      <td>25/05/2023</td>
                                                                </tr>

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



                        <form action="<?php echo $progress_add_trackingController; ?>" method="post" class="row g-3">



                            <div class="col-md-6">
                                <label for="patient_name" class="form-label">Select Patient</label>
                                <select class="form-select" aria-label="Default select example" name="patient_id" required>
                                    <option selected>Select Your Role</option>
                                    <option value="1">John Doe</option>
                                    <option value="2">Jane Smith</option>
                                    <option value="3">Michael Johnson</option>
                                </select>

                            </div>
                            <div class="col-md-6">
                                <label for="medication_adherence" class="form-label">Medication Adherence</label>
                                <select class="form-select" aria-label="Default select example" name="medication_adherence" required>
                                    <option selected value="null">Select Your Role</option>
                                    <option value="Irregular">Irregular</option>
                                    <option value="Poor">Poor</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Excellent">Excellent</option>
                                </select>

                            </div>
                            <div class="col-md-12">
                                <label for="patient_mood" class="form-label">Patients Mood</label>
                                <select class="form-select" aria-label="Default select example" name="patient_mood" required>
                                    <option value="null" selected>Select Your Role</option>
                                    <option value="Very Happy">😁 (Very Happy)</option>
                                    <option value="Happy">😃 (Happy)</option>
                                    <option value="Sad">😐 (Sad) </option>
                                    <option value="Not Good">😔 (Not Good) </option>
                                </select>
                            </div>


                            <div class="col-md-12">
                                <label for="therapy" class="form-label">Therapy Sessions Attended</label>
                                <input type="number" name="therapy" class="form-control" id="therapy" required>

                            </div>


                            <div class="col-md-12">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" name="date" class="form-control" id="date" required>

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

        // JavaScript to toggle visibility of details
        document.addEventListener('DOMContentLoaded', function() {
            const toggleLinks = document.querySelectorAll('.toggle-details');

            toggleLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default link behavior
                    const details = this.nextElementSibling; // Get the next sibling div
                    details.style.display = (details.style.display === 'none' || details.style.display === '') ? 'block' : 'none'; // Toggle display
                });
            });
        });

    </script>

    <script>
        $(document).ready(function() {
            new DataTable('#patient_progress');

        });

    </script>

</body>

</html>
