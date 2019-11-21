<!DOCTYPE html>
<html> 
<head> 
<title>Registration</title> 
</head> 
<body> 
<center> 
<h1>Registration</h1> 
<form id="formRecord" action="" method="post"> 
<table border="0"> 
<tr> 
<td>Name</td> 
<td><input type="text" name="name"></td> 
</tr> 
<tr> 
<td>Password</td> 
<td><input type="password" name="password"></td> 
</tr> 

</table>
<br>
<input type="submit" value="saveRecord" name="saveRecord">
</form> 
<a href="login.php">If registered already, Do login here!</a>
</center> 
</body> 
<?php 
require_once('db.php'); 
if(isset($_POST['saveRecord'])) { 

$name = $_POST['name'];
$password = $_POST['password'];


if($name !='' && $password !='') { 
$id = rand(0,99999); //random number generation 
$Query ="insert into login values($id,'$name','$password')"; 

if ($con->query($Query) === TRUE) {
    echo "New record created successfully <br/><a href='login.php'>Now login here</a>";
} else {
    echo "Error: " . $Query . "<br>" . $conn->error;
}
$con->close();
} 
else{ 
$msg = "Text Field is empty !"; 
echo $msg;
}
} 
?>

</html>
