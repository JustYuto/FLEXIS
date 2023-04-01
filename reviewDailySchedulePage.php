<?php
    session_start();
        if (isset($_POST['home'])){
            header("location:supervisorHome.php");
        }

    ?>
<!DOCTYPE html>
<html>
<?php include 'Component/head.php'; ?>

<body>
    <div class="header-container">
        <?php include 'Component/header.php'; ?>
    </div>
    <h1>List of Daily Schedule</h1>
    <div class="container-fluid">
        <table class="table">
            <tbody>
                <tr>
                    <th scope="col">DailySchedule ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Work Location</th>
                    <th scope="col">Work Hour</th>
                    <th scope="col">Work Report</th>
                    <th scope="col">Supervisor Comment</th>
                    <th scope="col">Employee ID</th>
                </tr>

                <?php
            require_once('config.php');

            $sql =  "SELECT * FROM dailySchedule";
            $result = $conn->query($sql);

            if (!$result) {
                die("Invalid query: " . $conn->error);
            }

            while($row = $result -> fetch_assoc()){
                echo
                "<tr>
                    <td>".$row["dailyScheduleID"]."</td>
                    <td>".$row["dateWorked"]."</td>
                    <td>".$row["workLocation"]."</td>
                    <td>".$row["workhour"]."</td>
                    <td>".$row["workReport"]."</td>
                    <td>".$row["supervisorComment"]."</td>
                    <td>".$row["employeeID"]."</td>
                </tr>";
            }
            ?>
            </tbody>
        </table>
        <div class="container text-center">
            <form action="reviewDailySchedulePage.php" method="post">
                <input class="btn btn-secondary" type="submit" name="home" value="home">
        </div>

    </div>
</body>

</html>