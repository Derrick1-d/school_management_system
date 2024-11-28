<?php
// Other PHP code...

// Initialize $errorMessage to an empty string
$errorMessage = '';

// Check if there was a form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data

    // If an error occurs, set $errorMessage
    if (empty($_POST['some_required_field'])) {
        $errorMessage = "Please fill in the required field.";
    }

    // Add more conditions as needed for your specific form validation

    // If there are no errors, proceed with further processing
    if (empty($errorMessage)) {
        // Process the form data, insert into the database, etc.
    }
}



// Other PHP code...

// Now you can use $errorMessage without the "Undefined variable" warning
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".css">
    <title>Admit student page </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        

body {
    font-family: Arial, sans-serif;
}

.form-container {
    
    max-width:1050px;
   
    
    margin-top: 50px;
    margin-left: 400px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.header h1, .header h3, .head h3 {
    color: #333;
}

form {
    
    display: flex;
    flex-wrap: wrap;
}

.form-group {
    flex: 1 1 25%; /* Adjust as needed, 48% to leave some space between elements */
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #333;
}

input, select {
    width: 80%;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

select {
    cursor: pointer;
}

input[type="file"] {
    margin-top: px;
}

.form-group span {
    display: block;
    margin-top: 8px;
    color: red;
}

.button-container {
    text-align: center;
    margin: 50px;
}

button {
    padding: 10px 20px;
    font-size: 16px;
    margin: 0 10px;
    cursor: pointer;
}

button#submit {
    background-color: #4CAF50;
    color: white;
    border: none;
}

button#reset {
    background-color: #f44336;
    color: white;
    border: none;
}



/* Add responsiveness */
@media screen and (max-width: 600px) {
    .form-group {
        flex: 1 1 100%; /* Take full width on small screens */
    }
}

        .error-message {
            color: red;
        }
    </style>
</head>


<body>
<?php
    // Include the sidebar
    include('../includes/header.php');
    ?>

<?php
    // Include the sidebar
    include('../includes/sidebar.php');
    ?>


    <div class="form-container">
        <div class="header">
            <h3>Add Student Form</h3>
            <h3>Student Information</h3>
        </div>
     
        <form action="process.php" method="post"  enctype="multipart/form-data" onsubmit="return confirmSubmit()">
            
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname" required>
                <span class="error-message" id="firstname-error"></span>

            </div>

            <div class="form-group">
                <label for="middlename">Middle Name</label>
                <input type="text" name="middlename" id="middlename">
                <span class="error-message" id="middlename-error"></span>

            </div>

            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname" required>
                <span class="error-message" id="lastname-error"></span>
            </div>

            <div class="form-group">
                <label for="email">Enter Email</label>
                <input type="email" name="email" id="email" placeholder="optional">
                <span class="error-message" id="email-error"></span>

            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob" required>
            </div>

            <div class="form-group">
                <label for="religion">Choose your religion:</label>
                <select id="religion" name="religion">
                    <option value="">Choose an Option</option>
                    <option value="christianity">Christian</option>
                    <option value="islam">Islam</option>
                    <option value="Traditionalist">Traditionalist</option>
        
                </select><br>  
            </div>

        

            <div class="form-group">
                <label for="gender">Select your gender:</label>
                    <select id="gender" name="gender">
                         <option value="male">
                               Male
                          </option>
                            <option value="female">
                                Female
                            </option>

                </select><br>
           </div>

           <div class="form-group">
            <label for="admision-number">Admision Number</label>
            <input type="text" name="admission_number" id="Admission-number" required><br>
           </div>

           <div class="form-group">
            <label for="religion">Select Program:</label>
            <select id="program" name="program" required>
                <option value="">Choose an Option</option>
                <option value="general-science">General Scince</option>
                <option value="general-arts-crs">General Arts CRS</option>
                <option value="general-arts-elective-mathematics">General Arts Elective Mathematics</option>
                <option value="home-economics">Home Economics</option>
                <option value="visual-arts">Visual Arts</option>
                <option value="elective-computing">Elective Computing</option>
    
             </select><br>
           </div>

           <div class="form-group">
                <label for="father_name">Father Name</label>
                <input type="text" name="father_name" id="father_name" required>
            </div>
            
            <div class="form-group">
                <label for="mother_name">Mother Name</label>
                <input type="text" name="mother_name" id="mother_name" required>
            </div>
            <div class="form-group">
                <label for="father_occupation">Father Occupation</label>
                <input type="text" name="father_occupation" id="father_occupation" required>
            </div>

            <div class="form-group">
                <label for="mother_occupation">Mother Occupation</label>
                <input type="text" name="mother_occupation" id="mother_occupation" required>
                 
            </div>

            <div class="form-group">
                <label for="phone_number">Father's Phone Number</label>
                <input type="text" name="father_phone_number" id="father_phone_number" optional>
            </div>

            <div class="form-group">
                <label for="phone-number">Mother's Phone Number</label>
                 <input type="text" name="mother_phone_number" id="mother_phone_number" optional>
            </div>

            <div class="form-group">
                <label for="nationlity">Nationality</label>
                <input type="text" name="Nationality" id="nationlity" optional>
            </div>

            <div class="form-group">
                <label for="parent_address">Parent's Address</label>
                <input type="text" name="parent_address" id="parrent_address" optional>
            </div>

            <div class="form-group">
            <label for="profilePicture">Upload Profile Picture (150px by 150px):</label>
               <input type="file" name="profilePicture" id="profilePicture" accept="image/*">
                <span class="error-message"><?php echo $errorMessage; ?></span>
                <span class="error-message" id="profilePicture-error"></span>
                <?php
    // Use $errorMessage where needed in your HTML
    if (!empty($errorMessage)) {
        echo "<p style='color: red;'>$errorMessage</p>";
    }
    ?>
            </div>

            <div class="button-container">
                <button id="submit" value="submit" type="submit">Save</button>
                <button id="reset">Reset</button>
            </div>

          

             
            

        

        </form>
    
       
    </div>

</body>
<script src="scr.js"></script>
<script>
       function confirmSubmit() {
            // Display a confirmation dialog
       var confirmed = confirm("Are you sure you want to submit and save the data?");
            
            // If the user clicks OK, the form will be submitted
       return confirmed;
       }

       // JavaScript to print to console and refresh the page
       document.getElementById('studentForm').addEventListener('submit', function() {
            console.log('Success');
       });
    </script>
</html>
