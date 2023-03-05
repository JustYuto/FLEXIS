<?php
        if (isset($_POST['submission'])){
            header("location:submissionPage.php");
        }

    ?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>

    <body>
        <h1>Welcome to the Employee Page</h1>
        <form action="employeeHome.php" method="post">
        <input type="submit" name="submission" value="Submit FWA Request">
    </form>
</body>
</html>
