<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        .body {
            background-image:url('back.jpg');
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        button {
            background-color: white;
            padding: 15px 30px;
            font-size: 18px;
            margin: 10px;
            cursor: pointer;
        }

        #loginButton {
            background-color: #4CAF50;
            color: white;
            border: none;
        }

        #registerButton {
            background-color: #008CBA;
            color: white;
            border: none;
        }
    </style>
</head>
<body>
     <div class="body">
     <button id="loginButton" onclick="location.href='login.php'">Login</button>
    <button id="registerButton" onclick="location.href='register.php'">Register</button>

     </div>
    
</body>
</html>
