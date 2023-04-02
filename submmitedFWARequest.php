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
                    <th scope="col">Request ID</th>
                    <th scope="col">Request Date</th>
                    <th scope="col">Work Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Status</th>
                    <th scope="col">Supervisor comments</th>
                </tr>

                <?php
            require_once('config.php');
            $employee_id = $_SESSION["EmployeeID"];
            $sql =  "SELECT * FROM fwa_rquest WHERE employeeID = '$employee_id'";
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
                    <td>".$row["comment"]."</td>
                </tr>";
            }
            ?>
            </tbody>
        </table>
        <div class="container text-center">
            <form action="submmitedFWARequest.php" method="post">
                <input class="btn btn-secondary" type="submit" name="home" value="Home" formnovalidate>
            </form>
        </div>
    </div>
</body>

</html>