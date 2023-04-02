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
if(isset($_POST['update'])){
    $date = date('Y-m-d',strtotime($_POST['date']));
    $workLocation = $_POST['workLocation'];
    $workHours = $_POST['workHours'];
    $workReport = $_POST['workReport'];
    
    if(empty($date || $workLocation || $workHours || $workReport)){
        echo "<script>alert('Please fill the empty fields')</script>";
        header("location:updatePage.php"); 
    }

    $sql = "INSERT INTO dailyschedule
            VALUES (NULL, '$date', '$workLocation', '$workHours', '$workReport', NULL , '".$_SESSION["EmployeeID"]."' )";
    mysqli_query($conn,$sql);
    header("location:submittedDailySchedule.php");       
    
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
<script type="text/javascript">
    function preventBack() {
        window.history.forward()
    };
    setTimeout("preventBack()", 0);
    window.onunload = function() {
        null;
    }
    </script>
</head>
<body>
    <h1>Update DAILY SCHEDULE</h1>
    <div class="container">     
        <div class="center">
        <form action ="" method = "POST">
        <label for="date">Date:</label>
            <input type="date" name="date" value = "date">
            <label for="workLocation">Work Location: </label>
            <select id="workLocation" name="workLocation">
                <option value="Office (Flexi hours)">Office (Flexi hours)</option>
                <option value="Home (Work from home)">Home (Work from home)</option>
                <option value="Office (Hybrid)">Office (Hybrid)</option>
                <option value="Home (Hybrid)">Home (Hybrid)</option>
            </select><br>
            <label for="workHours">Work Hours: </label>
            <select id="workHours" name="workHours">
                <option value="8:00 a.m. - 4:00 p.m.">8:00 a.m. - 4:00 p.m.</option>
                <option value="9:00 a.m. - 5:00 p.m.">9:00 a.m. - 5:00 p.m.</option>
                <option value="10:00 a.m. - 6:00 p.m.">10:00 a.m. - 6:00 p.m.</option>
            </select><br>
            <label for="workReport">Work Report:</label>
                <textarea type="text" name="workReport" placeholder="Write your work report here" rows="4" cols="50" required></textarea><br>
            <div class="button-group">  
                <input type="submit" name="update" value = "Update">
                <input type="submit" name="cancel" value = "Cancel" formnovalidate>
            </div>  
        </form>
        </div>
    </div>
</body>
</html>