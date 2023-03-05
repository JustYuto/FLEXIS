<?php
require_once('config.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>

<body>

    <div>
        <form action="submissionPage.php" method="post">
            <div class="container">
                <h1>FWA Request Submission Page</h1>
                <p>Please fill up the request</p>

                <label for="employeeID"><b>Employee ID (EM***)</b></label>
                <input type="text" name="employeeID" required>
                </br>
                </br>

                <label for="requestID"><b>Request ID (RQ***)</b></label>
                <input type="text" name="requestID" required>
                </br>
                </br>

                <label for="requestDate"><b>Request Date (DD/MM/YYYY)</b></label>
                <input type="date" name="requestDate" required>
                </br>
                </br>
                <label for="workType"><b>Work Type</b></label>
                <input type="text" name="workType" required>
                </br>
                </br>

                <label for="description"><b>Description</b></label>
                <input type="text" name="description" required>
                </br>
                </br>
                <label for="reason"><b>Reason</b></label>
                <input type="text" name="reason" required>
                </br>
                </br>
                <input type="submit" name="create" value="Submit">
            </div>
            <?php
            if (isset($_POST['create'])){

                $requestID = $_POST['requestID'];
                $requestDate = $_POST['requestDate'];
                $workType = $_POST['workType'];
                $description = $_POST['description'];
                $reason = $_POST['reason'];
                $status = "Pending";
                $comment = NULL;
                $employeeID = $_POST['employeeID'];
            
                $sql = "INSERT INTO fwa_rquest(requestID, requestDate, workType, description, reason, status, comment, employeeID) VALUES($requestID, $requestDate, $workType, $description, $reason, $status, $comment, $employeeID)";
                mysqli_query($conn,$sql);
                
                header("location:submissionCompletionPage.php");
            }
            ?>
        </form>

    </div>

</body>
</html>
