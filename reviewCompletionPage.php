<?php
        if (isset($_POST['home'])){
            header("location:supervisorHome.php");
        }

    ?>

<!DOCTYPE html>
<html>
    <?php include 'Component/head.php'; ?>  
    <?php include 'Component/header.php'; ?>

    <body class="container">
        <h1>Thank you for your review!</h1>
        <form action="reviewCompletionPage.php" method="post">
        <input type="submit" name="home" value="Home">
    </form>
</body>
</html>