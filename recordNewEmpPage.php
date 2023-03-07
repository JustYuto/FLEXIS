<?php
include_once('config.php')
?>

<!DOCTYPE html>
<html>
    <head>
        <title>New Employee recording Page</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body class="container">
        <h1>New Employee recording Page</h1>
        <p>Please fill up the fields</p>
        <div class="center">
        <form action="recordNewEmpPage.php" method="POST">
            <div>
                <label for="departmentID"><b>Department ID (DP***)</b></label>
                <input type="text" name="departmentID" required>
            </div>
            <div>
                <label for="employeeID"><b>Employee ID (EM***)</b></label>
                <input type="text" name="employeeID" required>
            </div>
            <div>
            <label for="supervisorID"><b>Supervisor ID (EM***)</b></label>
                <input type="text" name="supervisorID" required>
            </div>
            <div>
                <label for="password"><b>Password</b></label>
                <input type="text" name="password" required>
            </div>
            <div>
                <label for="name"><b>Name</b></label>
                <input type="text" name="name" required>
            </div>
            <div>
                <label for="email"><b>Email</b></label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label for="address"><b>Address</b></label>
                <input type="text" name="address" required>
            </div>
            <div>
                <label for="position"><b>Position</b></label>
                <input type="text" name="position" required>
            </div>
            <div>
                <label for="FWAStatus"><b>FWA Status</b></label>
                <input type="text" name="FWAStatus" required>
            </div><br>
            <div>
                <input type="submit" name="create" value="Submit">
            </div>  
            <?php
            if (isset($_POST['create'])){
                $departmentID = $_POST['departmentID'];
                $employeeID = $_POST['employeeID'];
                $supervisorID = $_POST['supervisorID'];
                $password = $_POST['password'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $position = $_POST['position'];
                $FWAStatus = $_POST['FWAStatus'];
            
                $sql = "INSERT INTO employee(departmentID, employeeID, supervisorID, password, name, email, position, FWAStatus) VALUES($departmentID, $employeeID, $supervisorID, $password, $name, $email, $position, $FWAStatus)";
                mysqli_query($conn,$sql);
                
                header("location:recordCompletionPage.php");
            }
            ?>
        </form>
        </div>
    </body>
</html>