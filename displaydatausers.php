
<?php
$server_name ="localhost";
$db_username = "root";
$db_password ="";
$db_name ="eteeapuserdb2";
$conn = mysqli_connect($server_name, $db_username, $db_password, $db_name);
if(!$conn){
die("failed to connect to the server". mysqli_connect_error());
}else{
//echo "connected successfully";
}
?>

<html>
	<head>
    <link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>
<h3 align="center">SAMPLE USERS</h3>
<div class="display-users-form">
<div class="container">
<form action="delete.php" method="POST">
<div class="tableContainer">
<table border=1 align=center>
<tr>
<th scope="col">User ID </th>
<th scope="col">UserName</th>
<th scope="col">Password</th>
<th scope="col">First Name</th>
<th scope="col">Middle Name</th>
<th scope="col">Last Name</th>
<th scope="col">Gender</th>
<th scope="col">Email</th>

</tr>
<tbody>
<?php
$query = "SELECT * FROM login";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
while ($Row = mysqli_fetch_assoc($result)) {
?>
<tr>
<td><?php echo $Row["id"]; ?></td>
<td><?php echo $Row["username"]; ?></td>
<td><?php echo $Row["user_pass"]; ?></td>
<td><?php echo $Row["first_name"]; ?></td>
<td><?php echo $Row["middle_name"]; ?></td>
<td><?php echo $Row["last_name"]; ?></td>
<td><?php echo $Row["sex"]; ?></td>
<td><?php echo $Row["email"]; ?></td>
</tr>
<?php }
}
?>
</tbody>
</table>    
</div> 
<div class="buttons-container">
    <button type="button" class="button" onclick="window.location.href='adduser.html'">Add User</button>
    
    <button type="submit" class="button">Delete a User</button>
</div>
</form>
</div>
</div>
</body>
</html>
