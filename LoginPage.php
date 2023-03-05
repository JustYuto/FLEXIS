<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "FlexIS";

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
    while($row=mysqli_fetch_array($result))
    {
    if($row["FWAStatus"]=="New")
    {
        header("location:changePassword.php");
    } 
    elseif($row["position"]=="Employee")
    {
        header("location:employeeHome.php");
    }
    elseif($row["position"]=="Supervisor")
    {
        header("location:supervisorHome.php");
    }
    elseif($row["position"]=="HR Admin")
    {
        header("location:hrAdminHome.php");
    }
    else
    {
        echo "Invalid Employee ID or Password";
    }
}
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="style.css">
    </head>
<body>
<div class="container">
    <h1>WELCOME TO FLEXIWORK</h1>
    <div class="center">
    <form action="#" method="POST">
        <div>
            <label>Employee ID</label>
            <input type="text" name="EmployeeID" required>
        </div><br>

        <div>
            <label>Password</label>
            <input type="password" name="Password" required>
        </div><br>
            <input type="submit" value="Login">
    
    </form>
    </div>
</div>
</body>
</html>
