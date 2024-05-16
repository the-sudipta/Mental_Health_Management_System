<?php

echo '<h1>CUSTOM INTERNAL SERVER ERROR 500</h1>';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>
<body>
    <h1>Error</h1>
    <p>An error occurred:</p>
    <?php
    // Check if the error message is set in the URL query parameter
    if (isset($_GET['error_message'])) {
        // Retrieve and display the error message
        $error_message = $_GET['error_message'];
        echo "<p>Error message: $error_message</p>";
    } else {
        echo "<p>Error message not found.</p>";
    }
    ?>
</body>
</html>
