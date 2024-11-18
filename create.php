<?php
require 'db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'] ?? ''; // Optional field
    $age = $_POST['age'];
    $address = $_POST['address'];
    $courseSection = $_POST['course&Section'];

    // Prepare and execute the insert query
    $stmt = $conn->prepare("INSERT INTO students (firstname, lastname, middlename, age, address, course_section) VALUES (:firstname, :lastname, :middlename, :age, :address, :course_section)");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':middlename', $middlename);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':course_section', $courseSection);

    // Execute the query
    if ($stmt->execute()) {
        echo "Student registered successfully!";
        header("Location: index.php"); // Redirect to the list page or a confirmation page
        exit;
    } else {
        echo "Error registering student.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url('img/grad.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 50px;
            box-shadow: 50px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            width: 70%;
            line-height: 70%;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="form-container text-center">
        <h2 class="mb-4">Student Registration Form</h2>
        <form action="create.php" method="POST">
            <div class="mb-3 text-start">
                <label for="firstname" class="form-label">First Name:</label>
                <input type="text" id="firstname" name="firstname" class="form-control" required>
            </div>
            <div class="mb-3 text-start">
                <label for="lastname" class="form-label">Last Name:</label>
                <input type="text" id="lastname" name="lastname" class="form-control" required>
            </div>
            <div class="mb-3 text-start">
                <label for="middlename" class="form-label">Middle Name:</label>
                <input type="text" id="middlename" name="middlename" class="form-control">
            </div>
            <div class="mb-3 text-start">
                <label for="age" class="form-label">Age:</label>
                <input type="number" id="age" name="age" class="form-control" required>
            </div>
            <div class="mb-3 text-start">
                <label for="address" class="form-label">Address:</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div>
            <div class="mb-3 text-start">
                <label for="course&Section" class="form-label">Course & Section:</label>
                <input type="text" id="course&Section" name="course&Section" class="form-control" required>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
