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
                            <li class="nav-item"><a href="<?php echo $Patients_Page; ?>" class="nav-link"><i class="fa-solid fa-user-group"></i> Patients</a></li>
                            <li class="nav-item"><a href="<?php echo $Schedule_Page; ?>" class="nav-link"><i class="fa-solid fa-calendar"></i> Schedule</a></li>
                            <!--                            <li class="nav-item"><a href="#" class="nav-link"><i class="fa-regular fa-calendar-check"></i> Tasks</a></li>-->
                            <!--                            <li class="nav-item"><a href="#" class="nav-link"><i class="fa-regular fa-envelope"></i> Chats</a></li>-->
                            <li class="nav-item"><a href="<?php echo $Progress_Tracking_Page; ?>" class=" nav-link"><i class="fa-solid fa-chart-simple"></i> Progress Tracking</a></li>
                            <li class="nav-item"><a href="<?php echo $Education_And_Resources_Page; ?>" class="nav-link"><i class="fa-regular fa-calendar-check"></i> Education And Resource</a></li>
                            <li class="nav-item"><a href="<?php echo $Symptoms_Tracking_Page; ?>" class="nav-link"><i class="fa-solid fa-chart-simple"></i> Symptom Tracking</a></li>
                            <li class="nav-item"><a href="<?php echo $Emergency_Support; ?>" class="active-sidebar-button nav-link"><i class="fa-solid fa-file-waveform"></i> Emergency Support</a></li>
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
                    <div class="dash-summery support-summery">
                        <div class="container-fluid mt-3">

                            <label class="text-secondary mb-3">Emergency Support Service</label>


                            <div class="header-box d-flex align-items-center rounded bg-white mb-5">
                                <div>
                                    <h2>Welcome to Emergency <br>Support</h2>
                                    <a href="tel:555-555-5555" class="btn btn-sm btn-primary p-2 mt-3 ">Contact Us <i class="mx-1 fa-solid fa-headset"></i></a>
                                </div>
                                <div class="bg-overlay ms-auto "> <img src="img/supportbg.png" alt="supportimg" class="img-fluid" />
                                </div>
                            </div>
                            <div class="content-box rounded bg-white p-4 px-3">




                                <div class="info-box ">

                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="box">
                                                <div class="emergency-info">
                                                    <h3><i class="fas fa-phone-alt"></i> Emergency Hotlines</h3>
                                                    <a class="toggle-details text-secondary m-3 d-block" href="#">Read Article <i class="fa-solid fa-arrow-right-long"></i></a>
                                                    <div>
                                                        <p>If you are in immediate danger or crisis, please call one of the following hotlines:</p>
                                                        <ul>
                                                            <li>National Domestic Violence Hotline: <strong>1-800-799-SAFE (7233)</strong></li>
                                                            <li>National Suicide Prevention Lifeline: <strong>1-800-273-TALK (8255)</strong></li>
                                                            <li>Substance Abuse and Mental Health Services Administration (SAMHSA): <strong>1-800-662-HELP (4357)</strong></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="box">
                                                <div class="emergency-info">
                                                    <h3><i class="fas fa-hands-helping"></i> Crisis Intervention Teams</h3>
                                                    <a class="toggle-details text-secondary m-3 d-block" href="#">Read Article <i class="fa-solid fa-arrow-right-long"></i></a>
                                                    <div>
                                                        <p>Local crisis intervention teams are available to provide immediate assistance. Contact your local police department or mental health clinic for information about crisis intervention teams in your area.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="box">
                                                <div class="emergency-info">
                                                    <h3><i class="fas fa-hospital"></i> Nearby Mental Health Facilities</h3>
                                                    <a class="toggle-details text-secondary m-3 d-block" href="#">Read Article <i class="fa-solid fa-arrow-right-long"></i></a>
                                                    <div>
                                                        <p>Find nearby mental health facilities where you can seek professional help:</p>
                                                        <div class="facility mt-3">
                                                            <p>ABC Mental Health Clinic</p>
                                                            <address>123 Main Street, City, State, ZIP</address>
                                                            <p>Contact: (555) 123-4567</p>
                                                        </div>
                                                        <div class="facility mt-3">
                                                            <p>XYZ Counseling Center</p>
                                                            <address>456 Oak Avenue, City, State, ZIP</address>
                                                            <p>Contact: (555) 987-6543</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="box">
                                                <div class="emergency-info">
                                                    <h3><i class="fas fa-user-friends"></i> Handling Crisis Situations</h3>
                                                    <a class="toggle-details text-secondary m-3 d-block" href="#">Read Article <i class="fa-solid fa-arrow-right-long"></i></a>
                                                    <div>
                                                        <p>If you or someone else is in crisis, here are some steps to take:</p>
                                                        <ul>
                                                            <li>Stay calm and try to assess the situation.</li>
                                                            <li>Listen actively and show empathy.</li>
                                                            <li>Encourage the person to seek professional help.</li>
                                                            <li>If the situation is life-threatening, call emergency services immediately.</li>
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



    </section>





    <script src="../../js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script src="../../js/main.js"></script>
    <script>
       
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

</body>

</html>
