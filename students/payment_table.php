<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments Table</title>
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
.active-indicator {
            color: green; /* Set the color you want for the indicator */
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .not-paid {
            background-color: #ff8080;
            color: #ffffff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .paid {
            background-color: #4caf50;
            color: #ffffff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        #searchBar{
        
  margin-left: 650px;
  margin-bottom: 20px;
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

        #search{
          border: none;
          padding: 5px;
          background-color: black;
          color: white;
          border-radius: 5px;
          max-width: 300px;
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
<!-- Search bar -->
<input type="text" id="searchBar" placeholder="Search for a payment" oninput="searchPayments()">

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

// Retrieve data from the payments table
$sql = "SELECT * FROM payments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>First Name</th>";
    echo "<th>Middle Name</th>";

    echo "<th>Last Name</th>";
    echo "<th>ID Number</th>";
    echo "<th>Date of Payment</th>";
    echo "<th>Level</th>";
    echo "<th>Payment Method</th>";
    echo "<th>Amount Paid</th>";
    echo "<th>Status</th>";

    echo "<th>Action</th>";
    echo "<th>Action</th>";

    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["middlename"] . "</td>";

        echo "<td>" . $row["lastname"] . "</td>";
        echo "<td>" . $row["idnumber"] . "</td>";
        echo "<td>" . $row["dob"] . "</td>";
        echo "<td>" . $row["level"] . "</td>";
        echo "<td>" . $row["payment_method"] . "</td>";
        echo "<td>" . $row["amount_paid"] . "</td>";


       // Display "Not Paid" or "Paid" button based on payment status and amount limit
       // Display "Not Paid" or "Paid" button based on payment status and amount limit
        $paymentStatus = isset($row["payment_status"]) ? $row["payment_status"] : "";
        $amountPaid = isset($row["amount_paid"]) ? $row["amount_paid"] : 0; // Default to 0 if not set

        // Set the button class to 'not-paid' if the amount is below 200.00
        $buttonClass = ($amountPaid < 200.00 ? 'not-paid' : 'paid');

       // Set the button text based on payment status
         $buttonText = ($buttonClass == 'not-paid' ? 'Not Paid' : 'Paid');

echo "<td class='status-cell " . $buttonClass . "'>" . $buttonText . "</td>";

        // Add buttons for viewing, deleting, and updating payment status
        echo "<td><a class='button green-button' href='view.php?id=" . $row["id"] . "'>View</a></td>";

        echo "<td><a class='button red-button' href='javascript:void(0);' onclick='confirmDelete(" . $row["id"] . ")'>Delete</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No records found";
}

$conn->close();
?>

<script>
    // JavaScript code to handle updating payment status
    document.addEventListener('DOMContentLoaded', function() {
        var updateButtons = document.querySelectorAll('.update-status');

        updateButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Get the payment ID from the data-id attribute
                var paymentId = this.getAttribute('data-id');

                // Send an AJAX request to update the payment status
                // You'll need to implement this part using JavaScript and PHP
                // For simplicity, I'll just log the payment ID to the console
                console.log('Updating status for payment ID:', paymentId);
            });
        });
    });

    
        // JavaScript function to filter payments based on search input
        function searchPayments() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchBar");
            filter = input.value.toUpperCase();
            table = document.getElementById("paymentTable");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) { // Start from 1 to skip the header row
                td = tr[i].getElementsByTagName("td")[1]; // Change index to the column you want to search
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Get the body element
            var body = document.querySelector('body');

            // Add the active indicator text or element
            var activeIndicator = document.createElement('div');
            activeIndicator.innerHTML = 'This page is active now';
            activeIndicator.classList.add('active-indicator');

            // Append the indicator to the body
            body.appendChild(activeIndicator);
        });
    
        function confirmDelete(paymentsId) {
    var result = confirm("Are you sure you want to delete this Payment?");
    
    if (result) {
        // If the user confirms, initiate the AJAX request
        var xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // On success, refresh the page and show a success message
                    alert("Payment deleted successfully!");
                    location.reload();
                } else {
                    // On failure, show an error message
                    alert("Failed to delete student.");
                }
            }
        };
        
        xhr.open("GET", "delete_payment.php?id=" + paymentsId, true);
        xhr.send();
    }
}

</script>

</body>
</html>
