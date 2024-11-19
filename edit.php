<?php
include 'db.php';

$id = $_GET['id'];
$user = $conn->query("SELECT * FROM users WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course_section = $_POST['course_section'];

    $conn->query("UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', age='$age', address='$address', course_section='$course_section' WHERE id=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit User</title>
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <form action="" method="POST">
            <input type="text" name="firstname" value="<?= $user['firstname'] ?>" required>
            <input type="text" name="middlename" value="<?= $user['middlename'] ?>" required>
            <input type="text" name="lastname" value="<?= $user['lastname'] ?>" required>
            <input type="number" name="age" value="<?= $user['age'] ?>" required>
            <input type="text" name="address" value="<?= $user['address'] ?>" required>
            <input type="text" name="course_section" value="<?= $user['course_section'] ?>" required>
            <button type="submit" class="btn">Update</button>
        </form>
    </div>
</body>
</html>
