<?php
$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "eteeapuserdb2";
$conn = mysqli_connect($server_name, $db_username, $db_password, $db_name);
if (!$conn) {
    die("Failed to connect to the server" . mysqli_connect_error());
}

if (isset($_POST['usersid'])) {
    $user_ids = $_POST['usersid'];

    $user_ids_str = implode(",", $user_ids);
    $query = "DELETE FROM login WHERE id IN ($user_ids_str)";

    if (mysqli_query($conn, $query)) {
         header("Location: displaydatausers.php");
        exit();
    } else {
        echo "Error deleting users: " . mysqli_error($conn);
    }
} else {
    echo "No users selected.";
}

mysqli_close($conn);
?>