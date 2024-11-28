<?php
// Establish a connection to your database (replace these with your actual credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process registration form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminName = $_POST["adminName"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO admin_users (adminName, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $adminName, $password);

    if ($stmt->execute()) {  

        // Registration successful, redirect to login page
        header("Location: login.php");
        exit();
    }else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Close the database connection
$conn->close();
?>