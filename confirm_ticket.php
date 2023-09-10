<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Ticket</title>
    <?php
    require_once('DBconnect.php');
    session_start();
    if(isset($_SESSION['phone'])){
        $phn = $_SESSION['phone'];
    } else {
        header('Location: login.php');
    }

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
        .profile-box button[type="submit"] {
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
            width: 50%;
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
        .page-links-box3 {
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
        
        <h2>Welcome to Railway E-ticketing System</h2>
        <img src="pics/bangladesh-railway.png" alt="Logo" width="50">
        <p><span style="color: rgb(0, 0, 0); font-weight: bold">Developed by Group 8</span></p>
    </div>
    <?php
    $l1 = 'home.php';
    $l2 = 'login.php';
    $l3 = 'registration.php';
    $l4 = 'train_schedule.php';
    $l5 = 'myacc.php';

    echo '<div class="page-links-box3">';
    echo "<a href='$l1'>Home</a>";
    echo "<a href='$l4'>Train Information</a>";
    echo "<a href='$l5'>My Account</a>";
    echo '</div>';
    ?>
    
    <div class="profile-box">
        <h2>Confrim your Ticket</h2>
        <form action="ticket.php" method="post">
            <?php
            
            $query1 = "SELECT W.* FROM passenger P,wallet W WHERE P.phone = '$phn' AND P.phone = W.phone";
            $result1 = mysqli_query($conn, $query1);
            $row1 = mysqli_fetch_array($result1);
            $Wallet_ID=$row1['Wallet_ID'];

            $_SESSION['wallet']=$row1['Wallet_ID'];
            
            $count=$_POST['Ticket'];
            $_SESSION['count']=$count;
            $t=$_SESSION['tname'];
            $dj=$_SESSION['DJ'];
            $dt=$_SESSION['DT'];
            $cls=$_SESSION['class'];
            $Amount=$_SESSION['pF']*$count;
            $_SESSION['count']=$count;
            $_SESSION['Amount']=$Amount;
            echo "<h4>Journery from Dhaka to Rangpur </h4><br>";
            echo "Phone Number:". $phn ."<br>";
            echo "Wallet ID:". $Wallet_ID ."<br>";
            echo "Train Name:". $t ."<br>";
            echo "Date of Journey: ".$dj."<br>";
            echo "Departure Time: ".$dt." <br>";
            echo "Selected Class: ".$cls."<br>";
            echo "Your Total Fare:".$Amount." <br>";
            ?>
            <br>
            <br>
            <?php
            $query1 = "SELECT W.* FROM passenger P,wallet W WHERE P.phone = '$phn' AND P.phone = W.phone";
            $result1 = mysqli_query($conn, $query1);
            $row1 = mysqli_fetch_array($result1);
            $bln = $row1['balance'];
            $val = "Confirm Ticket";
            $val1 = "Not enough money";
            $ty = "submit";
            if ($bln >= $Amount) {
                echo "<input type='$ty' value='$val'>";
            } else {echo "<font color='red'>$val1</font>"; }
            ?>
            
          
            
        </form>
    </div>
    <br>
    <div class="profile-box">
    <form action="myacc.php" method="post">
					<?php
					$a = "";
					$b = "submit";
					
                    echo "<button type='$b'>Recharge</button>";
					?>
    </form>
    </div>


   
   
   
    
    
    
    

<body>
</html>


    
   