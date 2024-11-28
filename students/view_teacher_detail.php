<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
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
        body {
            font-family: Helvetica;
            margin: 20px;
            
        }

        h1 {
            background-color: wheat;
            text-align: center;
            color: #333;
            
        }

        .student-details {
            max-width: 600px;
            margin: 0 auto;
        }

        .profile-picture {
            float: left; /* Align to the left */
            margin: 10px;
            max-width: 200px;
            max-height: 200px;
        }

        /* Additional styles for the rest of the content */
        .student-info {
           
            margin-left: 220px; /* Adjust margin to leave space for the profile picture */
        }
        </style>
</head>
<body>



<div class="student-details">
<button id="backButton" onclick="goBack()">Go Back</button>

<script>
    // JavaScript function to go back to the previous page
    function goBack() {
        window.history.back();
    }
</script>
        <?php
                    echo "<h1>Teacher Details</h1>";

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
            // Include the PHP code for retrieving student details (previous code)
            if (isset($_GET['id'])) {
                $studentId = $_GET['id'];
                $sql = "SELECT * FROM teachers WHERE id = $studentId";
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
            ?>
              <div class="profile-picture">
            <?php
                
                // Display profile picture
                $profilePicturePath = 'uploads/' . $row['profilePicture'];
                if (file_exists($profilePicturePath)) {
                    echo "<div class='profile-picture'><img src='uploads/'" . $profilePicturePath . "' alt='Profile Picture'></div>";
                } else {
                    echo "<p>Profile Picture: Not Found</p>";
                }
            ?>
        </div>

             <div class= "student-info">   
                 <?php
                     // Display detailed student information
        
                    echo "<p>First Name: " . $row['firstname'] . "</p>";
                   echo "<p>Middle Name: " . $row['middlename'] . "</p>";
                   echo "<p>Last Name: " . $row['lastname'] . "</p>";
                   echo "<p>Email: " . $row['email'] . "</p>";
                   echo "<p>Phone: " . $row['phone'] . "</p>";
                   echo "<p>ID Number: " . $row['idnumber'] . "</p>";
                   echo "<p>Date of Birth: " . $row['dob'] . "</p>";
                   echo "<p>Religion: " . $row['religion'] . "</p>";
                   echo "<p>Subject: " . $row['subject'] . "</p>";
                   echo "<p>Gender: " . $row['gender'] . "</p>";
       
                    

            
                    // Add other student information fields as needed
            
                    // Display profile picture
                   
            
                  } else {
                    echo "Student not found";
                  }
                     } else {
                     echo "Invalid request. Please provide a student ID.";
                   }
            
                    ?>
             </div>
        
    </div>
    
    
</body>
</html>
