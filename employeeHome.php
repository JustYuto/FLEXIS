<?php
    session_start();
    if(!isset($_SESSION["EmployeeID"]))
    {
        header("location:LoginPage.php");
    }
    if (isset($_POST['submission'])){
        header("location:submissionPage.php");
    }
    if (isset($_POST['check'])){
        header("location:submmitedFWARequest.php");
    }
    if (isset($_POST['update'])){
        header("location:");
    }
    ?>

<!DOCTYPE html>
<html>
<?php include 'Component/head.php'; ?>

<head>
    <script type="text/javascript">
    function preventBack() {
        window.history.forward()
    };
    setTimeout("preventBack()", 0);
    window.onunload = function() {
        null;
    }
    </script>
</head>

<body>
    <div class="header-container">
        <?php include 'Component/header.php'; ?>
    </div>
    <h1>Welcome to the Employee Page</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form action="employeeHome.php" method="post">
                    <div class="form-group">
                        <input type="submit" name="submission" value="Submit FWA Request"
                            class="btn btn-secondary form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="check" value="Check FWA Request"
                            class="btn btn-secondary form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="update" value="Update Daily Schedule"
                            class="btn btn-secondary form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


</html>