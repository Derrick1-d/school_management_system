


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_Teachers</title>
    <link rel="stylesheet" href="">
</head>

<style>
    body {
    font-family: Arial, sans-serif; 
    background-color: whitesmoke;   
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

.error-message {
            color: red;
            font-weight: bold;
        }

/* Add responsiveness */
@media screen and (max-width: 600px) {
    .form-group {
        flex: 1 1 100%; /* Take full width on small screens */
    }
}

#error {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }
</style>
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
            <h3>Add Teacher Form</h3>
            <h3>Teacher Information</h3>
        </div>


        <form action="save_teacher.php" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname" required>
            </div>

            <div class="form-group">
                <label for="middlename">Middle Name</label>
                <input type="text" name="middlename" id="middlename">
            </div>

            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname" required>
            </div>

            <div class="form-group">
                <label for="email">Enter Email</label>
                <input type="email" name="email" id="email" placeholder="optional">
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="phone" name="phone" id="phone" placeholder="number" required>
            </div>

            <div class="form-group">
                <label for="email">ID number</label>
                <input type="text" name="idnumber" id="idnumber" placeholder="optional" required>
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
                <label for="subject">Choose Subject:</label>
                <select id="subject" name="subject">
                    <option value="">Choose an Option</option>
                    <option value="CRS">CRS</option>
                    <option value="social-studies">Social Studies</option>
                    <option value="science">Science</option>
        
                </select><br>  
            </div>

            <!-- Add more form fields as needed -->

            <div class="form-group">
                <label for="gender">Select your gender:</label>
       <select id="gender" name="gender">
           <option value="male">Male</option>
           <option value="female">Female</option>

        </select><br>
           </div>

            <div class="form-group">
                <label for="profilePicture">Upload Profile Picture (150px by 150px):</label>
                <input type="file" name="profilePicture" id="profilePicture" accept="image/*">
                <span id="error" style="color: red;"></span>
            </div>

            <div class="button-container">
                <button type="button" id="submit"  onclick="validateForm()" >Save</button>
                <button id="reset">Reset</button>
            </div>
        </form>
       
    </div>
</body>
<script>
        document.addEventListener('DOMContentLoaded', function () {

            document.getElementById('submit').addEventListener('click', function (event) {
                var firstname = document.getElementById('firstname').value.trim();
                var lastname = document.getElementById('lastname').value.trim();
                var phone = document.getElementById('phone').value.trim();
                var idnumber = document.getElementById('idnumber').value.trim();
                var dob = document.getElementById('dob').value.trim();
                var religion = document.getElementById('religion').value;
                var subject = document.getElementById('subject').value;
                var gender = document.getElementById('gender').value;
                var profilePicture = document.getElementById('profilePicture').value;

                // Validate required fields
                if (firstname === '' || lastname === '' || phone === '' || dob === '' || religion === '' || subject === '' || gender === '') {
                    document.getElementById('error').innerHTML = 'Please fill in all required fields.';
                    event.preventDefault();
                    return;
                }

                // Validate phone number
                if (isNaN(phone) || phone.length !== 10) {
                    document.getElementById('error').innerHTML = 'Please enter a valid phone number.';
                    event.preventDefault();
                    return;
                }

                // Validate ID number
                if (idnumber !== '' && (isNaN(idnumber) || idnumber.length !== 4)) {
                    document.getElementById('error').innerHTML = 'Please enter a valid 4-digit ID number.';
                    event.preventDefault();
                    return;
                }

                // Validate profile picture dimensions (150px by 150px)
                if (profilePicture !== '') {
                    var img = new Image();
                    img.src = window.URL.createObjectURL(document.getElementById('profilePicture').files[0]);
                    img.onload = function () {
                        if (img.width !== 150 || img.height !== 150) {
                            document.getElementById('error').innerHTML = 'Profile picture dimensions must be 150px by 150px.';
                            event.preventDefault();
                        }
                    };
                }
            });
        });
    </script>

</html>