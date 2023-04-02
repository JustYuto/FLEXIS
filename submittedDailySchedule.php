<?php
    session_start();
    include_once 'config.php';
    if(!isset($_SESSION["EmployeeID"]))
    {
        header("location:LoginPage.php");
    }
    if (isset($_POST['home'])){
        header("location:employeeHome.php");
    }

?>
<!DOCTYPE html>
<html>
<?php include 'Component/head.php'; ?>
<?php include 'Component/header.php'; ?>

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
    <h1>Your FWA Request</h1>
    <div class="container-fluid">
        <table class="table">
        <tbody>
                <tr>
                    <th scope="col">Employee ID</th>
                    <th scope="col">DailySchedule ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Work Location</th>
                    <th scope="col">Work Hour</th>
                    <th scope="col">Work Report</th>
                    <th scope="col">Supervisor comments</th>
                </tr>

                <?php
            require_once('config.php');
            $employee_id = $_SESSION["EmployeeID"];
            $sql =  "SELECT * FROM dailyschedule WHERE employeeID = '$employee_id'";
            $result = $conn->query($sql);

            if (!$result) {
                die("Invalid query: " . $conn->error);
            }

            while($row = $result -> fetch_assoc()){
                echo
                "<tr>
                    <td>".$row["employeeID"]."</td>
                    <td>".$row["dsId"]."</td>
                    <td>".$row["date"]."</td>
                    <td>".$row["workLocation"]."</td>
                    <td>".$row["workHours"]."</td>
                    <td>".$row["workReport"]."</td>
                    <td>".$row["supervisorComments"]."</td>
                </tr>";
            }
            ?>
            </tbody>
        </table>
        <div class="container text-center">
            <form action="" method="post">
                <input class="btn btn-secondary" type="submit" name="home" value="home">
        </div>
    </div>
</body>

</html>