<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have a form with method="post" and the necessary fields
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$religion = mysqli_real_escape_string($conn, $_POST['religion']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$admission_number = mysqli_real_escape_string($conn, $_POST['admission_number']);
$program = mysqli_real_escape_string($conn, $_POST['program']);
$father_name = mysqli_real_escape_string($conn, $_POST['father_name']);
$mother_name = mysqli_real_escape_string($conn, $_POST['mother_name']);
$father_occupation = mysqli_real_escape_string($conn, $_POST['father_occupation']);
$mother_occupation = mysqli_real_escape_string($conn, $_POST['mother_occupation']);
$father_phone_number = mysqli_real_escape_string($conn, $_POST['father_phone_number']);
$mother_phone_number = mysqli_real_escape_string($conn, $_POST['mother_phone_number']);
$nationality = mysqli_real_escape_string($conn, $_POST['Nationality']);
$parent_address = mysqli_real_escape_string($conn, $_POST['parent_address']);

// Upload profile picture (assuming 'uploads' directory exists)
$profilePicturePath = 'uploads/' . basename($_FILES['profilePicture']['name']);
move_uploaded_file($_FILES['profilePicture']['tmp_name'], $profilePicturePath);

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO students (firstname, middlename, lastname, email, dob, religion, gender, admission_number, program, father_name, mother_name, father_occupation, mother_occupation, father_phone_number, mother_phone_number, nationality, parent_address, profile_picture)
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO students (firstname, middlename, lastname, email, dob, religion, gender, admission_number, program, father_name, mother_name, father_occupation, mother_occupation, father_phone_number, mother_phone_number, nationality, parent_address, profile_picture)
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Check if the prepare statement was successful
if (!$stmt) {
    die("Error in statement preparation: " . $conn->error);
}

// Bind parameters to the prepared statement
$stmt->bind_param("ssssssssssssssssss", $firstname, $middlename, $lastname, $email, $dob, $religion, $gender, $admission_number, $program, $father_name, $mother_name, $father_occupation, $mother_occupation, $father_phone_number, $mother_phone_number, $nationality, $parent_address, $profilePicturePath);

// Check if the bind was successful
if (!$stmt) {
    die("Error in statement binding: " . $stmt->error);
}

// Execute the prepared statement
if ($stmt->execute()) {
    echo "Record inserted successfully";
    header("Location: admitstudent.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement
$stmt->close();
?>
