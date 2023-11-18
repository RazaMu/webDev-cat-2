<?php
// Connect to the database (replace with your actual database credentials)
$db = new mysqli("localhost", "root", "", "authordb");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the author ID from the form
    $authorId = $_POST["authorId"];

    // Delete the author from the database
    $sql = "DELETE FROM authors WHERE authorId = $authorId";

    if ($db->query($sql) === TRUE) {
        // Author deleted successfully, redirect to ViewAuthors.php
        header("Location: ViewAuthors.php");
        exit();
    } else {
        echo "Error deleting author: " . $db->error;
    }
}

$db->close();
?>
