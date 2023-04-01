<?php
    session_start();
    if(!isset($_SESSION["EmployeeID"]))
    {
        header("location:LoginPage.php");
    }
    if (isset($_POST['reviewFWARequest'])){
        header("location:reviewPage.php");
    }
    if (isset($_POST['reviewDailySchedule'])){
        header("location:reviewDailySchedulePage.php");
    }
?>

<!DOCTYPE html>
<html>
<?php include 'Component/head.php'; ?>

<body>
    <div class="header-container">
        <?php include 'Component/header.php'; ?>
    </div>
    <h1>Welcome to the Supervisor Page</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form action="supervisorHome.php" method="post">
                    <div class="form-group">
                        <input type="submit" name="reviewFWARequest" value="Review FWA Request"
                            class="btn btn-secondary form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="reviewDailySchedule" value="Review Daily Schedule"
                            class="btn btn-secondary form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


</html>