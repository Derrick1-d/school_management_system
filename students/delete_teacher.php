<?php
// Include your database connection file here
// Example: include("db_connection.php");
include("conn.php");

// Sample database connection (MySQLi)


// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the student record from the database
    $sql = "DELETE FROM teachers WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Deletion successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

$conn->close();
?>
