<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #BBA475; /* Light blue background */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            width: 70%;
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
        <form action="submit.php" method="POST">
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
                <label for="course" class="form-label">Course & Section:</label>
                <input type="text" id="course&Section" name="course&Section" class="form-control" required>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
