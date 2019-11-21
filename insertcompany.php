<!DOCTYPE html>
<html> 
<head> 
<title>Insert Employee Details</title> 
</head> 
<body> 
<center> 
<h1>Insert Employee Details</h1> 
<form id="formRecord" action="insertcompany.php" method="post"> 
<table border="0"> 
<tr> 
<td>Company Name</td> 
<td><input type="text" name="name"></td> 
</tr> 
<tr> 
<td>Domains</td> 
<td><input type="text" name="domains"></td> 
</tr>

<tr> 
<td>Clients </td> 
<td><input type="text" name="clients"></td> 
</tr> 
 
<tr> 
<td>Number of Employees</td> 
<td><input type="number" name="noofemployee"></td> 
</tr>

</table>
<br>
<input type="submit" value="saveRecord" name="saveRecord">
</form> 
</center> 
<a href="home.php">GO Back</a>
</body> 
<?php 
require_once('db.php'); 
if(isset($_POST['saveRecord'])) { 

$name = $_POST['name'];
$clients = $_POST['clients'];
$domains = $_POST['domains']; 
$noofemployee = $_POST['noofemployee']; 


if($name !='' && $clients !='' && $domains !='' && $noofemployee!='') { 
$id = rand(0,99999); //random number generation 
$Query ="insert into company values ($id,'$name','$domains','$clients',$noofemployee)"; 

if ($con->query($Query) === TRUE) {
    echo "New Company created successfully";
} else {
    echo "Error: " . $Query . "<br>" . $conn->error;
}
$con->close();
} 
else{ 
$msg = "Text Field is empty !"; 
}
} 
?>
</html>
