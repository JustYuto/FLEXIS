<?php
        if (isset($_POST['review'])){
            header("location:selectEmpPage.php");
        }

    ?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>

    <body>
        <h1>Welcome to the Supervisor Page</h1>
        <form action="supervisorHome.php" method="post">
        <input type="submit" name="review" value="Review FWA Request">
    </form>
</body>
</html>
