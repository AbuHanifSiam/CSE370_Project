<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <?php
    require_once('DBconnect.php');
    require_once('seatinfo.php');
    session_start();
    
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
        echo '<div class="page-links-box">';
        echo "<a href='$l1'>Home</a>";
        echo "<a href='$l2'>Login</a>";
        echo "<a href='$l3'>Registration</a>";
        echo "<a href='$l4'>Train Information</a>";
        echo '</div>';
    } elseif ($ses == true) {
        echo '<div class="page-links-box3">';
        echo "<a href='$l1'>Home</a>";
        echo "<a href='$l4'>Train Information</a>";
        echo "<a href='$l5'>My Account</a>";
        echo '</div>';
    }
    ?>

    <div class="profile-box">
        <h2>Active Train Schedules</h2>
        <form action="confirm_ticket.php" method="post">
            <?php
            $from = $_POST['from'];
            $to = $_POST['to'];
            $date = $_POST['date'];
            $class = $_POST['class'];

            // from station, to station, date, class
            
            // at first check station e kon train ase and end station = '', kon train ase?
            // 
            if ($from == 'Dhaka' && $to == 'Chattogram') {
                $start_station_code = 'DHK';
                $end_station_code = 'CTG';
            }

            if ($from == 'Chattogram' && $to == 'Dhaka') {
                $start_station_code = 'CTG';
                $end_station_code = 'DHK';
            }

            if ($from == 'Dhaka' && $to == 'Rangpur') {
                $start_station_code = 'DHK';
                $end_station_code = 'RNG';
            }

            if ($from == 'Rangpur' && $to == 'Dhaka') {
                $start_station_code = 'RNG';
                $end_station_code = 'DHK';
            }

            if ($from == 'Dhaka' && $to == 'Sylhet') {
                $start_station_code = 'DHK';
                $end_station_code = 'SYL';
            }

            if ($from == 'Sylhet' && $to == 'Dhaka') {
                $start_station_code = 'SYL';
                $end_station_code = 'DHK';
            }

            if ($from == 'Dhaka' && $to == 'Barishal') {
                $start_station_code = 'DHK';
                $end_station_code = 'BAR';
            }

            if ($from == 'Barishal' && $to == 'Dhaka') {
                $start_station_code = 'BAR';
                $end_station_code = 'DHK';
            }

            if ($from == 'Chattogram' && $to == 'Rangpur') {
                $start_station_code = 'CTG';
                $end_station_code = 'RNG';
            }

            if ($from == 'Rangpur' && $to == 'Chattogram') {
                $start_station_code = 'RNG';
                $end_station_code = 'CTG';
            }

            if ($from == 'Chattogram' && $to == 'Sylhet') {
                $start_station_code = 'CTG';
                $end_station_code = 'SYL';
            }

            if ($from == 'Sylhet' && $to == 'Chattogram') {
                $start_station_code = 'SYL';
                $end_station_code = 'CTG';
            }

            if ($from == 'Chattogram' && $to == 'Barishal') {
                $start_station_code = 'CTG';
                $end_station_code = 'BAR';
            }

            if ($from == 'Barishal' && $to == 'Chattogram') {
                $start_station_code = 'BAR';
                $end_station_code = 'CTG';
            }

            if ($from == 'Barishal' && $to == 'Sylhet') {
                $start_station_code = 'BAR';
                $end_station_code = 'SYL';
            }

            if ($from == 'Sylhet' && $to == 'Barishal') {
                $start_station_code = 'SYL';
                $end_station_code = 'BAR';
            }

            if ($from == 'Barishal' && $to == 'Rangpur') {
                $start_station_code = 'BAR';
                $end_station_code = 'RNG';
            }

            if ($from == 'Rangpur' && $to == 'Barishal') {
                $start_station_code = 'RNG';
                $end_station_code = 'BAR';
            }

            if ($from == 'Sylhet' && $to == 'Rangpur') {
                $start_station_code = 'SYL';
                $end_station_code = 'RNG';
            }

            if ($from == 'Rangpur' && $to == 'Sylhet') {
                $start_station_code = 'RNG';
                $end_station_code = 'SYL';
            }


             // Route check
            $sq1 = "SELECT * FROM train WHERE start_station_code IN ('$start_station_code','$end_station_code') AND
            end_station_code IN ('$start_station_code','$end_station_code')";
            $result1 = mysqli_query($conn, $sq1);
           
            if(mysqli_num_rows($result1) >= 1){
                    
                // train name, timing, station, class, seats, class_fare
                $sql = "SELECT train_name,start_time,end_time,type,seat_count,class_rate*fare AS fare , start_station_code, end_station_code 
                    from TRAIN,CLASS,STOPS,ROUTE_FARE,SEAT_AVAILABILITY
                    WHERE TRAIN.train_code = STOPS.train_code and
                    STOPS.route_id = ROUTE_FARE.route_id and
                    train.train_Code = seat_availability.train_Code AND
                    seat_availability.class_ID = class.class_ID AND
                    type = '$class' AND 
                    seat_availability.date = '$date' AND
                    start_station_code IN ('$start_station_code','$end_station_code') AND
                    end_station_code IN ('$start_station_code','$end_station_code') ";

                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                if ($start_station_code == $row['start_station_code']){
                    $time1 = $row['start_time'];
                } else {
                    $time1 = $row['end_time'];
                }
                echo "<h3>Journery from $from to $to</h3><br>";
                echo "<B>Following Trains are available according to your specifications</B><br>";

                echo "Train Name: " . $row['train_name'] . "<br>";
                echo "Date of Journey: " . $date . "<br>";
                echo "Departure Time: " . $time1 . "<br>";
                echo "Selected Class: " . $class . "<br>";
                echo "Available Seats: " . $row['seat_count'] . "<br>";
                echo "Fare per seat: " . $row['fare'] . "<br>";
                $_SESSION['tname'] = $row['train_name'];
                $_SESSION['DJ'] = $date;
                $_SESSION['DT'] = $time1;
                $_SESSION['SC'] = $start_station_code;
                $_SESSION['EC'] = $end_station_code;
                $_SESSION['class']=$class;
                $_SESSION['pF']=$row['fare'];
                
            } else{
                $_SESSION['route_error'] = true;
                //echo 'ERROR';
                header('location:train_schedule.php');
            }
            $ty = "number";
            $nm = "Ticket";
            $ph = "Number of Tickets";
            $sty = "padding: 7px; width: 110px; border-radius: 10px; font-size: 12px;";
            $min = 1;
            $max = $row['seat_count'];
            echo "<input type='$ty' name='$nm' placeholder='$ph' style='$sty' min='$min' max='$max' required>";
            ?>
            <br>
            <br>
            <input type="submit" value="Book">
        </form>



    </div>








    <body>

</html>