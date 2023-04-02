<?php
    session_start();
        if (isset($_POST['home'])){
            header("location:supervisorHome.php");
        }
    ?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<?php include 'Component/head.php'; ?>
<?php include 'Component/header.php'; ?>

<body>
    <h1>FWA List</h1>
    <div class="container-fluid">
        <table class="table">
            <tbody>
                <tr>
                    <th scope="col">Employee ID</th>
                    <th scope="col">Request ID</th>
                    <th scope="col">Request Date</th>
                    <th scope="col">Work Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Status</th>
                </tr>

                <?php
            require_once('config.php');

            $sql =  "SELECT * FROM fwa_rquest WHERE Status = 'Pending';";
            $result = $conn->query($sql);

            if (!$result) {
                die("Invalid query: " . $conn->error);
            }

            while($row = $result -> fetch_assoc()){
                echo
                "<tr>
                    <td>".$row["employeeID"]."</td>
                    <td>".$row["requestID"]."</td>
                    <td>".$row["requestDate"]."</td>
                    <td>".$row["workType"]."</td>
                    <td>".$row["description"]."</td>
                    <td>".$row["reason"]."</td>
                    <td>".$row["status"]."</td>
                    <td>
                        <button class=btn btn-primary><a href='acceptReq.php?reqID=".$row["requestID"]."&empID=".$row["employeeID"]."&workType=".$row["workType"]."'>Accept</a></button>
                        <button class=btn btn-primary><a href='rejectReq.php?reqID=".$row["requestID"]."&empID=".$row["employeeID"]."'>Reject</a></button>
                    </td>
                </tr>";
            }
            ?>
            </tbody>
        </table>
        <div class="container text-center">
            <form action="reviewPage.php" method="post">
                <input class="btn btn-secondary" type="submit" name="home" value="home">
        </div>
    </div>

</body>

</html>