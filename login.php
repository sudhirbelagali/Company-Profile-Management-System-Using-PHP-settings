<?php
   include("db.php");

   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($con,$_POST['username']);
      $mypassword = mysqli_real_escape_string($con,$_POST['password']); 
      
      $sql = "SELECT id FROM login WHERE user = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);



      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {

         $_SESSION['login_user'] = $myusername;
         
         header("location: home.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div >

				
            <div>
		<h1>LOGIN HERE</h1>
               
               <form action = "" method = "post">
                  <label>User Name   :</label><input type = "text" name = "username"/><br /><br />
                  <label>Password   :</label><input type = "password" name = "password"/><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>	
               
               <div><?php echo $error; ?></div>
		<div><a href="register.php"> register here</a></div>					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
