<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('db.php'); 
if(isset($_POST['submit'])) {

	//Process the image that is uploaded by the user

	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
	$companyid=$_POST['companyname'];
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
	echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
	} else {
	echo "Sorry, there was an error uploading your file.";
	}

	$image=basename($_FILES["imageUpload"]["name"]); // used to store the filename in a variable

   	//storind the data in your database
	$id = rand(0,99999); //random number generation 

	$query= "INSERT INTO images VALUES($id,$companyid,'$image')";
	if ($con->query($query) === TRUE) {
		echo "<p>New Image Uploaded successfully</p>";
	} else {
		echo "Error: " . $Query . "<br>" . $conn->error;
	}
	$con->close();
	echo "Your add has been submited, you will be redirected to your account page in 3 seconds....";
	header( "Refresh:8; url=home.php", true, 303);
}
?>
