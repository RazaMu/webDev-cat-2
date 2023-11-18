<?php
// ViewAuthors.php

// Include database connection file
require_once 'configs/DbConn.php'; // Adjust the path as necessary

try {
    // Prepare an SQL statement to select all authors
    $stmt = $DbConn->prepare("SELECT * FROM authorstb ORDER BY AuthorFullName ASC");

    // Execute the prepared statement
    $stmt->execute();

    // Set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Start the HTML content
    echo "<!DOCTYPE html>
    <html>
    <head>
        <title>View Authors</title>
        <link rel='stylesheet' type='text/css' href='style.css'> <!-- Link to the CSS file -->
    </head>
    <body>
    <h2>Registered Authors</h2>
    <table>
        <tr>
            <th>Author ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Biography</th>
            <th>Date of Birth</th>
            <th>Suspended</th>
            <th>Action</th> <!-- New column for Edit and Delete links/buttons -->
        </tr>";

    // Fetching each row as an associative array and displaying it
    foreach ($stmt->fetchAll() as $author) {
        echo "<tr>
                <td>" . $author['AuthorId'] . "</td>
                <td>" . htmlspecialchars($author['AuthorFullName']) . "</td>
                <td>" . htmlspecialchars($author['AuthorEmail']) . "</td>
                <td>" . htmlspecialchars($author['AuthorAddress']) . "</td>
                <td>" . htmlspecialchars($author['AuthorBiography']) . "</td>
                <td>" . htmlspecialchars($author['AuthorDateOfBirth']) . "</td>
                <td>" . ($author['AuthorSuspended'] ? 'Yes' : 'No') . "</td>
                <td>
                    <a href='editAuthor.php?id=" . $author['AuthorId'] . "'>Edit</a>
                    |
                    <a href='deleteAuthor.php?id=" . $author['AuthorId'] . "'>Delete</a>
                </td>
              </tr>";
    }

    echo "</table>
    </body>
    </html>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
