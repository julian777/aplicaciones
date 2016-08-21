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

$sql = "SELECT cedula, nombre, saldo FROM billetera";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "cedula: " . $row["cedula"]. " - nombre: " . $row["nombre"]. " " . $row["saldo"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>