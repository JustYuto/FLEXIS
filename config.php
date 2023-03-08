<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "FlexIS";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if($conn===FALSE){
    die("Connection error:". $conn-> connect_error);
}

?>