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
<<<<<<< HEAD
<?php include 'Component/head.php'; ?>
<?php include 'Component/header.php'; ?>

<body class="container">
    <h1>Employee created!</h1>
    <form action="recordCompletionPage.php" method="post">
=======
    <head>
    <script type="text/javascript">
            function preventBack(){window.history.forward()};
            setTimeout("preventBack()",0);
                window.onunload=function(){null;}
    </script>
    </head>
    <?php include 'Component/head.php'; ?>
    <?php include 'Component/header.php'; ?>
    
    <body class="container">
        <h1>Employee created!</h1>
        <form action="recordCompletionPage.php" method="post">
>>>>>>> main
        <input type="submit" name="home" value="Home">
    </form>
</body>

</html>