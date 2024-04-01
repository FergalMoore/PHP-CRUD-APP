<?php
$host = '127.0.0.1';
$dbname = 'mycrudapp';
$username = 'root';
$password = '';
// Options for the PDO connection
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//  PDO to throw exceptions for errors
    PDO::ATTR_EMULATE_PREPARES => false,
];
