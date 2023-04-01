<?php
session_start();
include_once 'config.php';
if(!isset($_SESSION["EmployeeID"]))
    {
        header("location:LoginPage.php");
    }

if (isset($_POST['create'])) {
    $departmentID = $_POST['departmentID'];
    $departmentName = $_POST['departmentName'];
    $employeeID = $_POST['employeeID'];
    $supervisorID = $_POST['supervisorID'];
    $password = $_POST['employeeID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $FWAStatus = 'New';

    
    if (empty($_POST['supervisorID'])) {
        $sql = "INSERT INTO employee 
        VALUES ('$employeeID', '$password', '$name', '$email', '$position', '$FWAStatus', '$departmentID', NULL)";
        $sql2 = "UPDATE department SET employeeID='$employeeID' WHERE departmentID='$departmentID'";
    } else {
        $sql = "INSERT INTO employee 
        VALUES ('$employeeID', '$password', '$name', '$email', '$position', '$FWAStatus', '$departmentID', '$supervisorID')";
    }
    
    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql2);
    
    header("Location: recordCompletionPage.php");
    exit();
}

if (isset($_POST['cancel'])) {
    header("Location: employeeHome.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <?php include 'Component/head.php'; ?>
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
        <h1>New Employee recording Page</h1>
        <div class="form-horizontal">
            <form action="recordNewEmpPage.php" method="POST">
                <div class="form-group">
                    <label class="control-label" for="departmentID">Department ID</label>
                    <div>
                        <select id="departmentID" name="departmentID">
                            <option value="DP001">DP001</option>
                            <option value="DP002">DP002</option>
                            <option value="DP003">DP003</option>
                            <option value="DP004">DP004</option>
                            <option value="DP005">DP005</option>
                        </select>

                        <p id="departmentName"></p>

                        <script>
                        const departmentSelect = document.getElementById("departmentID");
                        const departmentName = document.getElementById("departmentName");

                        departmentSelect.addEventListener("change", function() {
                            if (departmentSelect.value === "DP001") {
                                departmentName.textContent = "Human Resources";
                            } else if (departmentSelect.value === "DP002") {
                                departmentName.textContent = "IT Department";
                            } else if (departmentSelect.value === "DP003") {
                                departmentName.textContent = "Account Department";
                            } else if (departmentSelect.value === "DP004") {
                                departmentName.textContent = "Business Department";
                            } else {
                                departmentName.textContent = "Marketing Department"
                            }
                        });
                        </script>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="employeeID">Employee ID</label>
                    <div>
                        <input class="form-control" type="text" name="employeeID" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="supervisorID">Supervisor ID</label>
                    <div>
                        <input class="form-control" type="text" name="supervisorID">
                    </div>
                </div>
                <div>
                    <label class="control-label" for="name">Name</label>
                    <div>
                        <input class="form-control" type="text" name="name" required>
                    </div>
                </div>
                <div>
                    <label class="control-label" for="email">Email</label>
                    <div>
                        <input class="form-control" type="email" name="email" required>
                    </div>
                </div>
                <div>
                    <label class="control-label" for="position">Position</label>
                    <div>
                        <select id="position" name="position">
                            <option value="Employee">Employee</option>
                            <option value="Supervisor">Supervisor</option>
                        </select>
                    </div>
                </div>
                <div class="container text-center">
                    <input class="btn btn-secondary" type="submit" name="create" value="Submit">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<style>
</style>