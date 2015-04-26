<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Check::Login</title>
</head>
<body>
<?php
$con=mysqli_connect("localhost", "root", "", "stockmarket");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$myusername = mysqli_real_escape_string($con,$_POST['fname']);
$mypassword = mysqli_real_escape_string($con,$_POST['pswd']);
$emypassword = md5($mypassword);
$sql="select Id FROM user WHERE login='$myusername' AND pass='$emypassword'";
$count=mysqli_num_rows(mysqli_query($con,$sql));
if($count)
{
header('location:indexer.php');
}
else if($myusername==NULL||$mypassword==NULL) {
header('location:login.html');
}
else
{
	header('location:login.html');
}
	
?>
</body>
</html>