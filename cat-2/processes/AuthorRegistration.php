<?php
// Include database connection file
require_once 'DbConn.php'; // Adjust the path as necessary

// Function to sanitize input data
function sanitizeData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input data
    $authorId = sanitizeData($_POST['authorId']);
    $authorFullName = sanitizeData($_POST['authorFullName']);
    $authorEmail = sanitizeData($_POST['authorEmail']);
    $authorAddress = sanitizeData($_POST['authorAddress']);
    $authorBiography = sanitizeData($_POST['authorBiography']);
    $authorDOB = sanitizeData($_POST['authorDOB']);
    $authorSuspended = isset($_POST['authorSuspended']) ? 1 : 0;

    try {
        // Prepare an SQL statement to insert the data
        $stmt = $DbConn->prepare("INSERT INTO authorstb (AuthorId, AuthorFullName, AuthorEmail, AuthorAddress, AuthorBiography, AuthorDateOfBirth, AuthorSuspended) VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        // Bind parameters to the prepared statement
        $stmt->bindParam(1, $authorId);
        $stmt->bindParam(2, $authorFullName);
        $stmt->bindParam(3, $authorEmail);
        $stmt->bindParam(4, $authorAddress);
        $stmt->bindParam(5, $authorBiography);
        $stmt->bindParam(6, $authorDOB);
        $stmt->bindParam(7, $authorSuspended);

        // Execute the prepared statement
        $stmt->execute();

        echo "New record created successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No data submitted";
}
?>
