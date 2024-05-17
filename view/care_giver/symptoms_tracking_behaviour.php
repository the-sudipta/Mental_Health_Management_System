<?php

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
                            <li class="nav-item"><a href="<?php echo $Education_And_Resources_Page; ?>" class="nav-link"><i class="fa-regular fa-calendar-check"></i> Education And Resource</a></li>

                            <!-- This is a popup link -->
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

                            <label class="text-secondary mb-3">Dashboard > Symptoms</label>
                            <div class="content-box rounded bg-white p-4 px-3">
                                <div class="overall-patient-ratio ">

                                    <div class="row">




                                        <div class="col-12 p-0">

                                            <div class="row">

                                                <div class="col-12 ">
                                                    <div class="d-flex justify-content-between pb-2">
                                                        <h6><b>Patients Symptoms List</b></h6>

                                                        <a href="#" class="cust-color1" data-bs-toggle="modal" data-bs-target="#addpatientsModal">Add new symptoms <span class="border p-1"><i class="fa-solid fa-plus"></i></span></a>
                                                    </div>

                                                </div>

                                                <div class="col-12 mt-3">
                                                    <div class="table-container">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Name</th>
                                                                    <th>Symptoms</th>
                                                                    <th>Date</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="symptoms-table-body">
                                                                <?php
                    // Call the PHP function to fetch data
                    

                    // Check if data is fetched successfully
                    if ($symptoms) {
                        // Loop through each symptom
                        foreach ($symptoms as $index => $symptom) {
                            if($symptom['care_giver_id']=='1'){
                                
                                // Output table row with symptom details
                                echo "<tr>";
                                echo "<td>" . ($index + 1) . "</td>"; // Increment index to start from 1
                                echo "<td>" . $symptom['name'] . "</td>"; // Assuming 'name' is the column name for patient's name
                                echo "<td>" . $symptom['symptoms'] . "</td>"; // Assuming 'behaviour' is the column name for symptom behavior
                                echo "<td>" . $symptom['date'] . "</td>"; // Assuming 'date' is the column name for symptom date
                                echo "</tr>";
                                
                            }
                        }
                    } else {
                        // If no data is fetched, display a message in a single row
                        echo "<tr><td colspan='4'>No symptoms found.</td></tr>";
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




        <!-- Task Add -->
        <div class="modal fade" id="addpatientsModal" tabindex="-1" aria-labelledby="addpatientsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Patient Info</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">



                        <form class="row g-3" action="" method="post" id="symptomsaddform">




                            <div class="col-12">
                                <label for="patient_name" class="form-label" class="form-label">Patient Name</label>

                                <select id="patient_name" required class="form-control" name="patient_name">
                                    <option value="">Select</option> <!-- Default option -->
                                    <?php

                                if (!empty($patients)) {
                                    // Iterate through each patient
                                    foreach ($patients as $patient) {

                                        if($patient['care_giver_id']=='1'){

                                            echo '<option value="' . $patient['name'] . '" data-patient-id="'.$patient['id'] .'" data-care-giver-id="'.$patient['care_giver_id'] .'">' . $patient['name'] . '</option>';
                                        }
                                    }
                                }
                            ?>
                                </select>



                            </div>

                            <div class="col-12">
                                <label for="Behaviour" class="form-label" class="form-label">Behaviour</label>


                                <div class="symptom form-check">
                                    <input type="checkbox" id="mood_swings" class="form-check-input">
                                    <label class="form-check-label" for="mood_swings"><span>Mood swings</span></label>
                                </div>

                                <div class="symptom form-check">
                                    <input type="checkbox" id="changes_in_appetite" class="form-check-input">
                                    <label class="form-check-label" for="changes_in_appetite"><span>Changes in appetite</span></label>
                                </div>

                                <div class="symptom form-check">
                                    <input type="checkbox" id="sleep_disturbances" class="form-check-input">
                                    <label class="form-check-label" for="sleep_disturbances"><span>Sleep disturbances</span></label>
                                </div>

                                <div class="symptom form-check">
                                    <input type="checkbox" id="difficulty_concentrating" class="form-check-input">
                                    <label class="form-check-label" for="difficulty_concentrating"><span>Difficulty concentrating</span></label>
                                </div>

                                <div class="symptom form-check">
                                    <input type="checkbox" id="loss_of_interest" class="form-check-input">
                                    <label class="form-check-label" for="loss_of_interest"><span>Loss of interest in activities</span></label>
                                </div>

                                <div class="symptom form-check">
                                    <input type="checkbox" id="feelings_of_hopelessness" class="form-check-input">
                                    <label class="form-check-label" for="feelings_of_hopelessness"><span>Feelings of hopelessness or worthlessness</span></label>
                                </div>

                                <div class="symptom form-check">
                                    <input type="checkbox" id="increased_irritability" class="form-check-input">
                                    <label class="form-check-label" for="increased_irritability"><span>Increased irritability</span></label>
                                </div>

                                <div class="symptom form-check">
                                    <input type="checkbox" id="social_withdrawal" class="form-check-input">
                                    <label class="form-check-label" for="social_withdrawal"><span>Social withdrawal</span></label>
                                </div>
                                <div class="symptom form-check">
                                    <input type="checkbox" id="fatigue_or_lack_of_energy" class="form-check-input">
                                    <label class="form-check-label" for="fatigue_or_lack_of_energy"><span>Fatigue or lack of energy</span></label>
                                </div>

                                <div class="symptom form-check">
                                    <input type="checkbox" id="physical_symptoms" class="form-check-input">
                                    <label class="form-check-label" for="physical_symptoms"><span>Physical symptoms without medical cause (headaches, stomachaches, etc.)</span></label>
                                </div>

                                <div class="symptom form-check">
                                    <input type="checkbox" id="suicidal_thoughts" class="form-check-input">
                                    <label class="form-check-label" for="suicidal_thoughts"><span>Suicidal thoughts or self-harming behaviors</span></label>
                                </div>
                                <div class="col-md-12">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" name="date" id="date" required>

                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn-symptomstracking btn btn-primary w-100" id="submitSymptoms">Submit</button>
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
            new DataTable('#patientlist');

        });

    </script>

</body>

</html>