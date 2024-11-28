<?php
// Replace these variables with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management_system";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data (replace 'your_table_name' and 'your_column_names' with your actual table and column names)
// SQL query to fetch data from the school_info table
$sql = "SELECT * FROM school_info";
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Fetch all rows and store them in an array
    $data = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "No records found";
}

// Close the database connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System Dashboard</title>
    <!-- Add your stylesheets and other head elements here -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            overflow: auto;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .grid-container {
            float: right;
            width: 75%;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            padding: 20px;
           height: 300px;
        }

        

        .slideshow-container {
            width: 100%;
            position: relative;
            margin: auto;
        }

        .mySlides {
            max-width: 900px;
            display: none;
            overflow: hidden;
        }

        .mySlides{
            width: 500px;
            height: 300px;
            overflow: scroll;
        }

        .mySlides img{
           width: 500px;
        }


        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
        }

        .dashboard {
            margin-top: 100px;
            float: right;
            width: 75%;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
        }

        .grid-box {
            background-color: white;
            border: 1px solid #ccc;
            padding: 20px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        canvas {
            max-width: 100%;
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
    

    <div class="grid-container">
        <?php
        // Check if $data is set and not empty
        if (isset($data) && !empty($data)) {
            // Loop through the $data array to populate grid boxes
            foreach ($data as $row) {
                echo '<div class="grid-box">';
                echo '<h2>Total Students: ' . $row["total_students"] . '</h2>';
                echo '<p>Total Teachers: ' . $row["total_teachers"] . '</p>';
                echo '<p>New Admissions: ' . $row["new_admissions"] . '</p>';
                echo '<p>Total Costs: $' . $row["total_costs"] . '</p>';
                echo '<p>Monthly Revenue: $' . $row["monthly_revenue"] . '</p>';
                echo '</div>';
            }
        } else {
            echo "No records found";
        }
        ?>
        

        <div class="grid-container">
        <div class="grid-box">
            <div class="slideshow-container">
                <div class="mySlides">
                    <img src="img/lady.jpg" alt="Image 1">
                </div>
                <div class="mySlides">
                    <img src="img/teacher.jpg" alt="Image 2">
                </div>
                <!-- Add more slides with images as needed -->

                <!-- Navigation buttons -->
                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>
            </div>

            
        </div>

        
        <!-- Add more grid boxes as needed -->
    </div>
    </div>
    

    <div class="dashboard">
        <div class="grid-box">
            <h2>Students by Grade</h2>
            <canvas id="studentsByGradeChart"></canvas>
        </div>
  

        <div class="grid-box">
            <h2>Teachers by Department</h2>
            <canvas id="teachersByDepartmentChart"></canvas>
        </div>

        <div class="grid-box">
            <h2>Courses by Grade</h2>
            <canvas id="coursesByGradeChart"></canvas>
        </div>

        <!-- Add more graphs as needed -->
    </div>

    <script>
        // Chart.js code for rendering graphs (replace with your actual data)
        var studentsByGradeData = {
            labels: ["Grade 1", "Grade 2", "Grade 3", "Grade 4", "Grade 5"],
            datasets: [{
                label: 'Students by Grade',
                data: [30, 40, 20, 25, 35],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };


        var teachersByDepartmentData = {
            labels: ["Math", "Science", "English", "History", "Art"],
            datasets: [{
                label: 'Teachers by Department',
                data: [8, 5, 4, 2, 1],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        var coursesByGradeData = {
            labels: ["Grade 1", "Grade 2", "Grade 3", "Grade 4", "Grade 5"],
            datasets: [{
                label: 'Students by Grade',
                data: [50, 20, 60, 25, 35],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };
        

        var studentsByGradeChart = new Chart(document.getElementById('studentsByGradeChart').getContext('2d'), {
            type: 'bar',
            data: studentsByGradeData
        });

        var teachersByDepartmentChart = new Chart(document.getElementById('teachersByDepartmentChart').getContext('2d'), {
            type: 'bar',
            data: teachersByDepartmentData
        });

        var coursesByGradeChart = new Chart(document.getElementById('coursesByGradeChart').getContext('2d'), {
            type: 'bar',
            data: coursesByGradeData
        });

        //grid container images slider
        let slideIndex = 1;

function showSlides(n) {
    let i;
    const slides = document.getElementsByClassName("mySlides");

    if (n > slides.length) {
        slideIndex = 1;
    }

    if (n < 1) {
        slideIndex = slides.length;
    }

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slides[slideIndex - 1].style.display = "block";
}

function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Initial display
showSlides(slideIndex);
    </script>

<?php
    // Include the sidebar
    include('../includes/footer.php');
    ?>
</body>
</html>
