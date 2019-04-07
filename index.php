<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

/*$sql = "INSERT INTO customer (id, name, city, country) VALUES (2, 'moon', 'gazipur', 'bangladesh')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
*/

$sql = "SELECT * FROM customer";
$result = $conn->query($sql);

echo "<table border=1>";
echo "<tr><th>ID</th><th>Name</th><th>City</th><th>Country</th></tr>";

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		 echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td> " . $row["city"]. "</td><td> " . $row["country"]."</td></tr>";
    }
} else {
    echo "0 results";
}

echo "</table>";
echo "<br>";
echo "<table border=1>";
echo "<tr><th>OrderID</th><th>OrderNumber</th><th>CustomerID</th></tr>";
$sql1 = "SELECT * FROM orders";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
	while ($row1 = $result1->fetch_assoc()) {
		 echo "<tr><td>" . $row1["OrderID"]. "</td><td>" . $row1["OrderNumber"]. "</td><td>" . $row1["id"] ."</td></tr>";
    }
} else {
    echo "0 results";
}
echo "</table>";

echo "</table>";
echo "<br>";
echo "<table border=1>";
echo "<tr><th>OrderID</th><th>CustomerName</th></tr>";
$sql1 = "SELECT orders.OrderID, customer.name FROM orders INNER JOIN customer ON orders.id = customer.id";
$result1 = $conn->query($sql1);


while ($row1 = $result1->fetch_assoc()) {
	echo "<tr><td>" . $row1["OrderID"]. "</td><td>" . $row1["name"] ."</td></tr>";
}
echo "</table>";
	


$conn->close();
?>