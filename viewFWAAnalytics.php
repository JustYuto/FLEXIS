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
        function preventBack(){window.history.forward()};
        setTimeout("preventBack()",0);
            window.onunload=function(){null;}
    </script>
</head>
<body>
    <h1>FWA Analytics</h1>
    <div class="container">
        <table class="table" >
            <tbody style="border: 2px solid black;">
                <label><b>The number of department employees of each FWA status: </b></label>
                <tr style="border: 2px solid black;">
                    <th style="border: 2px solid black;" scope="col">Department</th>
                    <th style="border: 2px solid black;" scope="col">Flexi-hour</th>
                    <th style="border: 2px solid black;" scope="col">Work from home</th>
                    <th style="border: 2px solid black;" scope="col">Hybrid</th>
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
                        "<tr style='border: 2px solid black;'>
                            <td style='border: 2px solid black;'>".$row["deptName"]."</td>
                            <td style='border: 2px solid black;'>".$row["Flexi-hour"]."</td>
                            <td style='border: 2px solid black;'>".$row["Work from home"]."</td>
                            <td style='border: 2px solid black;'>".$row["Hybrid"]."</td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div> <br>
    <div class="container">
        <label><b>Select a department to check the number of FWA requests:</b></label>
            <form method="get" class="form-group row">
                <div class="col-sm-8">
                <select name="departmentID" id="departmentID">
                    <?php
                    require_once('config.php');
                    $sql = "SELECT departmentID, deptName FROM department";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }

                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['departmentID'] . "'>" . $row['deptName'] . "</option>";
                    }
                    ?>
                </select>
                </div>
                <div class="col-form-label">
                    <button class="btn btn-primary mb-4" type="submit">Submit</button>
                </div>
            </form>
        <table class="table">
            <tbody style="border: 2px solid black;">
                <?php
                if (isset($_GET['departmentID'])) {
                    $departmentID = $_GET['departmentID'];
                    $sql = "SELECT r.requestDate, COUNT(r.requestID) AS 'Number of FWA Requests'
                            FROM fwa_rquest r
                            JOIN employee e ON r.employeeID = e.employeeID
                            WHERE e.departmentID = '$departmentID'
                            GROUP BY r.requestDate";

                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }

                    echo "
                        <tr style='border: 2px solid black;'>
                            <th style='border: 2px solid black;' scope='col'>Request Date</th>
                            <th style='border: 2px solid black;' scope='col'>Number of FWA Requests</th>
                        </tr>
                    ";

                    while ($row = $result->fetch_assoc()) {
                        echo "
                            <tr style='border: 2px solid black;'>
                                <td style='border: 2px solid black;'>" . $row['requestDate'] . "</td>
                                <td style='border: 2px solid black;'>" . $row['Number of FWA Requests'] . "</td>
                            </tr>
                        ";
                    }
                }
                ?>
            </tbody>
        </table>
    </div> <br><br>
    <div class="container">
        <label><b>Daily Schedule Report </b></label>
        <form method="GET" action="" class="form-group row"> 
                <div class="col-sm-11">
                    <label for="start_date">Start Date:</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" required>
                </div>
                <div class="col-sm-11">
                    <label for="end_date">End Date:</label>
                    <input type="date" id="end_date" name="end_date" class="form-control" required><br>
                </div>
                <div class="col-sm-11">
                    <button type="submit" class="btn btn-primary form-control">Generate Report</button>
                </div>
        </form>
        <br>
        <?php
            // Check if the form has been submitted
            if(isset($_GET['start_date']) && isset($_GET['end_date'])) {
                // Get the start and end dates from the form
                $start_date = $_GET['start_date'];
                $end_date = $_GET['end_date'];

                // Connect to the database
                require_once('config.php');

                // Construct the SQL query
                $sql = "SELECT e.employeeID, d.departmentID, d.deptName, s.workLocation, s.workHours
                    FROM dailyschedule s
                    INNER JOIN employee e ON s.employeeID = e.employeeID
                    INNER JOIN department d ON e.departmentID = d.departmentID
                    WHERE s.date BETWEEN '$start_date' AND '$end_date'";

                // Execute the query
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid query: " . $conn->error);
                }

                echo "
                    <table class='table'>
                        <thead>
                            <tr style='border: 2px solid black;' scope='col'>
                                <th style='border: 2px solid black;' scope='col'>Department ID</th>
                                <th style='border: 2px solid black;' scope='col'>Department Name</th>
                                <th style='border: 2px solid black;' scope='col'>Employee ID</th>
                                <th style='border: 2px solid black;' scope='col'>Work Location</th>
                                <th style='border: 2px solid black;' scope='col'>Work Hours</th>
                            </tr>
                        </thead>
                        <tbody>
                ";

                while($row = $result->fetch_assoc()) {
                    echo "<tr style='border: 2px solid black;' scope='col'>";
                    echo "<td style='border: 2px solid black;' scope='col'>".$row["departmentID"]."</td>";
                    echo "<td style='border: 2px solid black;' scope='col'>".$row["deptName"]."</td>";
                    echo "<td style='border: 2px solid black;' scope='col'>".$row["employeeID"]."</td>";
                    echo "<td style='border: 2px solid black;' scope='col'>".$row["workLocation"]."</td>";
                    echo "<td style='border: 2px solid black;' scope='col'>".$row["workHours"]."</td>";
                    echo "</tr>";
                }
                
                echo "</tbody>";
                echo "</table>";

                // Close the database connection
                $conn->close();
            }
        ?>
    </div>

                
</body>
</html>
