<?php
session_start();
require_once("head.php");
include('conn.php');
//if($_SESSION(['is_login'])){
    //$employeeID = $_SESSION['employeeID'];
//}
//else{
    //echo "<script> location.href'LoginPage.php'</script>";
//}
//echo "EmployeeID: ".$_GET['EmployeeID'];
if(isset($_REQUEST['submit'])){
    
    if(($_REQUEST['workType'] == "") || ($_REQUEST['description'] =="") || ($_REQUEST['reason'] =="")){
        $msg = "<div>Please fill in all field</div>";
    }
    else{
        $wType = $_REQUEST['workType'];
        $des = $_REQUEST['description'];
        $res = $_REQUEST['reason'];
        $sql = "INSERT INTO fwa_rquest(workType, description, reason)VALUE('$wType','$des','$res')";
            if($conn -> query($sql) == TRUE){
                $msg = "<div>Request Submmited Sucessfully</div>";
                
            }
            else{
                $msg = "<div>Unable to submit your request</div>";
            }
    }
    header("location:submissionCompletionPage.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Submit FWA REQUEST</h1>
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
                <input type="submit" formaction="http://localhost/mine_assigment/employeeHome.php" value="cancel">
            </div>  
        </form>
        </div>
    </div>
</body>
</html>

