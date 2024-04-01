<?php include "templates/header.php"; ?>

<?php
require "../src/DBconnect.php";
require_once __DIR__ . '/../common.php';

$location = isset($_POST['location']) ? $_POST['location'] : false;

try {
    if ($location) {
        $sql = "SELECT * FROM users WHERE location = :location";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':location', $location, PDO::PARAM_STR);
    } else {
        $sql = "SELECT * FROM users";
        $statement = $connection->prepare($sql);
    }

    $statement->execute();
    $result = $statement->fetchAll();
} catch(PDOException $error) {
    echo "Error: " . $error->getMessage();
}
?>

<h2>Find user based on location</h2>
<form method="post">
    <label for="location">Location:</label>
    <input type="text" id="location" name="location">
    <input type="submit" name="submit" value="View Results">
</form>

<?php if ($result && $statement->rowCount() > 0) : ?>
    <h2>Results</h2>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>Age</th>
            <th>Location</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $row) : ?>
            <tr>
                <td><?php echo escape($row["id"]); ?></td>
                <td><?php echo escape($row["firstname"]); ?></td>
                <td><?php echo escape($row["lastname"]); ?></td>
                <td><?php echo escape($row["email"]); ?></td>
                <td><?php echo escape($row["age"]); ?></td>
                <td><?php echo escape($row["location"]); ?></td>
                <td><?php echo escape($row["created_at"]); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>No results found for <?php echo escape($location); ?>.</p>
<?php endif; ?>

<a href="../index.php">Back to home</a>

<?php include "templates/footer.php"; ?>
