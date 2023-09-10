<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <?php
    require_once('DBconnect.php');
    session_start();
    $phn = $_SESSION['phone'];

    ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ecebeb;
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
        .profile-box {
            background-color: #e5e3e3;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.2);
            width: 250px;
            text-align: center;
            margin-top: 20px;
        }
        .profile-box h2 {
            margin-bottom: 20px;
            color: #1b5b00;
        }
        .profile-box label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }
        .profile-box select,
        .profilee-box input[type="date"],
        .profile-box input[type="text"],
        .profile-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .profile-box input[type="submit"] {
            background-color: #147700;
            color: #ffffff;
            border: none;
            padding: 10px 30px;
            cursor: pointer;
            border-radius: 10px;
        }
        .button-box {
            background-color: #147700;
            color: #ffffff;
            border: none;
            padding: 10px 30px;
            cursor: pointer;
            border-radius: 10px;
            
        }
        .page-links-box {
            background-color: #ede9e9;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 25%;
            text-align: center;
            margin-top: 5px;
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
    <br>
    <div class="page-links-box">
        <a href="home.php">Home</a>
        <a href="train_schedule.php">Train Information</a>
        <a href="myacc.php">My Account</a>
    </div>



    <div class="profile-box">
        <h2>Refund Result:</h2>
        
        <?php
        if (isset($_SESSION['referror'])) {
            echo "<h3>Cannot cancel anymore</h3>";
        } else {
            echo "<h3>Cancelled with refund</h3>";
        }
        ?>
        <div class ="login-box">
        <form action="show_tickets.php" method="post">
            <input type="submit" value="<<Go Back">
        </form>
        </div>

</div>




<body>
</html>