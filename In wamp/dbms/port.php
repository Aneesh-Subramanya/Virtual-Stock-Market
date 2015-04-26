<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage</title>
</head>
<body>
<?php
include 'connect.php';
include 'head.php';
?>
<?php
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true){ 
$query = "SELECT * FROM company as a,stock where a.id=company"; //You don't need a ; like you do in SQL
$result = mysqli_query($con, $query);
echo "<h1>Stock Info</h1>";
echo "<table>"; // start a table tag in the HTML
echo "<tr><th> Name</th> <th>Ticker</th> <th>Website</th> <th>Available quantity</th><th>Price</th></tr>";
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['name'] . "</td><td>" . $row['ticker'] . "</td><td>" . $row['web'] . "</td><td>" . $row['total'] . "</td><td>" . $row['Price'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML
echo"<h1>Enter transaction Details</h1>";
echo '<form class="form" id="submit" method="post" action="transaction.php" accept-charset="UTF-8">';
echo '<input type="text"  placeholder="Ticker" name="ticker" id="ticker"><br>';
echo '<input type="number" placeholder="Quantiy" name="quantity" id="quantity"><br>';
echo '<input type="radio" name="trans" value="buy">BUY&nbsp&nbsp';
echo '<input type="radio" name="trans" value="sell">SELL<br>';
echo '<input type="submit" class="submit" value="Submit">    </form>';}
    else{
	    echo "Not Logged in. Redirecting in 3 seconds";
		header("refresh:3; url=signin.php");
	}
include 'foot.php';
?>
</body>
</html>