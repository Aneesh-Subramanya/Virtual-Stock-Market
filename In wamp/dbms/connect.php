<?php  
//connect.php  
$server = 'localhost';  
$username   = 'root';  
$password   = '';  
$database   = 'stockmarket';  
  
if(!($con=mysqli_connect($server, $username,  $password, $database)))  
{  
    exit('Error: could not establish database connection');
} 
?>  