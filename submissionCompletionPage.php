<?php
        if (isset($_POST['home'])){
            header("location:employeeHome.php");
        }

    ?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>

    <body>

        <h1>Thank you for your submission!</h1>
        <form action="submissionCompletionPage.php" method="post">
        <input type="submit" name="home" value="Home">
    </form>
</body>
</html>