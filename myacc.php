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
            width: 500px;
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
            width: 80%;
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
        .wallet-section {
            background-color: #e5e3e3;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.2);
            width: 500px;
            text-align: center;
            margin-top: 20px;
        }

        .wallet-section input {
            width: 80%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }.wallet-section h2 {
            margin-bottom: 20px;
            color: #1b5b00;
        }


        .wallet-section input[type="submit"] {
        background-color: #147700;
        color:#e5e3e3;
        border: none;
        cursor: pointer;
        text-align: center;
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
    <div class="wallet-section">
        
        <h2>Wallet</h2>

        <?php
        $query1 = "SELECT W.* FROM passenger P,wallet W WHERE P.phone = '$phn' AND P.phone = W.phone";
        $result1 = mysqli_query($conn, $query1);
        $row1 = mysqli_fetch_array($result1);
        echo "<b>Balance: ".$row1['balance']. " BDT</b><br><br>";
        ?>

        <form action="cashin.php" method="post">
            <input type="number" name="inbalance" placeholder="Insert Balance" required>
            <input type="phone" name="ecashn" placeholder="E-Cash number" required>
            <input type="password" name="ecpin" placeholder="E-Cash PIN" required>
            <input type="submit" value="Insert"style="padding: 5px; width: 80px; border-radius: 10px;font-size: 15px;">
        </form>
       </div>
    
    </div>
    <div class="profile-box">
        <h2>My Account</h2>
        <?php
        $query = "SELECT * FROM passenger WHERE `phone` = '$phn'";
        
        //Execute the query 
        $result = mysqli_query($conn, $query);
        
        $row = mysqli_fetch_array($result);
        
        echo "Name: ".$row['P_Name']. "<br>";
        echo "Phone: ".$row['Phone']. "<br>";
        echo "NID: ".$row['P_NID']. "<br>";
        ?>

    </div>

    <div class="profile-box">
        <h2>Change Password</h2>
        <form action="updatepass.php" method="post">
            <input type="password" name="oldpass" placeholder="Old Password" required>
            <input type="password" name="newpass" placeholder="New Password" required>
            <input type="submit" value="Change Password">
        </form>
    </div>
    
    <br>
    <div class="button-box">
        <a href="logout.php" style="color:#ffffff;padding: 5px; width: 80px; border-radius: 10px;font-size: 15px;">Logout</a>
    </div>

    <br>
    <div class="button-box">
        <a href="show_tickets.php" style="color:#ffffff;padding: 5px; width: 80px; border-radius: 10px;font-size: 15px;">My Tickets</a>
    </div>
    
    <br>

    <?php
    if ($phn=='01717399105' || $phn=='01716484787'|| $phn=='01775146904' || $phn=='01896325741' || $phn=='01534740578'){
        
    ?>

    <div class="button-box">
        <a href="adminc.php" style="color:#ffffff;padding: 5px; width: 80px; border-radius: 10px;font-size: 15px;">Admin Control</a>
    </div>

    <?php
        }
    ?>
    


    
    
    

<body>
</html>