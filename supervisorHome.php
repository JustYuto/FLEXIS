<?php
        if (isset($_POST['review'])){
            header("location:reviewPage.php");
        }
    ?>

<!DOCTYPE html>
<html>
    <?php include 'Component/head.php'; ?>
    <?php include 'Component/header.php'; ?>
    <body>
        <h1>Welcome to the Supervisor Page</h1>
        <div class="container">
            <form action="supervisorHome.php" method="post">
                <input class="btn btn-secondary" type="submit" name="review" value="Review FWA Request">
            </form>
        </div>
    </body>
</html>