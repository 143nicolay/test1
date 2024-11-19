<?php
$servername = "localhost";
$username = "nicole";
$password = "12345678";
$database = "crud_app";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
