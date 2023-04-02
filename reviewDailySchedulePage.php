<?php
    session_start();
        if (isset($_POST['home'])){
            header("location:supervisorHome.php");
        }
    ?>
<!DOCTYPE html>
<html>
<?php include 'Component/head.php'; ?>
<?php include 'Component/header.php'; ?>

<body>
    <h1>Daily Schedule List</h1>
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
                    <th scope="col">Add Comment?</th>
                </tr>

                <?php
            require_once('config.php');

            $sql =  "SELECT * FROM dailyschedule";
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
                    <td>
                    <button class=btn btn-primary><a href='addComment.php?DSID=".$row["dsId"]."'>Comment</a></button>
                    </td>
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