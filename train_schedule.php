<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Railway E-ticket</title>
    <?php
    require_once('DBconnect.php');
    session_start();
    ?>
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
        .schedule-box {
            background-color: #ffffff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 500px;
            text-align: center;
            margin-top: 20px;
        }
        .schedule-box h2 {
            margin-bottom: 20px;
            color: #1b5b00;
        }
        .schedule-box label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }
        .schedule-box select,
        .schedule-box input[type="date"],
        .schedule-box input[type="text"],
        .schedule-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .schedule-box input[type="submit"] {
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
            width: 50%;
            text-align: center;
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .page-links-box a {
            color: #1b5b00;
            text-decoration: none;
            margin: 0;
        }.page-links-box2 {
            background-color: #f9f9f9;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 10%;
            text-align: center;
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .page-links-box2 a {
            color: #1b5b00;
            text-decoration: none;
            margin: 0;
        }.page-links-box3 {
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
        .page-links-box3 a {
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
    <?php
    $l1 = 'home.php';
    $l2 = 'login.php';
    $l3 = 'registration.php';
    $l4 = 'train_schedule.php';
    $l5 = 'myacc.php';
    $ses = false;
    if (isset($_SESSION['phone'])) {
        $ses = true;
      }
    if ($ses == false) {
        echo '<div class="page-links-box3">';
        echo "<a href='$l1'>Home</a>";
        echo "<a href='$l2'>Login</a>";
        echo "<a href='$l3'>Registration</a>";
        //echo "<a href='$l4'>Train Information</a>";
        echo '</div>';
    }elseif($ses == true){
        echo '<div class="page-links-box2">';
        echo "<a href='$l1'>Home</a>";
        //echo "<a href='$l4'>Train Information</a>";
        echo "<a href='$l5'>My Account</a>";
        echo '</div>';
    }
    ?>

    <div class="schedule-box">
        <h2>Schedule a Journey</h2>
        <form action="showcase.php" method="post">
            <label for="from">From:</label>
            <select id="from" name="from">
                <option value="Choose a Starion">Choose a Station</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Rangpur">Rangpur</option>
                <option value="Chattogram">Chattogram</option>
                <option value="Sylhet">Sylhet</option>
                <option value="Barishal">Barishal</option>
                
            </select>
            <label for="to">To:</label>
            <select id="to" name="to">
                <option value="Choose a Starion">Choose a Station</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Rangpur">Rangpur</option>
                <option value="Chattogram">Chattogram</option>
                <option value="Sylhet">Sylhet</option>
                <option value="Barishal">Barishal</option>
                
            </select>
            <label for="date">Date:</label>
<input type="date" id="date" name="date" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" max="<?php echo date('Y-m-d', strtotime('+3 days')); ?>" required>


            <label for="class">Class:</label>
            <select id="class" name="class">
                <option value="Choose a class">Choose a class</option>
                <option value="Cabin">Cabin</option>
                <option value="Snigdha">Snigdha</option>
                <option value="Shovon">Shovon</option>
            </select>
            <input type="submit" value="Search">
        </form>
        <?php
        if (isset($_SESSION['route_error'])){
            echo '<p><span style="color: rgb(255, 0, 0); font-weight: bold">
            No train is available on this route<br>Please, try different route.</span></p>';
            unset($_SESSION['route_error']);
        }

        ?>
    </div>
</body>
</html>
