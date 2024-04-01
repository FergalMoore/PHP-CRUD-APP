<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to My CRUD App</title>
</head>
<body>
<h1>Welcome to My CRUD App</h1>

<!-- Search form to find users by location -->
<h2>Find user based on location</h2>
<form action="public/read.php" method="post">
    <label for="location">Location:</label>
    <input type="text" id="location" name="location">
    <input type="submit" name="submit" value="View Results">
</form>

<h2>All Users</h2>

<?php
require_once 'src/DBconnect.php';

try {
    $sql = "SELECT * FROM users";
    $statement = $connection->prepare($sql);
    $statement->execute();

    $users = $statement->fetchAll();
} catch(PDOException $error) {
    echo "Error: " . $error->getMessage();
}

if ($users && count($users) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Age</th><th>Location</th><th>Created At</th><th>Action</th></tr>";

    foreach ($users as $user) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($user['id']) . "</td>";
        echo "<td>" . htmlspecialchars($user['firstname']) . "</td>";
        echo "<td>" . htmlspecialchars($user['lastname']) . "</td>";
        echo "<td>" . htmlspecialchars($user['email']) . "</td>";
        echo "<td>" . htmlspecialchars($user['age']) . "</td>";
        echo "<td>" . htmlspecialchars($user['location']) . "</td>";
        echo "<td>" . htmlspecialchars($user['created_at']) . "</td>";
        echo "<td><a href='public/delete.php?id=" . urlencode($user['id']) . "' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a></td>";
        echo "<td><a href='public/update-single.php?id=" . urlencode($user['id']) . "'>Edit</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No users found.</p>";
}
?>

<a href="public/create.php">Add a New User</a>
</body>
</html>
