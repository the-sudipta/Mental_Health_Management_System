<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboarad</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="../css/main.css" rel="stylesheet">



</head>

<body>


    <section class="dashboard-part ">
        <div id="modalContainer"></div>



        <div class="row">


            <div class="col-xxl-2 col-xl-3 col-lg-3 p-0">
                <div class="sidebar-part border border d-flex align-items-start flex-column ">
                    <div class="s-title p-3 border border-top-0 border-end-0 border-start-0  w-100">
                        <h4 class="text-center cust-color1"><b>Mental Health<br> Management System</b></h4>

                    </div>
                    <div class="nav-box w-100">
                        <label class="px-2 p-3 text-secondary">Menu</label>
                        <ul class="nav navbar-nav text-secondary">

                            <li class="nav-item"><a href="index.php" class="nav-link "><i class="fa-solid fa-chart-line"></i> Dashboard</a></li>
                            <li class="nav-item"><a href="patients.php" class="active-sidebar-button nav-link"><i class="fa-solid fa-user-group"></i> Patients</a></li>
                            <li class="nav-item"><a href="#" class="nav-link"><i class="fa-solid fa-calendar"></i> Schedule</a></li>
                            <li class="nav-item"><a href="#" class="nav-link"><i class="fa-regular fa-calendar-check"></i> Tasks</a></li>
                            <li class="nav-item"><a href="#" class="nav-link"><i class="fa-regular fa-envelope"></i> Chats</a></li>
                            <li class="nav-item"><a href="progress_tracking.php" class=" nav-link"><i class="fa-solid fa-chart-simple"></i> Progress Tracking</a></li>
                            <li class="nav-item"><a href="#" class="nav-link"><i class="fa-regular fa-calendar-check"></i> Education And Resource</a></li>
                            <li class="nav-item"><a href="#" class="nav-link"><i class="fa-solid fa-chart-simple"></i> Symptom Tracking</a></li>
                            <li class="nav-item"><a href="evergency_support.php" class="nav-link"><i class="fa-solid fa-file-waveform"></i> Emergency Support</a></li>
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
                                            <a href="#" class="text-secondary"> <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
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
                                                        <table class="table " id="patientlist">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Name</th>
                                                                    <th>Age</th>
                                                                    <th>Diagnosis</th>
                                                                    <th>Medication</th>
                                                                    <th>Number</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>John Doe</td>
                                                                    <td>45</td>
                                                                    <td>Hypertension</td>
                                                                    <td>Lisinopril</td>
                                                                    <td>123-456-7890</td>
                                                                    <td>
                                                                        <button class="border text-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updatepatientsModal"><i class="fa-regular fa-pen-to-square"></i></button>
                                                                        <button class="border text-danger btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Jane Smith</td>
                                                                    <td>32</td>
                                                                    <td>Diabetes Type 2</td>
                                                                    <td>Metformin</td>
                                                                    <td>234-567-8901</td>
                                                                    <td>
                                                                        <button class="border text-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updatepatientsModal"><i class="fa-regular fa-pen-to-square"></i></button>
                                                                        <button class="border text-danger btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Michael Johnson</td>
                                                                    <td>55</td>
                                                                    <td>Osteoarthritis</td>
                                                                    <td>Ibuprofen</td>
                                                                    <td>345-678-9012</td>
                                                                    <td>
                                                                        <button class="border text-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updatepatientsModal"><i class="fa-regular fa-pen-to-square"></i></button>
                                                                        <button class="border text-danger btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Emily Brown</td>
                                                                    <td>28</td>
                                                                    <td>Asthma</td>
                                                                    <td>Albuterol</td>
                                                                    <td>456-789-0123</td>
                                                                    <td>
                                                                        <button class="border text-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updatepatientsModal"><i class="fa-regular fa-pen-to-square"></i></button>
                                                                        <button class="border text-danger btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>David Wilson</td>
                                                                    <td>60</td>
                                                                    <td>Coronary Artery Disease</td>
                                                                    <td>Aspirin</td>
                                                                    <td>567-890-1234</td>
                                                                    <td>
                                                                        <button class="border text-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updatepatientsModal"><i class="fa-regular fa-pen-to-square"></i></button>
                                                                        <button class="border text-danger btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Sarah Taylor</td>
                                                                    <td>42</td>
                                                                    <td>Depression</td>
                                                                    <td>Sertraline</td>
                                                                    <td>678-901-2345</td>
                                                                    <td>
                                                                        <button class="border text-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updatepatientsModal"><i class="fa-regular fa-pen-to-square"></i></button>
                                                                        <button class="border text-danger btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Robert Martinez</td>
                                                                    <td>50</td>
                                                                    <td>Hypothyroidism</td>
                                                                    <td>Levothyroxine</td>
                                                                    <td>789-012-3456</td>
                                                                    <td>
                                                                        <button class="border text-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updatepatientsModal"><i class="fa-regular fa-pen-to-square"></i></button>
                                                                        <button class="border text-danger btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Jennifer Lee</td>
                                                                    <td>38</td>
                                                                    <td>Migraine</td>
                                                                    <td>Sumatriptan</td>
                                                                    <td>890-123-4567</td>
                                                                    <td>
                                                                        <button class="border text-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updatepatientsModal"><i class="fa-regular fa-pen-to-square"></i></button>
                                                                        <button class="border text-danger btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>William Anderson</td>
                                                                    <td>47</td>
                                                                    <td>Gastroesophageal Reflux Disease</td>
                                                                    <td>Omeprazole</td>
                                                                    <td>901-234-5678</td>
                                                                    <td>
                                                                        <button class="border text-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updatepatientsModal"><i class="fa-regular fa-pen-to-square"></i></button>
                                                                        <button class="border text-danger btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>Olivia Garcia</td>
                                                                    <td>35</td>
                                                                    <td>Anxiety</td>
                                                                    <td>Lorazepam</td>
                                                                    <td>012-345-6789</td>
                                                                    <td>
                                                                        <button class="border text-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updatepatientsModal"><i class="fa-regular fa-pen-to-square"></i></button>
                                                                        <button class="border text-danger btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                                                                    </td>
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




        <!-- Task Add -->
        <div class="modal fade" id="addpatientsModal" tabindex="-1" aria-labelledby="addpatientsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Patient Info</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">



                        <form class="row g-3">




                            <div class="col-md-6">
                                <label for="patient_name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="patient_name" required>

                            </div>

                            <div class="col-md-6">
                                <label for="patient_age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="patient_age" required>

                            </div>
                            <div class="col-md-6">
                                <label for="patient_diagnosis" class="form-label">Diagnosis</label>
                                <input type="text" class="form-control" id="patient_diagnosis" required>

                            </div>


                            <div class="col-md-6">
                                <label for="patient_medication" class="form-label">Medication</label>
                                <input type="text" class="form-control" id="patient_medication" required>

                            </div>
                            <div class="col-md-12">
                                <label for="contact_number" class="form-label">Contact Number</label>
                                <input type="number" class="form-control" id="contact_number" required>

                            </div>

                            <div class="col-12">
                                <button class="btn cust-bg-color1 w-100" type="submit">Register</button>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>



        <!-- Task Update -->
        <div class="modal fade" id="updatepatientsModal" tabindex="-1" aria-labelledby="updatepatientsModalLabel" aria-hidden="true">
            <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Patient Info</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">



                        <form class="row g-3">




                            <div class="col-md-6">
                                <label for="patient_name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="patient_name" required>

                            </div>

                            <div class="col-md-6">
                                <label for="patient_age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="patient_age" required>

                            </div>
                            <div class="col-md-6">
                                <label for="patient_diagnosis" class="form-label">Diagnosis</label>
                                <input type="text" class="form-control" id="patient_diagnosis" required>

                            </div>


                            <div class="col-md-6">
                                <label for="patient_medication" class="form-label">Medication</label>
                                <input type="text" class="form-control" id="patient_medication" required>

                            </div>
                            <div class="col-md-12">
                                <label for="contact_number" class="form-label">Number</label>
                                <input type="number" class="form-control" id="contact_number" required>

                            </div>
                            <div class="col-12">
                                <button class="btn cust-bg-color1 w-100" type="submit">Update</button>
                            </div>
                        </form>


                    </div>
                </div>

            </div>
        </div>

    </section>



    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script src="../js/main.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>






    <script>
        
        
        
        
        $(document).ready(function() {
        new DataTable('#patientlist');
            
        });

    </script>

</body>

</html>
