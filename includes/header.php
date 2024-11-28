



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
        
/* Style the navigation bar */
.navbar {
  width: 100%;
  background-color: #ffffff;
  display: flexbox;
  display: flex;
  align-items: center;
  justify-content: space-around;
}

/* Navbar links */
.navbar .fas {
  margin-left: 10px;
  text-align: center;
  padding: 12px;
  color: rgb(37, 35, 35);
  text-decoration: none;
  font-size: 17px;
  cursor: pointer;
}

/* Navbar links on mouse-over */
.navbar a:hover {
  background-color: #ffbb00;
}

/* Current/active navbar link */
.active {
  background-color: #04AA6D;
}

/* Add responsiveness - will automatically display the navbar vertically instead of horizontally on screens less than 500 pixels */
@media screen and (max-width: 800px) {
  .navbar .fas {
      float: none;
      display: block;
      margin-left: auto;
      margin-right: auto;
  }

  .navbar input[type=text] {
      float: none;
      display: block;
      width: 80%;
      margin: 10px auto;
  }
}

.navbar input[type=text] {
  float: left;
  padding: 6px;
  border: none;
  margin-top: 8px;
  margin-right: 16px;
  font-size: 17px;
  border-radius: 10px;
  background-color: whitesmoke;
  color: white;
  margin-left: 50px;
  width: 200px;
}

.navbar p {
  color: rgb(63, 60, 60);
  float: left;
  padding: px;
  font-size: 20px;
}

.language-dropdown {
  border-right: 2px solid rgb(185, 184, 184);
  position: relative;
  cursor: pointer;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #290044;
  min-width: 160px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  z-index: 1;
}

.dropdown-content a {
  color: #fff;
  text-decoration: none;
  display: block;
  padding: 8px;
}

.world-icon {
  margin-right: 5px;
}

/* When the screen is less than 600px wide, stack the links and the search field vertically instead of horizontally */
@media screen and (max-width: 600px) {
  .navbar .fas, .navbar input[type=text] {
      float: none;
      display: block;
      text-align: left;
      width: 100%;
      margin: 0;
      padding: 14px;
  }

  .topnav input[type=text] {
      border: 1px solid #ccc;
  }
}


.user-dropdown {
  position: relative;
  cursor: pointer;
  border-left: 2px solid rgb(185, 184, 184);
}

.dropdown {
  display: none;
  position: absolute;
  background-color: #333;
  min-width: 160px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  z-index: 1;
}

.dropdown a {
  color: #fff;
  text-decoration: none;
  display: block;
  padding: 8px;
}

.user-icon {
  margin-right: 5px;
}
 </style>
</head>
<body>
  <nav>
  <div class="navbar">

<p>Welcome to my School Management System</p>



<div class="language-dropdown" onclick="toggleDropdown('languageDropdown')">
    <i class="fas fa-globe world-icon"></i> <!-- World Icon -->
    <span id="selectedLanguage">English</span>
    <i class="fas fa-caret-down"></i> <!-- Dropdown Arrow Icon -->
    <div class="dropdown-content" id="languageDropdown">
        <a href="#" onclick="changeLanguage('English')">English</a>
        <a href="#" onclick="changeLanguage('Spanish')">Spanish</a>
        <a href="#" onclick="changeLanguage('French')">French</a>
        <!-- Add more language options as needed -->
    </div>
</div>




<div class="user-dropdown" onclick="toggleDropdown('userDropdown')">
<i class="fas fa-user user-logo"></i> <!-- User Logo -->
<span id="username">John Doe</span>
<i class="fas fa-caret-down"></i> <!-- Dropdown Arrow Icon -->
<div class="dropdown-content" id="userDropdown">
<a href="#" onclick="navigateTo('settings.html')">Settings</a>
<a href="#" onclick="navigateTo('logout.html')">Logout</a>
</div>
</div>

</div>



</div>
</div>

  </nav>
    
       
      
   
</body>
<script src="search.js"></script>
<script>

function toggleDropdown(dropdownId) {
        const dropdown = document.getElementById(dropdownId);
        dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
    }

    function changeLanguage(language) {
        document.getElementById('selectedLanguage').innerText = language;
        // You can perform additional actions based on the selected language
        toggleDropdown('languageDropdown'); // Close the language dropdown after selecting a language
    }

    function navigateTo(page) {
        // Redirect to the specified page
        window.location.href = page;
    }

    


  
    
</script>
</html>

