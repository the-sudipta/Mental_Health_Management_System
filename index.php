<?php
// Check if the requested file does not exist

session_start();
global $system_routes, $routes;
require './routes.php';
require './utils/system_functions.php';

$error_404 = $system_routes['error_404'];
$error_500 = $system_routes['error_500'];
$login_page = $routes['login'];

if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'])) {
    // Redirect to the custom 404 page
    navigate($error_404);
    exit();
}

if (http_response_code() == 500) {
    // Redirect to the custom 500 page

    navigate($error_500);
    exit();
}


navigate($login_page);

//else{
//
//}