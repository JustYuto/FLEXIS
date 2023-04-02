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
<?php include 'Component/head.php'; ?>

<body>
    <div class="header-container">
        <?php include 'Component/header.php'; ?>
    </div>
    <div class="container-fluid">
        <h1>FWA Rejection Page</h1>
        <form method="post">
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea class="form-control" name="comment" rows="5"></textarea>
            </div>
            <div class="container text-center">
                <input class="btn btn-secondary" type="submit" name="submission" value="Reject FWA Request">
            </div>
        </form>
    </div>
</body>

</html>