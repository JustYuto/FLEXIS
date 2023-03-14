<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "flexis";

session_start();

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if($conn===FALSE)
{
	die("Connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$employeeid=$_POST["EmployeeID"];
    $password=$_POST["Password"];
    $FWAStatus = "new";
    $sql="select * from employee where EmployeeID='".$employeeid."' AND Password='".$password."'";
    // Assume the user's account status is stored in a variable called $accountStatus

    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    if($row["FWAStatus"]=="New")
    {
        $_SESSION["EmployeeID"]=$employeeid;
        header("location:changePassword.php");
    } 
    elseif($row["position"]=="Employee")
    {
        $_SESSION["EmployeeID"]=$employeeid;

        header("location:employeeHome.php");
    }
    elseif($row["position"]=="Supervisor")
    {
        $_SESSION["EmployeeID"]=$employeeid;
        header("location:supervisorHome.php");
    }
    elseif($row["position"]=="HR Admin")
    {
        $_SESSION["EmployeeID"]=$employeeid;
        header("location:hrAdminHome.php");
    }
    else
    {
        echo "Invalid Employee ID or Password";
    }
}


?>


<!DOCTYPE html>
<html>
    <head>
        <?php include 'Component/head.php'; ?>
    </head>
<body>
    <div class="container">
        <h1>WELCOME TO FLEXIWORK</h1>
        <form class="text-center" action="#" method="POST">
        <div class="card-body">
            <p class="card-text">            
                <input class="form-control" type="text" name="EmployeeID" placeholder="EmployeeID" required>
            </p>
            <p class="card-text">            
                <input class="form-control" type="password" name="Password" placeholder="Password" required>
            </p>
            <p class="card-text">
                <input class="btn btn-secondary" type="submit" value="Login">
            </p>
        </div>        
        </form>
    </div>
    
</body>

<style>
/* body {
	height: 100%;
	margin: 0 auto;
	padding: 0;
	display: table;
}
form {
	min-height: 100%;
	margin: 0 auto;
	padding: 0;
	display: table-cell;
	vertical-align: middle;
} */
</style>
</html>
