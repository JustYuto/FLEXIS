<?php
    session_start();
    if (isset($_POST['home'])) {
        header("location:supervisorHome.php");
    }

    // Database configuration
    require_once('config.php');

    // Retrieve distinct dates from dailyschedule table
    $distinct_dates_query = "SELECT DISTINCT DATE_FORMAT(date, '%Y/%m') AS formatted_date FROM dailyschedule ORDER BY date DESC";
    $distinct_dates_result = $conn->query($distinct_dates_query);

    // Retrieve selected date (if any)
    $selected_date = $_GET['date'] ?? '';
    if (!empty($selected_date)) {
        // Filter dailyschedule table by selected date
        $filtered_query = "SELECT * FROM dailyschedule WHERE DATE_FORMAT(date, '%Y/%m') = '$selected_date'";
        $result = $conn->query($filtered_query);
    } else {
        // If no date is selected, retrieve all data from dailyschedule table
        $all_query = "SELECT * FROM dailyschedule ORDER BY date DESC";
        $result = $conn->query($all_query);
    }
?>

<!DOCTYPE html>
<html>
<?php include 'Component/head.php'; ?>
<?php include 'Component/header.php'; ?>

<body>
    <h1>Daily Schedule List</h1>
    <div class="container-fluid">
        <form method="GET" action="reviewDailySchedulePage.php">
            <div class="form-group">
                <div class="d-flex align-items-center">
                    <select id="date-dropdown" name="date" type="submit" class="form-control" style="height: 38px;">
                        <option value="" disabled selected>Select a date</option>
                        <?php
          while ($row = $distinct_dates_result->fetch_assoc()) {
            $date = $row['formatted_date'];
            $selected = ($date == $selected_date) ? 'selected' : '';
            echo "<option value=\"$date\" $selected>$date</option>";
          }
        ?>
                    </select>
                    <button type="submit" class="btn btn-primary ml-2" style="margin-top: -16px;">Filter</button>
                </div>
            </div>
        </form>



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
                // Display filtered results (if any)
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
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
                } else {
                    echo "<tr><td colspan=\"7\">No records found.</td></tr>";
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