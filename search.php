<!DOCTYPE html>
<html> 
<head> 
<title>Company's</title> 
</head> 
<body> 
<center> 
<form method="post" action="search.php">
<fieldset style="width: 400px">
<legend><h1>Company Name</h1></legend>
<p><label>Company name</label><input type="text" name="company"></p>
<p><input type="submit" name="submit"></p>
</fieldset>
</form>

<?php 
	require_once('db.php'); 

	if(isset($_POST['submit'])) {
?>
<h3>Display Company</h3><br><br>
<table border="1">
<tr>
<th>Company ID</th>
<th>Company Name</th>
<th>Domains</th>
<th>Clients</th>
<th>Number of employees</th>
<th>Founder Name</th>
<th>Started on</th>
<th>Products</th>
<th>Located at</th>
<th>Pin COde</th>
<th>Image</th>
</tr>

<tr>
<?php
	$company = mysqli_real_escape_string($con,$_POST['company']);
	echo "<h1>Description of ".$company."</h1>";
	$sql = "select c.comapny_id as COMPANY_ID, c.company_name as COMPANY_NAME, c.domains as DOMAINS, c.clients as CLIENTS,  c.no_of_emp as NO_OF_EMP, f.founder_name as FOUNDER_NAME, f.start_date as START_DATE, p.product_name as PRODUCT_NAME, l.location_name as LOCATION_NAME, l.pincode as PINCODE, i.imagefile as IMAGE from company c,founder f,product p,location l, images i where company_name='".$company."' and c.comapny_id=f.company_id and c.comapny_id=l.company_id and c.comapny_id=p.company_id and c.comapny_id=i.company_id;"; 
	//echo $sql;
	$result = $con->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
		$id = $row['COMPANY_ID']; 
		$name = $row['COMPANY_NAME']; 
		$domains = $row['DOMAINS']; 
		$clients = $row['CLIENTS']; 
		$noofemp = $row['NO_OF_EMP'];
		$founder = $row['FOUNDER_NAME'];
		$sdate = $row['START_DATE'];
		$pname = $row['PRODUCT_NAME'];
		$location = $row['LOCATION_NAME'];
		$pincode = $row['PINCODE'];
		$image = $row['IMAGE'];
		
?>
	<td><?php echo $id; ?></td>
	<td><?php echo $name ?></td>
	<td><?php echo $domains ?></td>
	<td><?php echo $clients ?></td>
	<td><?php echo $noofemp ?></td>
	<td><?php echo $founder ?></td>
	<td><?php echo $sdate ?></td>
	<td><?php echo $pname ?></td>
	<td><?php echo $location ?></td>
	<td><?php echo $pincode ?></td>
	<td><img src="uploads/<?php echo $image; ?>" width="200" height="200"></td>
	</tr>
	<?php 
	}
	}
	}
	mysqli_close($con); 
	?>
	</table>
</center> 
</body> 
</html>
