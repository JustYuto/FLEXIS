<!-- This file is not recognized as PHP file so that Component files cannot be loaded  -->


<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "flexis";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if($conn===FALSE)
{
	die("Connection error");
}

?>
	<?php include 'Component/head.php'; ?>
	<?php include 'Component/header.php'; ?>
<!DOCTYPE html>
<html>


	<body>
		<div class="container"> 
			<h1>Change Password</h1>
			<?php
			// Check if the EmployeeID parameter is set
			if (isset($_GET["EmployeeID"])) {
				$EmployeeID = $_GET["EmployeeID"];
				echo "<form action='changePassword.php?EmployeeID=$EmployeeID' method='post'>";
			} else {
				echo "<form action='changePassword.php' method='post'>";
			}
			?>
			<form class="text-center" action="changePassword.php">
				<label for="current-password">Current Password:</label><br>
				<input class="form-control" type="password" name="current-password" id="current-password">
				<br>
				<label for="new-password">New Password:</label><br>
				<input class="form-control" type="password" name="new-password" id="new-password">
				<br>
				<label for="confirm-new-password">Confirm New Password:</label>
				<div class="button-group">  
					<input class="form-control" type="password" name="confirm-new-password" id="confirm-new-password"><br><br>
					<input type="submit" value="Change Password"><br>
				</div>
			</form>
		</div>	
</body>

</html>
