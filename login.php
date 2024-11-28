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

// Initialize an error message variable
$errorMsg = "";

// Process login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminName = $_POST["adminName"];
    $password = $_POST["password"];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT adminName, password FROM admin_users WHERE adminName = ?");

    // Check for errors during prepare
    if ($stmt === false) {
        die("Error during prepare: " . $conn->error);
    }

    $stmt->bind_param("s", $adminName);  // Bind the parameter
    
    // Execute the prepared statement
    if ($stmt->execute()) {
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($dbadminName, $dbpassword);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $dbpassword)) {
                // Password is correct, consider the user as authenticated

                // Redirect to the index page in another folder
                header("Location: students/index.php");
                exit(); // Ensure no further code execution after the redirect
            } else {
                $errorMsg = "Incorrect password. Please try again.";
            }
        } else {
            $errorMsg = "Admin user not found. Please check your credentials.";
        }
    } else {
        $errorMsg = "Error in query execution: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Add your stylesheets and other head elements here -->
    <style>
        /* Your existing styles */
        body{
            background-color: whitesmoke;
        }

        .body {
            border-radius: 20px;
            background-color: white;
            height: 600px;
            font-family: 'Arial', sans-serif;
            max-width: 1000px;
            margin-left: 300px;
            display: flex ;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        }

        .container {
            height: 300px;
            width: 400px;
            margin-right: 10px;
            margin-top: px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        img{
         width: 400px;
         height: 300px;
        }

        form {
            width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2{
            background-color: rgb(5, 98, 126);
            text-align: center;
            color: white;
            padding: 5px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            border: none;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-weight: bold;
            text-align: center;
        }
        h1{
            color: black;
            text-align: center;
        }

        footer{
            text-align: center;
            
        }
    </style>
</head>
<body>

<h1>SHOOL MANAGEMENT SYSTEM</h1>
    <div class="body">
   

 <div class="container">
 <img src="logo.jpg">
 </div>

    <form id="loginForm" action="" method="post">
        <h2>Admin Login</h2>

    <div id="errorMessage" class="error-message"></div>
        <label for="adminName">Admin Name:</label>
        <input type="text" name="adminName" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <input type="submit" value="Login">
    </form>
    </div>
    <footer>
    <h3>Made By KHEM</h3>

    </footer>
</body>
<script>
    // Display error message if there is one
    const errorMessage = "<?php echo $errorMsg; ?>";
    const errorMessageDiv = document.getElementById('errorMessage');

    if (errorMessage) {
        errorMessageDiv.textContent = errorMessage;
 }
</script>
</html>
