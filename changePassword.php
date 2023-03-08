<!-- This file is not recognized as PHP file so that Component files cannot be loaded  -->

<!DOCTYPE html>
<html>
	<?php include 'Component/head.php'; ?>
	<?php include 'Component/header.php'; ?>

	<body>
		<div class="_container"> 
			<h1>Change Password</h1>
			<!-- <?php
			// Check if the EmployeeID parameter is set
			if (isset($_GET["EmployeeID"])) {
				$EmployeeID = $_GET["EmployeeID"];
				echo "<form action='changePassword.php?EmployeeID=$EmployeeID' method='post'>";
			} else {
				echo "<form action='changePassword.php' method='post'>";
			}
			?> -->
			<div class="center">
			<form action="changePassword.php" method="post">
				<label for="current-password">Current Password:</label><br>
				<input type="password" name="current-password" id="current-password">
				<br>
				<label for="new-password">New Password:</label><br>
				<input type="password" name="new-password" id="new-password">
				<br>
				<label for="confirm-new-password">Confirm New Password:</label>
				<div class="button-group">  
					<input type="password" name="confirm-new-password" id="confirm-new-password"><br><br>
					<input type="submit" name="changePassword" value="Change Password"><br>
				</div>
			</form>
			</div>
		</div>	
</body>

</html>

<?php
if (isset($_POST['changePassword'])){
    header("location:employeeHome.php");
}

?>