<?php
include_once('config.php')
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include 'Component/head.php'; ?>
    </head>
    <?php include 'Component/header.php'; ?>
    <body>
        <div class="_container">
            <h1>New Employee recording Page</h1>
            <p>Please fill up the fields</p>
            <div class="form-horizontal">
                <form action="recordNewEmpPage.php" method="POST">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="departmentID">Department ID</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="departmentID" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="employeeID">Employee ID</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="employeeID" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="supervisorID">Supervisor ID</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="supervisorID" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="password">Password</label>
                        <div class="col-sm-10">
                            <input class="form-control"type="text" name="password" required>
                        </div>
                    </div>
                    <div>
                        <label class="col-sm-3 control-label" for="name">Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="name" required>
                        </div>
                    </div>
                    <div>
                        <label class="col-sm-3 control-label" for="email">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="email" name="email" required>
                        </div>
                    </div>
                    <div>
                        <label class="col-sm-3 control-label" for="address">Address</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="address" required>
                        </div>
                    </div>
                    <div>
                        <label class="col-sm-3 control-label" for="position">Position</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="position" required>
                        </div>
                    </div>
                    <div>
                        <label class="col-sm-3 control-label" for="FWAStatus">FWA Status</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="FWAStatus" required>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <input class="btn btn-secondary" type="submit" name="create" value="Submit">
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
        </div>
    </body>
</html>