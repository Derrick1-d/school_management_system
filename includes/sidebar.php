<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="">
    <style>
      .sidenav {
  margin-top: 80px;
  height: 100%;
  width: 320px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #290044;
  overflow-x: hidden;
  padding-top: 20px;
  border-radius: 10px;
}

.logo {
  left: 0;
  position: fixed;
  height: 50px;
  width: 300px;
  background-color: rgb(233, 192, 11);
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  margin-top: 10px;
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 15px;
  color: #ffffff;
  display: block;
  border-style: solid;
  border-width: 1px;
  border-color: #0084ff;
  padding: 5px;
  background: none;
  width: 280px;
  text-align: left;
  cursor: pointer;
  outline: none;
  margin-left: 10px;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  background-color: yellow;
}

.sidenav a{
  color: black;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: green;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: whitesmoke;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

.fa-caret-right {
  float: left;
  padding-right: 8px;
}

.fas {
  margin-right: 10px;
}

    </style>
</head>

<body>

   

    <div class="sidenav">
       
 
        <button class="dropdown-btn"><i class="fas fa-fw fa-dashboard"></i>Dashbord
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="index.php"><i class="fa fa-caret-right"></i>Admin</a>
            <a href="table_student.php"><i class="fa fa-caret-right"></i>Student</a>
          </div>


          <button class="dropdown-btn"><i class="fas fa-user-graduate"></i>Students
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="table_students.php"><i class="fa fa-caret-right"></i>All Students</a>
            <a href="admitstudent.php"><i class="fa fa-caret-right"></i>Admint Form</a>
            <a href="#"><i class="fa fa-caret-right"></i>Student Promotion</a>
          </div>

          <button class="dropdown-btn"><i class="fas fa-chalkboard-teacher"></i>Teachers
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="view_teachers.php"><i class="fa fa-caret-right"></i>All Teachers</a>
            <a href="add_teachers.php"><i class="fa fa-caret-right"></i>Add Teacher</a>
          </div>

          

          <button class="dropdown-btn"><i class="fas fa-book"></i>Library
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="view_library.php"><i class="fa fa-caret-right"></i>All Books</a>
            <a href="add_book_form.php"><i class="fa fa-caret-right"></i>Add Book</a>
           
          </div>


          <button class="dropdown-btn"><i class="fas fa-university"></i>Accounts
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="payment_table.php"><i class="fa fa-caret-right"></i>Fees Collection</a>
            <a href="accountsform.php"><i class="fa fa-caret-right"></i>Create Student Payment</a>
          </div>

          <button class="dropdown-btn"><i class="fas fa-chalkboard"></i>Class
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="#"><i class="fa fa-caret-right"></i>All Class</a>
            <a href="#"><i class="fa fa-caret-right"></i>Add New Class</a>
            
          </div>

          <button class="dropdown-btn"><i class="fas fa-book"></i>Subject
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="#"><i class="fa fa-caret-right"></i>All Subjects</a>
            <a href="#"><i class="fa fa-caret-right"></i>Add Subjects</a>
          </div>

          <button class="dropdown-btn"><i class="fas fa-calendar"></i>Class Routine
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="#"><i class="fa fa-caret-right"></i></a>
            <a href="#"><i class="fa fa-caret-right"></i></a>
            
          </div>

          

        
      </div>
</body>
<script>
    //* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>
</html>