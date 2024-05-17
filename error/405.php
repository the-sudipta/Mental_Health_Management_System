<?php


global $routes;
global $system_routes;
require '../routes.php';


$go_back_to = $routes['/']

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>405 Method Not Allowed</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 100px;
        }
        .jumbotron {
            background-color: #e9ecef;
            padding: 30px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="jumbotron text-center">
                <h1 class="display-4">405 <br>Method Not Allowed</h1>
                <p class="lead">Oops! The method specified in the request is not allowed for the requested resource.</p>
                <p>Please go back to the <a href="<?php echo $go_back_to; ?>" class="btn btn-primary">Homepage</a> and try again.</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
