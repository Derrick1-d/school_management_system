<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $idnumber = $_POST["idnumber"];
    $dob = $_POST["dob"];
    $religion = $_POST["religion"];
    $subject = $_POST["subject"];
    $gender = $_POST["gender"];

    // Handle file upload for the profile picture
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["profilePicture"]["name"]);
    move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFile);

    $sql = "INSERT INTO teachers (firstname, middlename, lastname, email, phone, idnumber, dob, religion, subject, gender, profilePicture) VALUES ('$firstname', '$middlename', '$lastname', '$email', '$phone', '$idnumber', '$dob', '$religion', '$subject', '$gender', '$targetFile')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
