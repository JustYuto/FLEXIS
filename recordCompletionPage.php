<?php
        if (isset($_POST['home'])){
            header("location:hrAdminHome.php");
        }

?>

<!DOCTYPE html>
<html>
<?php include 'Component/head.php'; ?>
<?php include 'Component/header.php'; ?>

<body class="container">
    <h1>Employee created!</h1>
    <form action="recordCompletionPage.php" method="post">
        <input type="submit" name="home" value="Home">
    </form>
</body>

</html>