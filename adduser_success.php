<!doctype html>
<html lang="en">
<head>
    <title>Success - Record Added</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="adduser-page-php">

<div class="success-container">
    <h2>RECORD ADDED SUCCESSFULLY!!!</h2>
    <p class="message message-success">Your account has been created successfully.</p>
    <p class="redirect-message">You will be redirected to the login page shortly.</p>

    <!-- Redirect after 3 seconds to login page -->
    <a href="login.php" class="button">Go to Login Page</a>
</div>

<?php
// Redirect to the login page after 3 seconds
header("refresh:3;url=login.php");
exit(); // Ensure no further code is executed
?>

</body>
</html>