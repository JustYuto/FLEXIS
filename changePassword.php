<?php
	session_start();
	include_once 'config.php';
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

<head>
    <script type="text/javascript">
    function preventBack() {
        window.history.forward()
    };
    setTimeout("preventBack()", 0);
    window.onunload = function() {
        null;
    }
    </script>
</head>

<body>
    <div class="header-container">
        <?php include 'Component/header.php'; ?>
    </div>
    <div class="container-fluid">
        <h1>Change Password</h1>
        <div>
            <form class="text-center" action="changePassword.php" method="post">
                <div class="card-body">
                    <textarea type="text" hidden for="fwastatus" name="fwastatus">OLD</textarea>
                    <label class="card-text" for="current-password">Current Password:</label>
                    <input class="form-control" type="password" name="current_password" id="current_password">

                    <label class="card-text" for="new-password">New Password:</label>
                    <input class="form-control" type="password" name="new_password" id="new_password">

                    <label class="card-text" for="confirm-new-password">Confirm New Password:</label>
                    <input class="form-control" type="password" name="confirm_new_password" id="confirm_new_password">
                    <div class="button-group">
                        <input class="btn btn-secondary" type="submit" name="changePassword" value="Change Password">
                    </div>
                </div>

            </form>
        </div>
    </div>
</body>

</html>