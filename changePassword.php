<?php
	session_start();
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "flexis";
	
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if($conn===FALSE){
		die("Connection error:". $conn-> connect_error);    
	}

	if(!isset($_SESSION["EmployeeID"]))
    {
        header("location:LoginPage.php");
    }
	if (!empty($_POST['changePassword'])){
		$employee_id = $_SESSION["EmployeeID"];
		$fwastatus = mysqli_real_escape_string($conn, $_POST['fwastatus']);
		$current_password = mysqli_real_escape_string($conn, $_POST['current_password']);
		$new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
		$confirm_new_password = mysqli_real_escape_string($conn, $_POST['confirm_new_password']);

		if ($new_password == $confirm_new_password) {
			$sql = "SELECT * FROM employee WHERE EmployeeID='$employee_id' AND password='$current_password' ";
			$result = mysqli_query($conn, $sql);
			$count = mysqli_num_rows($result);

			if ($count > 0) {
				$sql = "UPDATE employee SET password='$new_password',FWAStatus='OLD' WHERE EmployeeID='$employee_id'";
				mysqli_query($conn, $sql);
				echo "<script>alert('Password updated successfully!');window.location.href = 'employeeHome.php';</script>";
			} else {
				echo "<script>alert('Current password does not match!')</script>";
			}
		} else {
			echo "<script>alert('New Password & Confirm New Password does not match!')</script>";
		}
	}

?>
<!DOCTYPE html>
<html>
	<?php include 'Component/head.php'; ?>
	<?php include 'Component/header.php'; ?>
	<head>
		<script type="text/javascript">
            function preventBack(){window.history.forward()};
            setTimeout("preventBack()",0);
                window.onunload=function(){null;}
        </script>
	</head>
	<body>
		<div class="_container"> 
			<h1>Change Password</h1>
			<div class="center">
			<form action="changePassword.php" method="post">
				<textarea type="text" hidden for="fwastatus" name="fwastatus">OLD</textarea>
				<label for="current-password">Current Password:</label><br>
				<input type="password" name="current_password" id="current_password">
				<br>
				<label for="new-password">New Password:</label><br>
				<input type="password" name="new_password" id="new_password">
				<br>
				<label for="confirm-new-password">Confirm New Password:</label>
				<div class="button-group">  
					<input type="password" name="confirm_new_password" id="confirm_new_password"><br><br>
					<input type="submit" name="changePassword" value="changePassword"><br>
				</div>
			</form>
			</div>
		</div>	
</body>

</html>