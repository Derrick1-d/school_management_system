<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Library</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: blue;
            color: white;
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

/* Optional: Hover styles */
.button:hover {
    opacity: 0.8;
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

        h2{
            text-align: center;
        }

        .search form {
           
           text-align: center;
           margin-top: 20px; /* Adjust the top margin as needed */
       }

.search input[type="text"] {
 margin: 5px;
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

       .search input[type="submit"]{
         border: none;
         padding: 5px;
         background-color: black;
         color: white;
         border-radius: 5px;
         max-width: 300px;
       }

       .search input[type="submit"]:hover{
           background-color: #ff5555;
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

    <h2>Library Books</h2>

    <div class="search">
<form method="post" action="">
    <input type="text" name="search" placeholder="Search...">
    <input type="submit" value="Search">
</div>
    </form>
    <?php
    // Connect to your database (replace these with your actual credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school_management_system";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve data from the library table
    $sql = "SELECT * FROM library";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display table header
        echo "<table>";
        echo "<tr><th>ID</th><th>Book Name</th><th>Subject</th><th>Writer Name</th><th>Class</th><th>Publishing Year</th><th>Date Added</th><th>Actions</th></tr>";

        // Display data rows
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["book_name"] . "</td>";
            echo "<td>" . $row["subject"] . "</td>";
            echo "<td>" . $row["writer_name"] . "</td>";
            echo "<td>" . $row["class"] . "</td>";
            echo "<td>" . $row["publishing_year"] . "</td>";
            echo "<td>" . $row["date_added"] . "</td>";
            echo "<td>";
            echo "<a class='button green-button' href='view_teacher_detail.php?id=" . $row["id"] . "'>View</a>";
            echo "<a class='button red-button' href='javascript:void(0);' onclick='confirmDelete(" . $row["id"] . ")'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }

        // Display table closing tag
        echo "</table>";
    } else {
        echo "No records found";
    }

    // Close the database connection
   

    //handle search
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['search'];

    // Perform a search query based on your table structure
    $sql = "SELECT * FROM library WHERE book_name LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $rows = []; // No results found
    }
} else {
    // Your existing code to fetch data from the database
    // ...

    // Example: Fetch all rows from the table
$sql = "SELECT * FROM library";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $rows = []; // No rows found
    }
}


$conn->close();
    ?>

</body>
<script>
function confirmDelete(libraryId) {
    var result = confirm("Are you sure you want to delete this book?");
    
    if (result) {
        // If the user confirms, initiate the AJAX request
        var xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // On success, refresh the page and show a success message
                    alert("Book deleted successfully!");
                    location.reload();
                } else {
                    // On failure, show an error message
                    alert("Failed to delete book.");
                }
            }
        };
        
        xhr.open("GET", "delete_book.php?id=" + libraryId, true);
        xhr.send();
    }
}
</script>
</html>
