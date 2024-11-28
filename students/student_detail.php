<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

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

        h1 {
            color: #333;
        }

        .student-details {
            max-width: 600px;
            margin: 0 auto;
        }

        .profile-picture {
            float: left; /* Align to the left */
            margin: 10px;
            width: 200px;
            height: 200px;
            overflow: hidden;
            background-color: #ddd;
            text-align: center;
            line-height: 100px;
        }
        .profile-image{
            width: 100%;
            height: auto;
            display: block;
        }

        /* Additional styles for the rest of the content */
        .student-info {
            margin-left: 220px; /* Adjust margin to leave space for the profile picture */
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

    <div class="student-details">
        <?php
          echo "<h1>Student Details</h1>";

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
                $studentsId = $_GET['id'];
                $sql = "SELECT * FROM students WHERE id = $studentsId";
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
            
                    // Display detailed student information
            
             ?>
            <div class="profile-picture">
    <?php
    // Display profile picture
    $profile_picture = $row['profile_picture'];
    if (!empty($profile_picture) && file_exists("uploads/$profile_picture")) {
        echo "<img class='profile-image' src='[uploads/$profile_picture]' alt='Profile Picture'>";
    } else {
        echo "<p>Profile Picture: Not Found</p>";
    }
    ?>
</div>






             <div class="student-info">
                  <?php       
                     

                    
                    
            
                     echo "<p>First Name: " . $row['firstname'] . "</p>";
                     echo "<p>Middle Name: " . $row['middlename'] . "</p>";
                     echo "<p>Last Name: " . $row['lastname'] . "</p>";
                     echo "<p>Email: " . $row['email'] . "</p>";
                     echo "<p>Date Of Birth: " . $row['dob'] . "</p>";
                     echo "<p>Religion: " . $row['religion'] . "</p>";
                     echo "<p>Gender: " . $row['gender'] . "</p>";
                     echo "<p>Admission Number: " . $row['admission_number'] . "</p>";
                     echo "<p>Program: " . $row['program'] . "</p>";
                     echo "<p>Father Name: " . $row['father_name'] . "</p>";
                     echo "<p>Mother Name: " . $row['mother_name'] . "</p>";
                     echo "<p>Father Occupation: " . $row['father_occupation'] . "</p>";
                     echo "<p>Mother Occupation: " . $row['mother_occupation'] . "</p>";
                     echo "<p>Father Phone Number: " . $row['father_phone_number'] . "</p>";
                     echo "<p>Nationality: " . $row['nationality'] . "</p>";
                     echo "<p>Parent Address: " . $row['parent_address'] . "</p>";
                    
                    

            
                      // Add other student information fields as needed
            
                     
                   
            
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
