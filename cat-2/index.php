<?php
// PHP code can go here if needed
?>

<!DOCTYPE html>
<html>
<head>
    <title>Author Form</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Link to the external CSS file -->
</head>
<body>
    <form action="AuthorRegistration.php" method="post">
        <!-- Input fields for author details -->
        <label for="authorId">Author ID:</label>
        <input type="text" id="authorId" name="authorId"><br><br>

        <label for="authorFullName">Full Name:</label>
        <input type="text" id="authorFullName" name="authorFullName"><br><br>

        <label for="authorEmail">Email:</label>
        <input type="email" id="authorEmail" name="authorEmail"><br><br>

        <label for="authorAddress">Address:</label>
        <input type="text" id="authorAddress" name="authorAddress"><br><br>

        <label for="authorBiography">Biography:</label>
        <textarea id="authorBiography" name="authorBiography"></textarea><br><br>

        <label for="authorDOB">Date of Birth:</label>
        <input type="date" id="authorDOB" name="authorDOB"><br><br>

        <label for="authorSuspended">Suspended:</label>
        <input type="checkbox" id="authorSuspended" name="authorSuspended"><br><br>

        <!-- Submit button -->
        <input type="submit" value="Submit">
    </form>
</body>
</html>
