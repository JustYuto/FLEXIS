<?php
        if (isset($_POST['submission'])){
            header("location:submissionPage.php");
        }

    ?>

<!DOCTYPE html>
<html>
    <?php include 'Component/head.php'; ?>
    <?php include 'Component/header.php'; ?>
    <body>
        <h1>Welcome to the Employee Page</h1>
        <div class="container">
            
            <form action="employeeHome.php" method="post">
                <input type="submit" name="submission" value="Submit FWA Request">
            </form>        
        </div>
    </body>

</html>