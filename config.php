<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "flexis";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if($conn->connect_error){
    die("Connection error:". $conn-> connect_error);
}

?>