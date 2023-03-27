<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "flexis";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if($conn===FALSE){
    die("Connection error:". $conn-> connect_error);    
}
if(isset($_POST['submit'])){
    $workType = $_POST['workType'];
    $description = $_POST['description'];
    $reason = $_POST['reason'];
    $status = $_POST['status'];
    
    if(empty($description || $reason)){
        echo "<script>alert('Please fill in the desciption or reason')</script>";
        header("location:submissionPage.php"); 
    }

    $sql = "INSERT INTO `fwa_rquest`
            VALUES (NULL, current_timestamp(), '$workType', '$description', ' $reason', '$status', NULL , '".$_SESSION["EmployeeID"]."' )";
    mysqli_query($conn,$sql);
    header("location:submissionCompletionPage.php");       
    
}
if(isset($_POST['cancel'])){
    header("location:employeeHome.php");
}

?>
<!DOCTYPE html>
<html>
<?php include 'Component/head.php'; ?>
<?php include 'Component/header.php'; ?>
<head>
<script>
    function setDate() {
      var currentDate = new Date();
      var formattedDate = (currentDate.getMonth() + 1) + "/" + currentDate.getDate() + "/" + currentDate.getFullYear();
      document.getElementById("date").innerHTML = formattedDate;
    }
  </script>
</head>
<body onload="setDate()">
    <h1>Submit FWA REQUEST</h1>
    <div class="container">     
        <div class="center">
        <form action ="" method = "POST">
            <textarea type="text" hidden for="status" name="status">Pending</textarea>
            <div  for="requestDate " id="date"></div>
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
                <input type="submit" name="cancel" value = "Cancel" formnovalidate>
            </div>  
        </form>
        </div>
    </div>
</body>
</html>

