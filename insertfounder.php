<!DOCTYPE html>
<?php
require_once('db.php'); 
?>
<html> 
<head> 
<title>Insert Founder Details</title> 
</head> 
<body> 
<center> 
<h1>Insert Founder Details</h1> 
<form id="formRecord" action="" method="post"> 

<table border="0"> 
<tr> 
<td>Company Name</td> 
<td>
<?php
echo "<select name='companyname'>";
$sql = "SELECT * FROM company";
$result = $con->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['comapny_id'] . "'>" . $row['company_name'] . "</option>";
}
}
echo "</select>";
?>
</td> 
</tr>

<tr> 
<td>Founder Name</td> 
<td><input type="text" name="founder"></td> 
</tr>

<tr> 
<td>Start Date </td> 
<td><input type="date" name="startdate"></td> 
</tr> 
</table>
<br>
<input type="submit" value="saveRecord" name="saveRecord">
</form> 
</center> 
<a href="home.php">GO Back</a>
</body> 
<?php 
if(isset($_POST['saveRecord'])) { 

$companyid = $_POST['companyname'];
$founder = $_POST['founder'];
$startdate = $_POST['startdate']; 

if($companyid !='' && $founder !='' && $startdate !='') { 
$id = rand(0,99999); //random number generation 
$Query ="insert into founder values($id,$companyid,'$founder','$startdate')"; 

if ($con->query($Query) === TRUE) {
    echo "New Founder added successfully";
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
