<?php
session_start();
require_once("head.php");
include('config.php');
// if($_SESSION(['is_login'])){
//     $employeeID = $_SESSION['employeeID'];
// }
// else{
//     echo "<script> location.href'LoginPage.php'</script>";
// }
// echo "EmployeeID: ".$_GET['EmployeeID'];
if(isset($_REQUEST['submit'])){
    if (isset($_REQUEST['create'])){$workType = $_REQUEST['workType'];
            $description = $_REQUEST['description'];
            $reason = $_REQUEST['reason'];
            $sql = "INSERT INTO fwa_rquest(workType, description, reason) VALUES($workType, $description, $reason)";
            mysqli_query($conn,$sql);
            }
    header("location:submissionCompletionPage.php");
}
?>

<!DOCTYPE html>
<html>
<?php include 'Component/head.php'; ?>
<?php include 'Component/header.php'; ?>
<body>
    <h1>Submit FWA REQUEST</h1>
    <div class="container">     
        <div class="center">
        <form action ="submissionPage.php" method = "POST">
            <label for="workType">Work Type: </label>
            <select id="workType" name="workType">
                <option value="Flexi-hour">Flexi-hour</option>
                <option value="Work-from-home">Work-from-home</option>
                <option value="Hybrid">Hybrid</option>
            </select><br>
            <label for="description">Description:</label>
                <textarea type="text" name="description" placeholder="Write your description here" rows="4" cols="50" required></textarea><br>
            <label>Reason:</label>
                <textarea type="text" name="reason" placeholder="Write your reason here" rows="4" cols="50" required></textarea><br>
            <div class="button-group">  
                <input type="submit" name="submit" value = "Submit"> 
                <input type="submit" formaction="submissionCompletionPage.php" value="cancel">
            </div>  
        </form>
        </div>
    </div>
</body>
</html>

