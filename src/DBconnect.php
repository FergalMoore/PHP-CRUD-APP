<?php
require_once __DIR__ . '/../config.php';

try {
    $connection = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, $options);
} catch (PDOException $error) {
    echo "Connection Error: " . $error->getMessage();
}
