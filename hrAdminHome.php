<?php
        if (isset($_POST['record'])){
            header("location:recordNewEmpPage.php");
        }

    ?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>

    <body>
        <h1>Welcome to the Supervisor Page</h1>
        <form action="hrAdminHome.php" method="post">
        <input type="submit" name="record" value="Record New Employee">
</body>
</html>