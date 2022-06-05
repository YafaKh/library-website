<?php
session_start(); 
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">  
</head>
<body>

        
    <div class="main-menu">
      <ul class="menu">

       <center>
               <p  id="header" >AAUP Library</p>
</center>

           
       </ul>
   </div>
<form method="POST" name="f1">
    <div class="LoginPanel">
        <p class="LoginTextEmail" >Email</p><input name="email" id="emailbox" type="email" placeholder="enter your email" >
        
        <p class="LoginTextPassword"  >Password</p><input name="pass" id="emailbox" type="password" placeholder="enter your password" >
        <input class="sub" value="Login" type="submit" name="s1">

        </div> 

</form>

   
  <?php

$con=mysqli_connect("localhost","root","") or die (" No Connection");
mysqli_select_db($con,'librarydb') or die(" <font color='red'><center>Database Not Found\n</center>");



if(isset($_POST['s1']))
{
	$email=$_POST['email'];
    $pass=$_POST['pass'];

	$q1="SELECT * from student where semail='$email' and spass='$pass' ;";
	$q2=mysqli_query($con,$q1);
	if($arr=mysqli_fetch_array($q2))
	    header("location: main page.php");
	else
	   echo "<center><font color ='red'><b>Invalid email or password</b></center>"; 
	
	  
}

?>
</body>
</html>