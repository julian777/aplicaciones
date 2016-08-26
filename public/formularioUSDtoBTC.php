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

$sql = "UPDATE users SET usd=20000.50 WHERE name='julian'";

if ($conn->query($sql) === TRUE) {
    echo "Se ha actualizado un nuevo registro";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 