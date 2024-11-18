<?php
require 'db.php'; // Include the database connection

// Check if the ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the student record
    $stmt = $conn->prepare("SELECT * FROM students WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $student = $stmt->fetch();

    // Check if the record exists
    if (!$student) {
        echo "Student not found.";
        exit;
    }
} else {
    echo "No student ID provided.";
    exit;
}

// Handle form submission for updates
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course_section = $_POST['course_section'];

    // Update the record in the database
    $stmt = $conn->prepare("
        UPDATE students 
        SET firstname = :firstname, lastname = :lastname, middlename = :middlename, age = :age, address = :address, course_section = :course_section 
        WHERE id = :id
    ");
    $stmt->execute([
        'firstname' => $firstname,
        'lastname' => $lastname,
        'middlename' => $middlename,
        'age' => $age,
        'address' => $address,
        'course_section' => $course_section,
        'id' => $id
    ]);

    echo "Student information updated successfully.";
    header("Location: index.php"); // Redirect to the homepage or list page
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Update Student Information</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name:</label>
            <input type="text" id="firstname" name="firstname" class="form-control" value="<?= htmlspecialchars($student['firstname']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name:</label>
            <input type="text" id="lastname" name="lastname" class="form-control" value="<?= htmlspecialchars($student['lastname']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="middlename" class="form-label">Middle Name:</label>
            <input type="text" id="middlename" name="middlename" class="form-control" value="<?= htmlspecialchars($student['middlename']) ?>">
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age:</label>
            <input type="number" id="age" name="age" class="form-control" value="<?= htmlspecialchars($student['age']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <input type="text" id="address" name="address" class="form-control" value="<?= htmlspecialchars($student['address']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="course_section" class="form-label">Course & Section:</label>
            <input type="text" id="course_section" name="course_section" class="form-control" value="<?= htmlspecialchars($student['course_section']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
