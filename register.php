

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Add your stylesheets and other head elements here -->
</head>
<style>
    body {
    font-family: 'Arial', sans-serif;
    background-color: rgb(5, 98, 126);
    margin: 0;
    padding: 0;
}

form {
    max-width: 400px;
    margin: 150px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
h2{
    background-color: rgb(5, 98, 126);
    text-align: center;
    color: white;
    padding: 5px;
}

/* Add more styles as needed */

</style>
<body>

   

    <form  id="registrationForm" action="process.php" method="post">
       <h2>Admin Registration</h2>
        <label for="adminName">Admin Name:</label>
        <input type="text" name="adminName" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <input type="submit" id="submit" value="Register">
    </form>

</body>
<script>
        // Get the form by its ID
        /*const registrationForm = document.getElementById('registrationForm');

        // Attach an event listener to the form's submit event
        registrationForm.addEventListener('submit', function(event) {
            // Prevent the default form submission
            event.preventDefault();

            // Simulate a successful registration
            // In a real application, this would be handled by your server response
            const registrationSuccessful = true;

            if (registrationSuccessful) {
                // Display a pop-up message
                alert('Registration successful!');

                // Redirect to the login page
                window.location.href = 'login.php';
            }
        });*/
    </script>
</html>

