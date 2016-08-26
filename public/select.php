<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "laravel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT name, usd, btc FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Cliente: " . $row["name"]. " Saldo en USD: " . $row["usd"]. " Saldo en BTC: " . $row["btc"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>