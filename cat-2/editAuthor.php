<?php
// Connect to the database (replace with your actual database credentials)
$db = new mysqli("localhost", "root", "", "authordb");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $authorId = $_POST["authorId"];
    $authorFullName = $_POST["authorFullName"];
    $authorEmail = $_POST["authorEmail"];
    $authorAddress = $_POST["authorAddress"];
    $authorBiography = $_POST["authorBiography"];
    $authorDOB = $_POST["authorDOB"];
    $authorSuspended = isset($_POST["authorSuspended"]) ? 1 : 0;

    // Update the author information
    $sql = "UPDATE authors SET 
            authorFullName = '$authorFullName',
            authorEmail = '$authorEmail',
            authorAddress = '$authorAddress',
            authorBiography = '$authorBiography',
            authorDOB = '$authorDOB',
            authorSuspended = $authorSuspended
            WHERE authorId = $authorId";

    if ($db->query($sql) === TRUE) {
        echo "Author information updated successfully.";
    } else {
        echo "Error updating author information: " . $db->error;
    }
}

$db->close();
?>
