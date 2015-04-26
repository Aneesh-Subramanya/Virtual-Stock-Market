
<?php
include 'connect.php';
include 'head.php';
?>
<body>
</body>
<?php
echo "<h1>Stock Information</h1>";

$query = "SELECT * FROM company as a,stock where a.id=company"; //You don't need a ; like you do in SQL
$result = mysqli_query($con, $query);

echo "<table>"; // start a table tag in the HTML
echo "<tr><th> Name</th> <th>Ticker</th> <th>Website</th> <th>Available quantity</th><th>Price</th></tr>";
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['name'] . "</td><td>" . $row['ticker'] . "</td><td>" . $row['web'] . "</td><td>" . $row['total'] . "</td><td>" . $row['Price'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

include 'foot.php';
?>