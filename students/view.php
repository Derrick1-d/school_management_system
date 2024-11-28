<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <!-- Your head elements go here -->
    <style>
        /* Your CSS styles go here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h3{
            text-align: center;
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

        .receipt-container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #printButton {
            margin-left: 250px;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
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
    <div class="receipt-container">
        <h3>SHOOL MANAGEMENT SYSTEM</h3>

        <?php
        // Your database connection code
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "school_management_system";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch data from the account table (replace with actual column names)
        if (isset($_GET['id'])) {
            $paymentsId = $_GET['id'];
            $sql = "SELECT * FROM payments WHERE id = $paymentsId";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        
                // Display receipt details
            

                echo "<p>First Name: " . $row["firstname"] . "</p>";
                echo "<p>Middle Name: " . $row["middlename"] . "</p>";
                echo "<p>Last Name: " . $row["lastname"] . "</p>";
                echo "<p>ID Number: " . $row["idnumber"] . "</p>";
                echo "<p>Date of Payment: " . $row["dob"] . "</p>";
                if (isset($row["level"])) {
                    echo "<p>Level: " . $row["level"] . "</p>";
                } else {
                    echo "<p>Level: Not available</p>";
                }
        
                // Check if 'payment_method' key exists before accessing it
                if (isset($row["payment_method"])) {
                    echo "<p>Payment Method: " . $row["payment_method"] . "</p>";
                } else {
                    echo "<p>Payment Method: Not available</p>";
                }
        
                // Check if 'amount_paid' key exists before accessing it
                if (isset($row["amount_paid"])) {
                    echo "<p>Amount: $" . $row["amount_paid"] . "</p>";
                } else {
                    echo "<p>Amount: Not available</p>";
                }
        
                // Add more receipt details as needed
            } else {
                echo "No records found";
            }
        
            $conn->close();
        }
        ?>

        <!-- Print button -->
        <button id="printButton" onclick="printReceipt()">Print Receipt</button>
    </div>

    <script>
        // JavaScript function to print the receipt
        function printReceipt() {
            window.print();
        }
    </script>

</body>
</html