<?php
// Include the file with database constants
include 'configs/constants.php';

try {
    // Establishing a PDO connection without any additional security measures
    $DbConn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);

    // Simple error mode setting
    $DbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully"; 
} catch(PDOException $e) {
    // Basic error handling
    echo "Connection failed: " . $e->getMessage();
}
?>
