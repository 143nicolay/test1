<?php
// Database connection settings
$host = 'localhost'; // Database host
$dbname = 'student_registration'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Set the PDO error mode to exception for better error handling
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Optional: Set the default fetch mode to associative arrays
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    echo "Database connection successful!";
} catch (PDOException $e) {
    // Display the error message if the connection fails
    echo "Database connection failed: " . $e->getMessage();
    exit;
}
?>
