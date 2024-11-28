<?php
// Your database connection code
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data

    $firstname = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $lastname = $_POST["lastname"];
    $idnumber = $_POST["idnumber"];
    $dob = $_POST["dob"];
    $level = $_POST["level"];
    $paymentMethod = $_POST["payment_method"];
    $amountPaid = $_POST["amount_paid"];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO payments (firstname, middlename, lastname, idnumber, dob, level, payment_method, amount_paid) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssssd", $firstname, $middlename, $lastname, $idnumber, $dob, $level, $paymentMethod, $amountPaid);

    $stmt->execute();

    $stmt->close();
}

$conn->close();
header("Location: accountsform.php");
    exit();
?>
