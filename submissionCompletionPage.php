<?php
    if (isset($_POST['home'])){
        header("location:employeeHome.php");
    }
?>

<!DOCTYPE html>
<html>
<?php include 'Component/head.php'; ?>
<?php include 'Component/header.php'; ?>
<body class="container">
    <h1>Thank you for your submission!</h1>
    <div class="container text-center">
        <form action="submissionCompletionPage.php" method="post">
            <input class="btn btn-secondary" type="submit" name="home" value="Home">
        </form>
    </div>

</body>

</html>