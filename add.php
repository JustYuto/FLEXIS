<?php
    include_once 'connect.php';

    $id = $_POST['userID'];
    $name = $_POST['userName'];
    $pos = $_POST['position'];
    $eadd = $_POST['emailAddress'];
    $pass = $_POST['userPassword'];

    $sql = "INSERT INTO users (userID, userName, position, emailAddress, userPassword) VALUES ('$id','$name','$pos','$eadd','$pass');"; // users is DB Structure
    mysqli_query($conn,$sql);

?>