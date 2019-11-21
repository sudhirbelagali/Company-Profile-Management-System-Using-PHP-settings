<!DOCTYPE html>
<?php
require_once('db.php'); 
?>
<html> 
<head> 
<title>Insert Location Details</title> 
</head> 
<body> 
<center> 
<h1>Insert Location Details</h1> 
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
<td>Location </td> 
<td><input type="text" name="location"></td> 
</tr>
<tr> 
<td>PinCode </td> 
<td><input type="number" name="pincode"></td> 
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
$location = $_POST['location'];
$pincode = $_POST['pincode'];

if($companyid !='' && $location !='' && $pincode!='') { 
$id = rand(0,99999); //random number generation 
$Query ="insert into location values($id,$companyid,'$location',$pincode)"; 

if ($con->query($Query) === TRUE) {
    echo "New Location added successfully";
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
