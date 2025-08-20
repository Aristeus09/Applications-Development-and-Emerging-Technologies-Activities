<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: viewrecords.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<section>
<form method="POST" action="loginprocess.php">
<div >
<h2 align="center"><label class="form-label">User Log-in</label></h2>
</div>
<div >
<label class="form-label">Username:</label>
<input type="text" name="username" required="yes">
</div>
<br>
<div >
<label class="form-label">Password:</label>
<input type="password" class="form-control" name="password" required="yes">
</div>
<br>
<!-- Submit button -->
<button type="Submit" name="submit" class="button">Submit</button>
<br><br>
<!-- Register button with same design -->
<button type="button" class="button" onclick="window.location.href='adduser.html'">Register</button>
</button>
</form>
</div>
</div>
</section>
</body>
</html>