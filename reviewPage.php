<?php
        if (isset($_POST['home'])){
            header("location:supervisorHome.php");
        }

    ?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <h1>FWA List</h1>
    <br>
    <table>
       <thead>
          <tr>
                <th>Employee ID</th>
                <th>Request ID</th>
                <th>Request Date</th>
                <th>Work Type</th>
                <th>Description</th>
                <th>Reason</th>
                <th>Status</th>
          </tr>
      </thead>
      <tbody>
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
                    <a href='acceptReq.php'>Accept</a>
                    <a href='rejectReq.php'>Reject</a>
                </td>
          </tr>";
        }
          ?>
      </tbody>
    </table>
    <form action="reviewPage.php" method="post">
        <input type="submit" name="home" value="home">
</body>
</html>

