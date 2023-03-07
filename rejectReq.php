<?php

        if (isset($_POST['submission'])){
            include_once('config.php');
            $comment = $_POST['comment'];
            $status = "Rejected";
            $query = "UPDATE 'fwa_rquest' SET 'comment'='".$comment."','status'='".$status."'";
            
            $result = mysqli_query($conn,$query);
            
            header("location:reviewPage.php");
        }

    ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body class="container">
    <h1>FWA Rejection Page</h1>
    <form method="post">
        <div>
        <label for="comment"><b>Comment</b></label>
                <input type="text" name="comment">
                <form action="employeeHome.php" method="post"><br><br>
        <input type="submit" name="submission" value="Reject FWA Request">
</body>
</html>