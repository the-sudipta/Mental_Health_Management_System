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
                                            <h6><b>Care Giver</b></h6>

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
                                                            <h1 class="text-left"><b>31</b></h1>
                                                            <div class="graph">
                                                            </div>
                                                        </div>

                                                        <div class="d-flex ">
                                                            <label class="text-success"><i class="fa-solid fa-circle-arrow-up"></i> +71.99%</label>
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
                                                            <h1 class="text-left"><b>10</b></h1>
                                                            <div class="graph">


                                                            </div>
                                                        </div>


                                                        <div class="d-flex">
                                                            <label class="text-danger"><i class="fa-solid fa-circle-arrow-up"></i> -29.01%</label>

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
                                                            <h1 class="text-left"><b>7</b></h1>
                                                            <div class="graph">
                                                                <div class="ratio">

                                                                </div>
                                                                <div class="label-container">
                                                                    <label class="text-danger"><b>4 Female</b></label>
                                                                    <label class="cust-color2"><b>3 Men</b></label>
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
                                                                    <a href="#" class="cust-color1" data-bs-toggle="modal" data-bs-target="#taskAddModal">New Tasks <i class="fa-solid fa-plus"></i></a>
                                                                </div>

                                                            </div>

                                                            <div class="col-12  mb-2">
                                                                <div class="box">
                                                                    <div class="row">

                                                                        <div class="col-8">
                                                                            <div class="left-box">
                                                                                <div class="task-name d-flex">
                                                                                    <i class="text-primary fa-solid fa-square-check"></i>
                                                                                    <label class="mx-1"><b>Task Completed Successfully</b></label>
                                                                                </div>
                                                                                <p class="px-md-3 px-0">Sign up for Medication training course for medicine.</p>

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-4">

                                                                            <div class="right-box">
                                                                                <a href="#" class="d-block text-end text-primary" data-bs-toggle="modal" data-bs-target="#taskUpdateModal"><i class="text-right fa-solid fa-ellipsis"></i></a>

                                                                                <label class="d-block text-end px-md-3 px-0">23, March 2024</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-12  mb-2">
                                                                <div class="box">

                                                                    <div class="row">

                                                                        <div class="col-8">
                                                                            <div class="left-box">
                                                                                <div class="task-name d-flex">
                                                                                    <i class="text-primary fa-solid fa-square-check"></i>
                                                                                    <label class="mx-1"><b>Task Completed Successfully</b></label>
                                                                                </div>
                                                                                <p class="px-md-3 px-0">Write down the todays behaviour of patients</p>

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-4">

                                                                            <div class="right-box">
                                                                                <a href="#" class="d-block text-end text-primary" data-bs-toggle="modal" data-bs-target="#taskUpdateModal"><i class="text-right fa-solid fa-ellipsis"></i></a>

                                                                                <label class="d-block text-end px-md-3 px-0">23, March 2024</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 mb-2">
                                                                <div class="box">

                                                                    <div class="row">

                                                                        <div class="col-8">
                                                                            <div class="left-box">
                                                                                <div class="task-name d-flex">
                                                                                    <i class="text-primary fa-solid fa-square-check"></i>
                                                                                    <label class="mx-1"><b>Task Completed Successfully</b></label>
                                                                                </div>
                                                                                <p class="px-md-3 px-0">Patients exercise</p>

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-4">

                                                                            <div class="right-box">
                                                                                <a href="#" class="d-block text-end text-primary" data-bs-toggle="modal" data-bs-target="#taskUpdateModal"><i class="text-right fa-solid fa-ellipsis"></i></a>

                                                                                <label class="d-block text-end px-md-3 px-0">23, March 2024</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>



                                                            <div class="col-12 mb-2">
                                                                <div class="box">

                                                                    <div class="row">

                                                                        <div class="col-8">
                                                                            <div class="left-box">
                                                                                <div class="task-name d-flex">
                                                                                    <i class="text-secondary fa-regular fa-square"></i> <label class="mx-1"><b>Task Not Completed</b></label>
                                                                                </div>
                                                                                <p class="px-md-3 px-0">Set up afternoon meeting.</p>

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-4">

                                                                            <div class="right-box">
                                                                                <a href="#" class="d-block text-end text-primary" data-bs-toggle="modal" data-bs-target="#taskUpdateModal"><i class="text-right fa-solid fa-ellipsis"></i></a>

                                                                                <label class="d-block text-end px-md-3 px-0">23, March 2024</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>










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

                                                            <div class="col-12 mt-3">
                                                                <ul class="appointment-list">
                                                                    <li class="time-slot time-parent-hour">
                                                                        <span>8:00 AM</span>
                                                                        <span><i class="fa-solid fa-circle"></i></span>
                                                                    </li>
                                                                    <li class="appointments ">
                                                                        <span class="long-span"></span>
                                                                        <ul>
                                                                            <li class="appointment" data-details="Jane Doe, 8:20-9:00 AM, Follow-up">
                                                                                <span class="appointment-short-details d-flex "> <i class="fa-solid fa-circle"></i> <span class="time time-child-hour">8:20</span> </span>


                                                                            </li>
                                                                            <li class="appointment" data-details="John Smith, 8:00-8:20 AM, Consultation">


                                                                                <span class="appointment-short-details d-flex ">

                                                                                    <i class="text-success fa-solid fa-circle"></i>
                                                                                    <span class="time time-child-hour"><b>8:00</b></span>
                                                                                    <span class="name mx-3">John Smith</span>

                                                                                    <span class="ms-auto">
                                                                                        <span class="mx-2 text-secondary">Upcoming </span>
                                                                                        <i class="border p-1 text-primary fa-solid fa-angle-down"></i>
                                                                                    </span>


                                                                                </span>


                                                                                <div class="appointment-details">






                                                                                    <ul>
                                                                                        <li><b>Patient:</b> John Smith</li>
                                                                                        <li><b>Time:</b> 8:00 AM - 8:20 AM</li>
                                                                                        <li><b>Purpose:</b> Consultation</li>
                                                                                        <li></li>
                                                                                        <li></li>
                                                                                    </ul>

                                                                                    <div class="edit-function d-flex align-items-center mt-1 border border-start-0  border-end-0  border-bottom-0 p-2">

                                                                                        <a class="border p-1 px-2 mx-1 text-danger"><i class="fa-regular fa-trash-can"></i></a>
                                                                                        <a class="border p-1 px-2 mx-1 btn-primary"><i class="fa-regular fa-user"></i></a>
                                                                                        <a class="border p-1 px-2 mx-1 btn-primary" data-bs-toggle="modal" data-bs-target="#updateAppointmentModal"><i class="fa-regular fa-pen-to-square"></i></a>
                                                                                        <a class="btn cust-bg-color1 ms-auto">Begin Appointement</a>
                                                                                    </div>
                                                                                </div>
                                                                            </li>

                                                                            <li class="appointment" data-details="Panna Doe, 8:20-9:00 AM, Follow-up">
                                                                                <span class="appointment-short-details d-flex "> <i class="fa-solid fa-circle"></i> <span class="time time-child-hour">8:30</span> </span>


                                                                            </li>

                                                                        </ul>
                                                                    </li>
                                                                    <li class="time-slot time-parent-hour">
                                                                        <span>9:00 AM</span>
                                                                        <span><i class="fa-solid fa-circle"></i></span>
                                                                    </li>
                                                                    <li class="appointments ">
                                                                        <span class="long-span"></span>
                                                                        <ul>
                                                                            <li class="appointment" data-details="Jane Doe, 8:20-9:00 AM, Follow-up">
                                                                                <span class="appointment-short-details d-flex "> <i class="fa-solid fa-circle"></i> <span class="time time-child-hour">9:00</span> </span>


                                                                            </li>
                                                                            <li class="appointment" data-details="John Smith, 9:30-10:00 AM, Consultation">


                                                                                <span class="appointment-short-details d-flex ">

                                                                                    <i class="text-success fa-solid fa-circle"></i>
                                                                                    <span class="time time-child-hour"><b>9:30</b></span>
                                                                                    <span class="name mx-3">Jack Will</span>

                                                                                    <span class="ms-auto">
                                                                                        <span class="mx-2 text-secondary">patients </span>
                                                                                        <i class="border p-1 text-primary fa-solid fa-angle-down"></i>
                                                                                    </span>


                                                                                </span>


                                                                                <div class="appointment-details">






                                                                                    <ul>
                                                                                        <li><b>Patient:</b> Jack Will</li>
                                                                                        <li><b>Time:</b> 9:30 AM - 10:00 AM</li>
                                                                                        <li><b>Purpose:</b> Consulting Meeting</li>
                                                                                        <li></li>
                                                                                        <li></li>
                                                                                    </ul>

                                                                                    <div class="edit-function d-flex align-items-center mt-1 border border-start-0  border-end-0  border-bottom-0 p-2">

                                                                                        <a class="border p-1 px-2 mx-1 text-danger"><i class="fa-regular fa-trash-can"></i></a>
                                                                                        <a class="border p-1 px-2 mx-1 btn-primary"><i class="fa-regular fa-user"></i></a>
                                                                                        <a class="border p-1 px-2 mx-1 btn-primary" data-bs-toggle="modal" data-bs-target="#updateAppointmentModal"><i class="fa-regular fa-pen-to-square"></i></a>
                                                                                        <a class="btn cust-bg-color1 ms-auto">Begin Appointement</a>
                                                                                    </div>
                                                                                </div>
                                                                            </li>



                                                                        </ul>
                                                                    </li>
                                                                    <li class="time-slot time-parent-hour">
                                                                        <span>10:00 AM</span>
                                                                        <span><i class="fa-solid fa-circle"></i></span>
                                                                    </li>
                                                                    <li class="appointments ">
                                                                        <span class="long-span"></span>
                                                                        <ul>
                                                                            <li class="appointment">
                                                                                <span class="appointment-short-details d-flex "> <i class="fa-solid fa-circle"></i> <span class="time time-child-hour">10:00</span> </span>


                                                                            </li>

                                                                            <li class="appointment">
                                                                                <span class="appointment-short-details d-flex "> <i class="fa-solid fa-circle"></i> <span class="time time-child-hour">10:30</span> </span>


                                                                            </li>

                                                                        </ul>
                                                                    </li>
                                                                    <li class="time-slot time-parent-hour">
                                                                        <span>11:00 AM</span>
                                                                        <span><i class="fa-solid fa-circle"></i></span>
                                                                    </li>
                                                                    <li class="appointments ">
                                                                        <span class="long-span"></span>
                                                                        <ul>
                                                                            <li class="appointment">
                                                                                <span class="appointment-short-details d-flex "> <i class="fa-solid fa-circle"></i> <span class="time time-child-hour">11:00</span> </span>


                                                                            </li>

                                                                            <li class="appointment">
                                                                                <span class="appointment-short-details d-flex "> <i class="fa-solid fa-circle"></i> <span class="time time-child-hour">11:30</span> </span>


                                                                            </li>

                                                                        </ul>
                                                                    </li>
                                                                </ul>

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
        </div>



    </section>



    <section class="modals">

        <div class="tasks-modal">



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
                                    <input type="text" class="form-control" id="taskname" required>

                                </div>


                                <div class="col-md-12">
                                    <label for="validationCustom04" class="form-label">Status</label>
                                    <select class="form-select" id="status" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option>Task Completed Successfully</option>
                                        <option>Task Not Completed</option>
                                    </select>

                                </div>
                                <div class="col-md-12">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="date" required>

                                </div>
                                <div class="col-12">
                                    <button class="btn cust-bg-color1" type="submit">Submit</button>
                                </div>
                            </form>


                        </div>

                    </div>
                </div>
            </div>



            <!-- Task Update -->
            <div class="modal fade" id="taskUpdateModal" tabindex="-1" aria-labelledby="taskUpdateModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Task Update</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">



                            <form class="row g-3">


                                <div class="col-md-12">
                                    <label for="taskname" class="form-label">Task name</label>
                                    <input type="text" disabled class="form-control" id="taskname" value="Set up afternoon meeting." required>

                                </div>


                                <div class="col-md-12">
                                    <label for="validationCustom04" class="form-label">Status</label>
                                    <select class="form-select" id="status" required>
                                        <option selected>Task Completed Successfully</option>
                                        <option>Task Not Completed</option>
                                    </select>

                                </div>
                                <div class="col-md-12">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="date" required>

                                </div>
                                <div class="col-12">
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                    <button class="btn cust-bg-color1" type="submit">Update</button>
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



                            <form class="row g-3">


                                <div class="col-md-12">
                                    <label for="taskname" class="form-label">Appointment name</label>
                                    <input type="text" class="form-control" id="taskname" required>

                                </div>

                                <div class="col-md-12">
                                    <label for="purpose" class="form-label">Purpose</label>
                                    <input type="text" class="form-control" id="purpose" required>

                                </div>



                                <div class="col-6">
                                    <label for="fromtime" class="form-label">Time Duration</label>
                                    <input type="time" class="form-control" id="fromtime" required>

                                </div>
                                <div class="col-6">
                                    <label for="totime" class="form-label mb-4"></label>
                                    <input type="time" class="form-control" id="totime" required>

                                </div>

                                <div class="col-12">
                                    <label for="fromtime" class="form-label">Type</label>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="Online">
                                        <label class="form-check-label" for="Online">
                                            Online
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="Offline" checked>
                                        <label class="form-check-label" for="Offline">
                                            Offline
                                        </label>
                                    </div>

                                </div>



                                <div class="col-12">
                                    <button class="btn cust-bg-color1" type="submit">Submit</button>
                                </div>
                            </form>


                        </div>

                    </div>
                </div>
            </div>




            <!-- Update Appointment -->
            <div class="modal fade" id="updateAppointmentModal" tabindex="-1" aria-labelledby="updateAppointmentModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Appointment</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">



                            <form class="row g-3">


                                <div class="col-md-12">
                                    <label for="taskname" class="form-label">Appointment name</label>
                                    <input type="text" class="form-control" id="taskname" required>

                                </div>

                                <div class="col-md-12">
                                    <label for="purpose" class="form-label">Purpose</label>
                                    <input type="text" class="form-control" id="purpose" required>

                                </div>



                                <div class="col-6">
                                    <label for="fromtime" class="form-label">Time Duration</label>
                                    <input type="time" class="form-control" id="fromtime" required>

                                </div>
                                <div class="col-6">
                                    <label for="totime" class="form-label mb-4"></label>
                                    <input type="time" class="form-control" id="totime" required>

                                </div>
                                <div class="col-12">
                                    <button class="btn cust-bg-color1" type="submit">Update</button>
                                </div>
                            </form>


                        </div>

                    </div>
                </div>
            </div>










        </div>


    </section>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="../js/main.js"></script>

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

    </script>

</body>

</html>
