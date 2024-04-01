<?php
require "../common.php";

if (isset($_POST['submit'])) {
    try {
        require_once '../src/DBconnect.php';

        $user =[
            "id" => $_POST['id'],
            "firstname" => $_POST['firstname'],
            "lastname" => $_POST['lastname'],
            "email" => $_POST['email'],
            "age" => $_POST['age'],
            "location" => $_POST['location']
        ];

        $sql = "UPDATE users 
                SET firstname = :firstname, 
                    lastname = :lastname, 
                    email = :email, 
                    age = :age, 
                    location = :location 
                WHERE id = :id";

        $statement = $connection->prepare($sql);
        $statement->execute($user);
        echo "User successfully updated.";
    } catch(PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
} elseif (isset($_GET['id'])) {
    try {
        require_once '../src/DBconnect.php';
        $id = $_GET['id'];

        $sql = "SELECT * FROM users WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
} else {
    echo "No ID provided in the URL";
    exit;
}

require "templates/header.php";
?>

<h2>Edit a user</h2>

<?php if (isset($_POST['submit']) && $statement) : ?>
    <p><?php echo escape($_POST['firstname']); ?> successfully updated.</p>
<?php endif; ?>

<form method="post">
    <input type="hidden" name="id" value="<?php echo escape($user["id"]); ?>">
    <?php foreach ($user as $key => $value) : ?>
        <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
        <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>"
               value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>

<a href="../index.php">Back to home</a>

<?php include "templates/footer.php"; ?>
