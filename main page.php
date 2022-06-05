<?php
session_start(); 
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAUP Library</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style1.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">  
    

</head>
<body background="1.jpg">
    <label></label>
    <div class="main-menu">
      <ul class="menu">
     <center>
                <p  id="header" >AAUP Library</p>

            </center>
		  
            <li ><a href="login.php" style="float:left; width:2em; text-decoration:none;color:#996666;background-color:#000000; padding:0.2em 2em;solid white">Logout</a></li>
            
        </ul>
    </div>
   

     <div class="books-part">
         <div id="search-div">
         <form method="POST" name="f1">    
         <input id="search-bar" name="search"  placeholder="insert the book name" type="text"> 
         <input id="searchbtn" type="submit" value="Search" name="Searching">
		<input id="searchbtn" type="submit" value="all books" name="show">
         </form>
         </div>

     <ul>
          

     <?php

   $con= mysqli_connect('localhost','root','') or die('no connection'); 
   mysqli_select_db($con,'librarydb');
  if(isset($_POST['Searching'])){
	   $index=$_POST['search'];
   $q3="SELECT * FROM books WHERE Bname LIKE '%{$index}%'";
   $q4=mysqli_query($con,$q3);
    echo "<table border=1 style= >";
	echo"<tr><td>book ID</td><td>book Name</td><td>section</td><td>shelf number</td><td>book status</td></tr>";
    while($a=mysqli_fetch_array($q4))
	{
		
        echo"<tr><td>$a[0]</td><td>$a[1]</td><td>$a[2]</td><td>$a[3]</td><td>$a[4]</td></tr>";
		
      
   }
   
echo"<br>";
  }
?>


     </ul>
    
     </div>
<div >
	
<?php
$con=mysqli_connect('localhost','root','') or die("No Connection");
mysqli_select_db($con,'librarydb');
	if(isset($_POST['show'])){
	$q1="select * from books;";
	$q2=mysqli_query($con,$q1);
	echo "<br>";
	echo "<table border=1 >";
	echo"<tr><td>book ID</td><td>book Name</td><td>section</td><td>shelf number</td><td>book status</td></tr>";
	while($r=mysqli_fetch_array($q2))
		echo"<tr><td>$r[0]</td><td>$r[1]</td><td><center>$r[2]</center></td><td><center>$r[3]</center></td><td>$r[4]</td></tr>";
	}

?>
</div>
   
</body>
</html>