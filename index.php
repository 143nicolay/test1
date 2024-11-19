<?php
include 'db.php';

$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>User List</title>
</head>
<body>
    <div class="container">
        <h1>User List</h1>
        <a href="create.php" class="btn">Add New User</a>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Course/Section</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['firstname'] ?></td>
                        <td><?= $row['middlename'] ?></td>
                        <td><?= $row['lastname'] ?></td>
                        <td><?= $row['age'] ?></td>
                        <td><?= $row['address'] ?></td>
                        <td><?= $row['course_section'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn-edit">Edit</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn-delete">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
