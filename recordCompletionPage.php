<?php
    session_start();
    include_once 'config.php';
    if(!isset($_SESSION["EmployeeID"]))
        {
            header("location:LoginPage.php");
        }
    if (isset($_POST['home'])){
        header("location:hrAdminHome.php");
    }

?>

<!DOCTYPE html>
<html>

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
<?php include 'Component/head.php'; ?>

<body>
    <div class="header-container">
        <?php include 'Component/header.php'; ?>
    </div>
    <div class="container-fluid">
        <h1>Employee created!</h1>
        <div class="container text-center">
            <form action="recordCompletionPage.php" method="post">
                <input class="btn btn-secondary" type="submit" name="home" value="Home">
            </form>
        </div>
    </div>
</body>

</html>