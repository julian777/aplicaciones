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

$sql = "INSERT INTO billetera (cedula, nombre, saldo)
VALUES ('113540573', 'Julian', '0')";

if ($conn->query($sql) === TRUE) {
    echo "Se ha insertado un nuevo registro";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 
