<?php
        if (isset($_POST['review'])){
            header("location:reviewPage.php");
        }

    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Supervisor Home Page</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body class="container">
        <h1>Welcome to the Supervisor Page</h1>
        <form action="supervisorHome.php" method="post">
        <input type="submit" name="review" value="Review FWA Request">
    </form>
</body>
</html>