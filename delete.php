<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: adduser.html");
    exit();
}

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
<form action="deleteprocess.php" method="POST" onsubmit="return confirmDelete();">
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
<th scope="col">Action</th>

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
<td><input type="checkbox" name="usersid[]" value="<?php echo $Row['id']; ?>"></td>
</tr>
<?php }
}
?>
</tbody>
    </table>
    <div class="form-container">
			<button type="button" class="button" onclick="window.location.href='displaydatausers.php'">Back</button>
            <button type="submit" class="button">Proceed to Delete</button>
        </div>
    </div> 
</form>
</div>
</div>
<script>
function confirmDelete() {
        var checkboxes = document.getElementsByName('usersid[]');
        var isChecked = false;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                isChecked = true;
                break;
            }
        }

     if (!isChecked) {
      alert("No users selected.");
      return false;
     }

     return confirm("Are you sure you want to delete the selected user(s)?");		
}
</script>
</body>
</html>