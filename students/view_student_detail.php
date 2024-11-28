<?php
require_once('TCPDF-main/tcpdf.php');

// Replace these with your actual database credentials
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

// Retrieve student data
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

// Create PDF document
$pdf = new TCPDF();
$pdf->SetAutoPageBreak(true, 10);

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', 'B', 14);

// Add profile picture
$pdf->Image('uploads/', 10, 10, 30, 0, '', '', 'T', false, 300, '', false, false, 0);

// Title
$pdf->Cell(0, 10, 'Student Details', 0, 1, 'C');

// Add table headers


// Add student data to the table
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(0, 10, 'First Name: ' . $row['firstname'], 0, 1);
        $pdf->Cell(0, 10, 'Middle Name: ' . $row['middlename'], 0, 1);
        $pdf->Cell(0, 10, 'Last Name: ' . $row['lastname'], 0, 1);
        $pdf->Cell(0, 10, 'Email: ' . $row['email'], 0, 1);
        $pdf->Cell(0, 10, 'Date of Birth: ' . $row['dob'], 0, 1);
        $pdf->Cell(0, 10, 'Religion: ' . $row['religion'], 0, 1);
        $pdf->Cell(0, 10, 'Gender: ' . $row['gender'], 0, 1);
        $pdf->Cell(0, 10, 'Admission Number: ' . $row['admission_number'], 0, 1);
        $pdf->Cell(0, 10, 'Program: ' . $row['program'], 0, 1);
        $pdf->Cell(0, 10, 'Father Name: ' . $row['father_name'], 0, 1);
        $pdf->Cell(0, 10, 'Mother Name: ' . $row['mother_name'], 0, 1);
        $pdf->Cell(0, 10, 'Father Occupation: ' . $row['father_occupation'], 0, 1);
        $pdf->Cell(0, 10, 'Mother Occupation: ' . $row['mother_occupation'], 0, 1);
        $pdf->Cell(0, 10, 'Father Phone Number: ' . $row['father_phone_number'], 0, 1);
        $pdf->Cell(0, 10, 'Mother Phone Number: ' . $row['mother_phone_number'], 0, 1);
        $pdf->Cell(0, 10, 'Nationality: ' . $row['nationality'], 0, 1);
        $pdf->Cell(0, 10, 'Parent_address: ' . $row['parent_address'], 0, 1);
    }
} else {
    $pdf->Cell(120, 10, 'No records found', 1);
}

// Output PDF to the browser
$pdf->Output('student_details.pdf', 'D');

// Close the database connection
$conn->close();
?>
