


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts-fORM</title>
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
            <h3></h3>
            <h3>Payment Information</h3>
        </div>


        <form action="save_payment.php" method="post" enctype="multipart/form-data"   onsubmit="return confirmSubmit()">
            
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
                <label for="email">ID number</label>
                <input type="text" name="idnumber" id="idnumber" placeholder="optional" required>
            </div>

            <div class="form-group">
                <label for="amount">Amount Paid</label>
                <input type="text" name="amount_paid" id="amount_paid" placeholder="type amount here" required>
            </div>

            <div class="form-group">
                <label for="dob">Date of Payment</label>
                <input type="date" name="dob" id="dob" required>
            </div>

            <div class="form-group">
                <label for="level">Choose Level:</label>
                <select id="level" name="level">
                    <option value="">Choose an Option</option>
                    <option value="form_one">Form 1</option>
                    <option value="form_two">Form 2</option>
                    <option value="form_three">Form 3</option>
        
                </select><br>  
            </div>

            <div class="form-group">
                <label for="payment">Payment Method:</label>
                <select id="payment_method" name="payment_method">
                    <option value="">Choose an Option</option>
                    <option value="gcb_bank">GCB Bank</option>
                    <option value="school">School</option>
                    <option value="mobile_money">Mobile Money</option>
        
                </select><br>  
            </div>

            <!-- Add more form fields as needed -->

           
           

            <div class="button-container">
                <button id="submit" type="submit" value="submit">Save</button>
                <button id="reset">Reset</button>
            </div>
        </form>
       
    </div>
</body>
<script>
        function confirmSubmit() {
            // Display a confirmation dialog
            var confirmed = confirm("Are you sure you want to submit the payment form?");

            // If the user clicks OK, the form will be submitted
            return confirmed;
        }

        function validateAmount() {
            var amountPaid = document.getElementById("amount_paid").value;

            // Check if the amount is a digit
            if (!/^\d+$/.test(amountPaid)) {
                alert("Please enter a valid amount. Only digits are allowed.");
                return false;
            }
        
            // If the validation passes, the form will be submitted
            return true;
        }
        
    </script>

</html>