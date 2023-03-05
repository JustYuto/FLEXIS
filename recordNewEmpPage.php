<?php
include_once('config.php')
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>

    <body>
<div>
        <form action="recordNewEmpPage.php" method="post">
            <div class="container">
                <h1>New Employee recording Page</h1>
                <p>Please fill up the fields</p>
                <label for="departmentID"><b>Department ID (DP***)</b></label>
                <input type="text" name="departmentID" required>
                </br>
                </br>

                <label for="employeeID"><b>Employee ID (EM***)</b></label>
                <input type="text" name="employeeID" required>
                </br>
                </br>

                <label for="supervisorID"><b>Supervisor ID (EM***)</b></label>
                <input type="text" name="supervisorID" required>
                </br>
                </br>

                <label for="password"><b>Password</b></label>
                <input type="text" name="password" required>
                </br>
                </br>

                <label for="name"><b>Name</b></label>
                <input type="text" name="name" required>
                </br>
                </br>
                <label for="email"><b>Email Address</b></label>
                <input type="email" name="email" required>
                </br>
                </br>

                <label for="position"><b>Position</b></label>
                <input type="text" name="position" required>
                </br>
                </br>
                <label for="FWAStatus"><b>FWA Status</b></label>
                <input type="text" name="FWAStatus" required>
                </br>
                </br>
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
            
                $sql = "INSERT INTO fwa_rquest(departmentID, employeeID, supervisorID, password, name, email, position, FWAStatus) VALUES($departmentID, $employeeID, $supervisorID, $password, $name, $email, $position, $FWAStatus)";
                mysqli_query($conn,$sql);
                
                header("location:recordCompletionPage.php");
            }
            ?>
        </form>

    </div>
    </body>
</html>