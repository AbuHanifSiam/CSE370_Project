<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    session_start();
    ?> 
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: top;
            align-items: center;
            min-height: 100vh;
        }
        .welcome-message {
            background-color: #1b5b00;
            color: #ff0000;
            padding: 10px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            text-align: center;
            width: 100%;
        }
        .login-box {
            background-color: #ffffff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
        }
        .login-box h2 {
            margin-bottom: 20px;
        }
        .login-box input[type="phone"],
        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 100px;
        }
        .login-box input[type="submit"] {
            background-color: #147700;
            color: #ffffff;
            border: none;
            padding: 10px 30px;
            cursor: pointer;
            border-radius: 10px;
        }
        .page-links-box {
            background-color: #f9f9f9;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 25%;
            text-align: center;
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .page-links-box a {
            color: #1b5b00;
            text-decoration: none;
            margin: 0;
        }
               
    </style>
</head>
<body>
    <div class="welcome-message">
        
        <h2>Railway E-ticketing System</h2>
        <a href="home.php">
            <img src="pics/bangladesh-railway.png" alt="Logo" width="100">
        </a>
        <p><span style="color: rgb(0, 0, 0); font-weight: bold">Developed by Group 8</span></p>
    </div>
    <div class="page-links-box">
        <a href="home.php">Home</a>
        <a href="registration.php">Register</a>
        <a href="train_schedule.php">Train Information</a>
        
    </div>
</body>
<p><br></p>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <?php
        if(isset($_SESSION['error'])) {
            echo '<p><span style="color: rgb(255, 0, 0); font-weight: bold">
            Incorrect username / password.<br>Please, try again.</span></p>';
            unset($_SESSION['error']);
        };
        ?>
        <form action="signin.php" method="post">
            <input type="phone" name="phone" placeholder="Phone" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="login">
        </form>
    </div>
</body>
</html>
