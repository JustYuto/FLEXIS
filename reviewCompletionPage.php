<?php
        if (isset($_POST['home'])){
            header("location:supervisorHome.php");
        }

    ?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>

    <body>

        <h1>Thank you for your review!</h1>
        <form action="reviewCompletionPage.php" method="post">
        <input type="submit" name="home" value="Home">
    </form>
</body>
</html>