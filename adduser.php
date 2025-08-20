<?php
session_start(); // Start the session

// If the request method is not POST, redirect to the form page
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: adduser.html");
    exit();
}

// Database connection
$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "eteeapuserdb2";
$conn = mysqli_connect($server_name, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Failed to connect to the server: " . mysqli_connect_error());
}


$username = $_POST['uname'];
$password = $_POST['pword'];
$last = $_POST['lname'];
$first = $_POST['fname'];
$middle = $_POST['mname'];
$sex = $_POST['gender'];
$email = $_POST['email'];

$query = "SELECT * FROM login WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $error_message = "The email address is already in use. Please choose a different email.";
    header("Location: adduser.html");
    exit();
} else {
    // Insert data into the database if the email does not exist
    $query = "INSERT INTO login (username, user_pass, last_name, first_name, middle_name, sex, email) 
              VALUES ('$username', '$password', '$last', '$first', '$middle', '$sex', '$email')";

    if (mysqli_query($conn, $query)) {
        header("Location: adduser_success.php");
        exit();
    } else {
        $error_message = "There was an issue adding your record. Please try again.";
        header("Location: adduser.html");
        exit();
    }
}

// Close database connection
mysqli_close($conn);
?>