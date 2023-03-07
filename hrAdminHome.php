<?php
        if (isset($_POST['record'])){
            header("location:recordNewEmpPage.php");
        }

    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>HR admin Home Page</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body class="container">
        <h1>Welcome to the HR admin Page</h1>
        <form action="hrAdminHome.php" method="post">
        <input id = submit type="submit" name="record" value="Record New Employee">
</body>
</html>