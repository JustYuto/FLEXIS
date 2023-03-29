<?php
    session_start();
    if(!isset($_SESSION["EmployeeID"]))
    {
        header("location:LoginPage.php");
    }
    if (isset($_POST['submission'])){
        header("location:submissionPage.php");
    }
    ?>

<!DOCTYPE html>
<html>
    <?php include 'Component/head.php'; ?>
    <?php 
    include 'Component/header.php'; 
    ?>
    <head>
        <script type="text/javascript">
            function preventBack(){window.history.forward()};
            setTimeout("preventBack()",0);
                window.onunload=function(){null;}
        </script>
    </head>
    <body>
        <h1>Welcome to the Employee Page</h1>
        <div class="container">
            
            <form action="employeeHome.php" method="post">
                <input type="submit" name="submission" value="Submit FWA Request">
            </form>        
        </div>
    </body>

</html>