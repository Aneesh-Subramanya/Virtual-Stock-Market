<?php
include 'head.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');
$username="root";
$password="";
$database="stockmarket";

$con=mysqli_connect("localhost","root","",$database);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$name = mysqli_real_escape_string($con, $_POST['name']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$age = mysqli_real_escape_string($con, $_POST['age']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$epassword = md5($_POST['password']);

$exist= "select * from user";
$result = mysqli_query($con, $exist);
$flag=0;
//echo $flag;
//echo $name;
while($row = mysqli_fetch_array($result))
{


 //echo $name,$row['login'];
 if($name == $row['login'])
  { 
   $flag=1;
  }
  
}

if( $flag==0)
{
$sql="INSERT  INTO user (name, address, age,login,pass) VALUES ('$name', '$address', '$age', '$username', '$epassword')";
mysqli_query($con,$sql);

echo "Successfullly registered";
header('location:signin.php');
mysqli_close($con);
}


else
{
 echo "The login id has already been used,Try again";
 header("refresh:4; url=index.html");
 }
?>