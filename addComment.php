<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "flexis";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("Connection error: " . mysqli_connect_error());
}
$id=$_GET['DSID'];
        if (isset($_POST['submission'])){
            $comments = $_POST['supervisorComments'];
            $sql = "UPDATE dailyschedule
            SET supervisorComments = '$comments'
            WHERE dsId = '$id'";
            
            $result = mysqli_query($conn,$sql);
            
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
    <div class="container-fluid">
        <h1>Add Comment Page</h1>
        <form method="post">
            <div class="form-group">
                <label for="supervisorComments">Comment</label>
                <textarea class="form-control" name="supervisorComments" rows="5"></textarea>
            </div>
            <div class="container text-center">
                <input class="btn btn-secondary" type="submit" name="submission" value="Add comment">
            </div>
        </form>
    </div>
</body>

</html>