<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
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
        .reg-box {
            background-color: #ffffff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
        }
        .reg-box h2 {
            margin-bottom: 20px;
        }
        .reg-box input[type="phone"],
        .reg-box input[type="text"],
        .reg-box input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 100px;
        }
        .reg-box input[type="submit"] {
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
        
        <h2>Welcome to Railway E-ticketing System</h2>
        <a href="home.php">
            <img src="pics/bangladesh-railway.png" alt="Logo" width="100">
        </a>
        <p><span style="color: rgb(0, 0, 0); font-weight: bold">Developed by Group 8</span></p>
    </div>
    <div class="page-links-box">
        <a href="home.php">Home</a>
        <a href="login.php">Login</a>
        <a href="train_schedule.php">Train Information</a>
    </div>
</body>
<p><br></p>
<body>
    <div class="reg-box">
        <h2>Registration</h2>
        <form action="insert_passenger.php" method="post">
            <input type="text" name="p_name" placeholder="Offical Name" required>
            <input type="text" name="p_nid" placeholder="NID Number" required pattern="^(1|2)[0-9]{9}$">
            <input type="Phone" name="phone" placeholder="Phone" required pattern="^(?:\+8801|01)[0-9]{9}$">
            <input type="password" name="password" placeholder="Password" required minlength="6">
            <input type="submit" value="Register">
        </form>
    </div>
    
</body>
</html>
