<?php
require_once('db.php'); 
?>
<html>
<head><title>Image Upload</title></head>
<body>
<form action="insertimage1.php" method="post"  enctype="multipart/form-data">
<fieldset>
<legend>Image Upload</legend>
<p><label>Company Name</label>
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
</p>
<p><label>Image here<label><input name="imageUpload" type="file"></p>
<p><input type="submit" value="submit" name="submit" /></p>
</fieldset>
</form>
</body>
</html>
