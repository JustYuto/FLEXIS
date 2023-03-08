<?php
        if (isset($_POST['review'])){
            header("location:reviewPage.php");
        }

    ?>

<!DOCTYPE html>
<html>
    <body>
        <?php include 'Component/head.php'; ?>
        <?php include 'Component/header.php'; ?>
        
        <h1>Welcome to the Supervisor Page</h1>
        <div class="container">
            <form action="supervisorHome.php" method="post">
            <input type="submit" name="review" value="Review FWA Request">
            </form>
        </div>
    </body>
</html>