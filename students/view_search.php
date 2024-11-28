<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['search'];

    // Perform a search query based on your table structure
    $sql = "SELECT * FROM your_table WHERE name LIKE '%$search%'";
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
    $sql = "SELECT * FROM your_table";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $rows = []; // No rows found
    }
}

$conn->close();



?>