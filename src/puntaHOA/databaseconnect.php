<?php
$servername = "localhost";
$database = "hoaptamta";
$username = "root";
$password = "r00t";
// Create connection
$conn = mysqli_connect(
    $servername, 
    $username, 
    $password, 
    $database
);
// Check connection
if (!$conn) {
    echo "Error de coneccion:". PHP_EOL;
    echo mysqli_connect_errno();
    die("Connection failed: " . $conn->connect_error);
}
?>