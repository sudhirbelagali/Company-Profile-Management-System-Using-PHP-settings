<?php 
error_reporting(0);
session_start();
$con = mysqli_connect("localhost","root","sudhir","companyprofile");
if(mysqli_connect_errno()){
echo "Failed to Connect to MySql: ".mysqli_connect_error();
}
//echo "Connected to MySql: ";
?>
