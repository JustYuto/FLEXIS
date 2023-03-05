<?php
include_once('config.php')
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>

    <body>
    <form action="selectDeptPage.php" method="post">
            <div class="container">
                <h1>New Employee Recording Page</h1>
                <p>Please enter a department ID</p>

                <label for="departmentID"><b>(DP***)</b></label>
                <input type="text" name="departmentID" required>
                </br>
                </br>

                <input type="submit" name="create" value="Submit">
            </div>

            <?php
            if (isset($_POST['create'])){
                $departmentID = $_POST['departmentID'];
            
                $sql = "INSERT INTO employee(departmentID) VALUES($departmentID)";
                mysqli_query($conn,$sql);
                
                header("location:recordNewEmpPage.php");
            }
            ?>
</body>
</html>
