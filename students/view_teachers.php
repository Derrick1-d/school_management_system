<?php
// Include your database connection file here
// Example: include("db_connection.php");
include("conn.php");

// Sample database connection (MySQLi)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch student data from the database
mysqli_select_db($conn, $dbname);

$sql = "SELECT * FROM teachers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Data</title>
    <style>
        #backButton {
            position: fixed;
            top: 20px;
            left: 20px;
            padding: 10px;
            background-color: #007bff; /* Set the color you want for the button */
            color: #ffffff;
            border: none;
            cursor: pointer;
        }
        table {
            
            margin-top: 10px;
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .button {
    display: inline-block;
    padding: 5px 8px;
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    border-radius: 4px;
}

/* Red button */
.red-button {
    background-color: #ff5555; /* Red color */
}

/* Green button */
.green-button {
    background-color: #4caf50; /* Green color */
}

/* Optional: Hover styles */
.button:hover {
    opacity: 0.8;
}
.search form {
           
            text-align: center;
            margin-top: 20px; /* Adjust the top margin as needed */
        }

.search input[type="text"] {
  margin: 5px;
  width: 200px;
  padding: 6px;
  border: none;
  margin-top: 8px;
  margin-right: 16px;
  font-size: 17px;
  border-radius: 10px;
  background-color: whitesmoke;
  color: black;
}

        .search input[type="submit"]{
          border: none;
          padding: 5px;
          background-color: black;
          color: white;
          border-radius: 5px;
          max-width: 300px;
        }

        .search input[type="submit"]:hover{
            background-color: #ff5555;
        }
    </style>
</head>
<body>
<button id="backButton" onclick="goBack()">Go Back</button>

<script>
    // JavaScript function to go back to the previous page
    function goBack() {
        window.history.back();
    }
</script>
<div class="search">
<form method="post" action="">
    <input type="text" name="search" placeholder="Search...">
    <input type="submit" value="Search">
</div>
    

    <table>
   
</form>
   
        <tr>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>id_Number</th>
            <th>Date of Birth</th>
            <th>Subject</th>
            <th>Religion</th>
            <th>Gender</th>
            <th>Profile Picture</th>
            <th>View</th>
            <th>Action</th>
        </tr>
<?php
        // ... (previous code)

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["middlename"] . "</td>";
        echo "<td>" . $row["lastname"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>". $row["phone"] . "</td>";
         // Check if the key exists before accessing it
         $idnumber = isset($row["idnumber"]) ? $row["idnumber"] : "";
         echo "<td>" . $idnumber . "</td>";
        echo "<td>" . $row["dob"] . "</td>";
         // Check if the key exists before accessing it
         $subject = isset($row["subject"]) ? $row["subject"] : "";
         echo "<td>" . $subject . "</td>";

        echo "<td>" . $row["religion"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";

        

       
       

        // Check if the key exists before accessing it
        $profilePicture = isset($row["profilePicture"]) ? "<img src='uploads'" . $row["profilePicture"] . "' alt='Profile Picture' style='max-width: 50px;'>" : "";
        echo "<td>" . $profilePicture . "</td>";

        // Add a "View" button with a link to the student details page
        echo "<td><a class='button green-button' href='view_teacher_detail.php?id=" . $row["id"] . "'>View</a></td>";

        echo "<td><a class='button red-button' href='javascript:void(0);' onclick='confirmDelete(" . $row["id"] . ")'>Delete</a></td>";
    }
} else {
    echo "<tr><td colspan='12'>No records found</td></tr>";
}

//handle search
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['search'];

    // Perform a search query based on your table structure
    $sql = "SELECT * FROM teachers WHERE lastname LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $rows = []; // No results found
    }
} else {
    // Your existing code to fetch data from the database
    // ...

    // Example: Fetch all rows from the table
$sql = "SELECT * FROM teachers";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $rows = []; // No rows found
    }
}


$conn->close();
?>
</table>

</body>
<!-- Add this script in the head or body section of your HTML document -->

<script>
function confirmDelete(studentId) {
    var result = confirm("Are you sure you want to delete this student?");
    
    if (result) {
        // If the user confirms, initiate the AJAX request
        var xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // On success, refresh the page and show a success message
                    alert("Teacher deleted successfully!");
                    location.reload();
                } else {
                    // On failure, show an error message
                    alert("Failed to delete student.");
                }
            }
        };
        
        xhr.open("GET", "delete_teacher.php?id=" + studentId, true);
        xhr.send();
    }
}
</script>

</html>

