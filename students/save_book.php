<?php
// Connect to your database (replace these with your actual credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_name = $_POST["book_name"];
    $subject = $_POST["subject"];
    $writer_name = $_POST["writer_name"];
    $class = $_POST["class"];
    $publishing_year = $_POST["publishing_year"];
    $date_added = $_POST["date_added"];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO library (book_name, subject, writer_name, class, publishing_year, date_added) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssis", $book_name, $subject, $writer_name, $class, $publishing_year, $date_added);
    $stmt->execute();

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();

// Redirect back to the form page after saving
header("Location: add_book_form.php");
exit();
?>
