<?php
require 'db.php'; // Include the database connection

// Check if the ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the delete query
    $stmt = $conn->prepare("DELETE FROM students WHERE id = :id");
    $stmt->execute(['id' => $id]);

    // Check if the record was deleted successfully
    if ($stmt->rowCount()) {
        echo "Student deleted successfully.";
        header("Location: index.php"); // Redirect to the main page or list of students
        exit;
    } else {
        echo "Error deleting student or student not found.";
    }
} else {
    echo "No student ID provided.";
    exit;
}
?>
