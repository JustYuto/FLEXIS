<?php
//if(isset(['is_login']){
    //$employeeID = $_SESSION['rEmail'];
//}
//else{
    //echo "<script> location.href'RequesterLogin.php'</script>";
//}
if(isset($_REQUEST['submit'])){
    if(($_REQUEST['workType'] == "") || ($_REQUEST['description'] =="") || ($_REQUEST['reason'] =="")){
        $msg = "<div>Please fill in all field</div>";
    }
    else{
        $wType = $_REQUEST['workType'];
        $des = $_REQUEST['description'];
        $res = $_REQUEST['reason'];
        $sql = "INSERT INTO fwa_rquest(workType, description, reason)VALUE('$wType','$des','$res')";
            if($conn->$query($sql) == TRUE){
                $msg = "<div>Request Submmited Sucessfully</div>";
            }
            else{
                $msg = "<div>Unable to submit your request</div>";
            }
    }
}

?>
<!DOCTYPE html>
<html>
<body>
    <h1>Submit FWA REQUEST</h1>
    <div class="center">
    <form action ="submitFwaRequest.php" method = "POST">
        <label>EmployeeID: </label><br>
        <label>Employee Name: </label><br>
        <label>Work Type: </label>
        <select id="workType" name="workType">
            <option value="Flexi-hour">Flexi-hour</option>
            <option value="Work-from-home">Work-from-home</option>
            <option value="Hybrid">Hybrid</option>
        </select><br>
        <label>Description:</label>
            <input type="text" name="description" placeholder="Write your description here" required/><br>
        <label>Reason:</label>
            <input type="text" name="reason" placeholder="Write your description here" required/><br>
            <input type="submit" name="submit" value = "Submit">
    </form>
    </div>
</body>
</html>

