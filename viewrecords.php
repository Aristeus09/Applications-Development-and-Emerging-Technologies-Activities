<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome to the User Dashboard</h2>
        <?php
        // Check if the user is logged in and display their username
        if (isset($_SESSION['username'])) {
            // Display the username stored in the session
            echo "<p class='greeting'>Hello, " . htmlspecialchars($_SESSION['username']) . "!</p>";
        } else {
            // If no session is set, greet as Guest
            echo "<p class='greeting'>Hello, Guest!</p>";
        }
        ?>
        <form action="displaydatausers.php" method="POST">
            <p>Click Button to View Records.</p>
            <input type="submit" value="View Records">
        </form>
		<form action="logout.php" method="POST">
            <input type="submit" value="Logout" class="button">
        </form>
    </div>
</body>
</html>



