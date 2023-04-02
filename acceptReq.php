<?php
session_start();
include_once('config.php');
            $id=$_GET['reqID'];
            $id2=$_GET['empID'];
            $id3=$_GET['workType'];
        if (isset($_POST['submission'])){
            $comment = $_POST['comment'];
            $status = "Accepted";
            $workType = $id3;
            $sql = "UPDATE fwa_rquest
            SET comment = '$comment', status = '$status'
            WHERE requestID = '$id';
            UPDATE employee 
            SET FWAStatus='$workType'
            WHERE employeeID = '$id2'";
            
            mysqli_multi_query($conn, $sql);
            
            header("location:reviewPage.php");
        }
        
    ?>

<!DOCTYPE html>
<html>
<?php include 'Component/head.php'; ?>

<body>
    <div class="header-container">
        <?php include 'Component/header.php'; ?>
    </div>
    <div class="container-fluid">
        <h1>FWA Acceptance Page</h1>
        <form method="post">
            <div class="form-group">
                <label for="comment"><b>Comment</b></label>
                <textarea class="form-control" name="comment" rows="5"></textarea>
            </div>
            <div class="container text-center">
                <input class="btn btn-secondary" type="submit" name="submission" value="Accept FWA Request">
            </div>
    </div>
</body>

</html>