
<?php

$server_name ="localhost";
$db_username = "root";
$db_password ="";

$db_name ="eteeapuserdb2"; //database name
$conn = mysqli_connect($server_name, $db_username, $db_password, $db_name);
if(!$conn){
die("failed to connect to the server". mysqli_connect_error());
}else{
//echo "connected successfully";

}

if(isset($_POST['submit'])){
  $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];  // Password is plain text here

    // Prepare the query with a prepared statement to prevent SQL injection
    $query = "SELECT * FROM login WHERE username = ?"; 
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username); // 's' means string
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // If user is found
        session_start();
        
        $resultSet = mysqli_fetch_assoc($result);

        // Directly compare entered password with the password stored in the database
        if ($password == $resultSet["user_pass"]) {
            // Store the username in the session (do not store password!)
            $_SESSION["username"] = $resultSet["username"];

            // Close the DB connection
            mysqli_close($conn);

            // Successful login
            echo '<script language="Javascript">
                    alert("LOG-IN SUCCESSFUL!!!");
                    window.location.href = "viewrecords.php";
                  </script>';
            exit();
        } else {
            // Invalid password
            echo '<script language="Javascript">
                    alert("Invalid Username or Password!");
                    window.location.href = "login.php";
                  </script>';
        }
    } else {
        // No matching user found
        echo '<script language="Javascript">
                alert("Invalid Username or Password!");
                window.location.href = "login.php";
              </script>';
    }
} else {
    die("There was an error in the form submission.");
}

mysqli_close($conn);
?>



