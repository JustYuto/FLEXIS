<?php
    session_start();
    if(!isset($_SESSION["EmployeeID"]))
    {
        header("location:LoginPage.php");
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
    <h1>FWA Analytics</h1>
    <div class="container-fluid">
        <table class="table">
            <tbody>
                <h5>The number of department employees of each FWA status</h5>
                <tr>
                    <th scope="col">Department</th>
                    <th scope="col">Flexi-hour</th>
                    <th scope="col">Work from home</th>
                    <th scope="col">Hybrid</th>
                </tr>

                <?php
                require_once('config.php');
                $count = 0;
                $sql =  "SELECT d.deptName, 
                            COUNT(CASE WHEN e.FWAStatus = 'Flexi-hour' THEN 1 ELSE NULL END) AS 'Flexi-hour', 
                            COUNT(CASE WHEN e.FWAStatus = 'Work from home' THEN 1 ELSE NULL END) AS 'Work from home', 
                            COUNT(CASE WHEN e.FWAStatus = 'Hybrid' THEN 1 ELSE NULL END) AS 'Hybrid' 
                        FROM employee e 
                        JOIN department d ON e.departmentID = d.departmentID
                        WHERE e.departmentID IN ('DP001', 'DP002', 'DP003', 'DP004', 'DP005') 
                        GROUP BY d.deptName";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid query: " . $conn->error);
                }

                while($row = $result -> fetch_assoc()){
                    echo
                        "<tr>
                            <td>".$row["deptName"]."</td>
                            <td>".$row["Flexi-hour"]."</td>
                            <td>".$row["Work from home"]."</td>
                            <td>".$row["Hybrid"]."</td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="container-fluid">
        <h5>Select a department to check the number of FWA requests</h5>
        <form method="POST" class="row">
            <div class="container">
                <div>
                    <select class="control-label form-control" name="departmentID id=" departmentID">
                        <?php
                        session_start();
                        require_once('config.php');
                        $employeeID = $_SESSION["EmployeeID"];
                        $sql = "SELECT d.departmentID, d.deptName FROM employee e JOIN department d ON e.departmentID = d.departmentID WHERE e.employeeID = '".$employeeID."'";
                        $result = $conn->query($sql);
                        if (!$result) {
                            die("Invalid query: " . $conn->error);
                        }
                        while($row = $result->fetch_assoc()) {
                            $deptName = $row['deptName'];
                            echo "<option value='" . $row['departmentID'] . "'>" . $row['deptName'] . "</option>";
                        }
                        ?>
                    </select>
                    <div>
                        <button class="btn btn-secondary mx-auto mt-2" type="submit">Submit</button>
                    </div>
                </div>
        </form>


        <table class="table">
            <tbody>
                <?php
                require_once('config.php');
                if(isset($_POST['departmentID'])) {
                    $departmentID = $_POST['departmentID'];

                    $sql = "SELECT COUNT(DISTINCT r.employeeID) AS numRequests, r.requestDate
                            FROM fwa_rquest r
                            JOIN employee e ON r.employeeID = e.employeeID
                            WHERE e.departmentID = '".$departmentID."'
                            GROUP BY r.requestDate";

                    $result = $conn->query($sql);
                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }
                    echo "<tr><th>Request Date</th><th>Number of Requests</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo"
                        ";
                        echo "<tr>";
                        echo "<td>" . $row['requestDate'] . "</td>";
                        echo "<td>" . $row['numRequests'] . "</td>";
                        echo "</tr>";
                    }
                }
            ?>
            </tbody>
        </table>
    </div>
</body>

</html>