<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile</title>
</head>

<body>
<?php
include 'head.php';
include 'connect.php';
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true){ 
$id = $_SESSION['user_id'];
echo "<h1>Your Stocks</h1>";
$query = "SELECT * FROM ownership as a,stock as b where a.user = ".$id." and a.stock = b.id"; //You don't need a ; like you do in SQL
$result = mysqli_query($con, $query);

echo "<table>"; // start a table tag in the HTML
echo "<tr><th>Ticker</th><th>Available quantity</th><th>Current Price</th></tr>";
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['ticker'] . "</td><td>" . $row['volume'] . "</td><td>" . $row['Price'] . "</td></tr>"; } //$row['index'] the index here is a field name
echo "</table>";

echo "<br><br><h1>Your Profile Info</h1><br>";
echo "<table>";
$query1 = "SELECT * FROM user where Id = ".$id."";
$result1 = mysqli_query($con, $query1);
 while($row1 = mysqli_fetch_array($result1)){   //Creates a loop to loop through results
echo "<tr><td>Name : " . $row1['name'] . "</td></tr><tr><td>Age : " . $row1['age'] . "</td></tr><tr><td>Address : " . $row1['address'] . "</td></tr><tr><td>Remaining Cash : " . $row1['cash'] . "</td></tr>";
echo "</table>";}
 }
 else
 {
	    echo "Not Logged in. Redirecting in 3 seconds";
		header("refresh:3; url=signin.php");
	}
?>
</body>
</html>