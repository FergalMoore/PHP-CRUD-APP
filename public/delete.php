<?php
// Include the database connection file
require_once __DIR__ . '/../src/DBconnect.php';

// Check if an ID was provided in the URL query string
if (isset($_GET["id"])) {
    try {
        // Retrieve the ID from the query string
        $id = $_GET["id"];

        // Prepare the SQL statement
        $sql = "DELETE FROM users WHERE id = :id";
        $statement = $connection->prepare($sql);

        // Bind the ID to the prepared statement
        $statement->bindValue(':id', $id, PDO::PARAM_INT);

        // Execute the prepared statement
        $statement->execute();

        // Redirect to the home page
        header("Location: index.php");
        exit();
    } catch(PDOException $error) {
        // Print the error message if there's an error during the operation
        echo "Error: " . $error->getMessage();
    }
} else {
    // Inform the user that no ID was provided for deletion
    echo "No id set to delete.";
}
?>
