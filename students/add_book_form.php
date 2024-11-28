


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_Books</title>
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
            <h3>Add Book</h3>
            <h3>Book Information</h3>
        </div>


        <form action="save_book.php" method="post" enctype="multipart/form-data" onsubmit="return confirmSubmit()">
            
            <div class="form-group">
                <label for="book_name">Book Name</label>
                <input type="text" name="book_name" id="book_name" required>
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject">
            </div>

            <div class="form-group">
                <label for="writer_name">Writer Name</label>
                <input type="text" name="writer_name" id="writer_name" required>
            </div>

            <div class="form-group">
                <label for="class">Class</label>
                <input type="text" name="class" id="class" placeholder="optional">
            </div>

            <div class="form-group">
                <label for="publishing_year">Publishing Year</label>
                <input type="text" name="publishing_year" id="publishing_year" placeholder="number" required>
            </div>

            <div class="form-group">
                <label for="date_added">Date Added</label>
                <input type="date" name="date_added" id="date_added" placeholder="optional" required>
            </div>

            


           

            <div class="button-container">
            <button id="submit" value="submit" type="submit">Save</button>
                <button id="reset">Reset</button>
            </div>
        </form>
       
    </div>
    

<?php
    // Include the sidebar
    include('../includes/footer.php');
    ?>
</body>
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