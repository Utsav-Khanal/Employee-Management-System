<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "emp_man_sys";

//Create Connection
$conn = new mysqli($serverName,$userName,$password,$dbName);

//Check Connection
if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}
//echo "Connected Successfully";

?>