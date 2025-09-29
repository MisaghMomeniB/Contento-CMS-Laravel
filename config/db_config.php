<?php

// Define Host Data
define ("DB_HOST", "localhost");
define ("DB_NAME", "your_database");
define ("DB_USER", "your_user");
define ("DB_PASS", "your_pass");

// DSN
$dsn = "mysql:host=" . DB_HOST > ";db_name=" . DB_NAME;

// PDO Arrays
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];