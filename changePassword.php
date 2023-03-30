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
        <div class="card-body">
            <form class="text-center" action="changePassword.php" method="post">
                <label class="card-text" for="current-password">Current Password:</label>
                <input class="form-control" type="password" name="current-password" id="current-password">
                <label class="card-text" for="new-password">New Password:</label>
                <input class="form-control" type="password" name="new-password" id="new-password">
                <label class="card-text" for="confirm-new-password">Confirm New Password:</label>
                <input class="form-control" type="password" name="confirm-new-password" id="confirm-new-password">
                <div class="button-group">

                    <input class="btn btn-secondary" type="submit" name="changePassword" value="Change Password">
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