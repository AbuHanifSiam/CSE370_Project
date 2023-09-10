<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control</title>
    <?php
    require_once('DBconnect.php');
    session_start();
    $phn = $_SESSION['phone'];
    if ($phn!='01717399105' && $phn!='01716484787'&& $phn!='01775146904' && $phn!='01896325741' && $phn!='01534740578'){
        $_SESSION['adminerror']=true;
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
        <h2>ADMIN CONTROL</h2>
        <a href="home.php">
            <img src="pics/bangladesh-railway.png" alt="Logo" width="100">
        </a>
        <p><span style="color: rgb(0, 0, 0); font-weight: bold">Developed by Group 8</span></p>
    </div>
    <div class="page-links-box">
        <a href="home.php">Home</a>
        <a href="train_schedule.php">Train Information</a>
        <a href="myacc.php">My Account</a>
    </div>
    <div class="profile-box">
        
        <h2>Add Class</h2>


        <form action="insert_class.php" method="post">
            <!--<input type="Number" name="Class_ID" placeholder="Class ID" required style="padding: 10px; width: 95%; border-radius: 5px;font-size: 10px;">-->
            <!--<br>-->
          
            <!--<br>-->
            <!--<input type="Text" name="Type" placeholder="Class Name" required style="padding: 10px; width: 95%; border-radius: 5px;font-size: 10px;">-->
            <!--<input type="Decimal" name="Class_rate" placeholder="Price Multiple" required style="padding: 10px; width: 95%; border-radius: 5px;font-size: 10px;">-->
            <!--<br>-->
            <!--<br>-->
            <!--<input type="Number" name="Seats_per_coach" placeholder="Seat Per Class" required style="padding: 10px; width: 95%; border-radius: 5px;font-size: 10px;">-->
            <!--<br>-->
            <!--<br>-->
            <!--<input type="submit" value="Insert"style="padding: 5px; width: 80px; border-radius: 10px;font-size: 15px;">-->


            <!--<label for="Class_ID">Class ID</label>-->
            <!--<select id="Class_ID" name="Class_ID">-->
                <!--<option value="101">101</option>-->
                <!--<option value="202">202</option>-->
                <!--<option value="303">303</option>    -->
            <!--</select>-->

            <label for="Class_ID">Class Name</label>
            <!--<input type="Text" name="Type" placeholder="Class Name" required style="padding: 10px; width: 95%; border-radius: 5px;font-size: 10px;">-->
            <select id="Class_ID" name="Class_ID">
                <option value="101">101-CABIN</option>
                <option value="202">202-SNIGDHA</option>
                <option value="303">303-SHOVON</option>    
            </select>

            <label for="Class_rate">Class Rate</label>
            <input type="Decimal" name="Class_rate" placeholder="Price Multiple" required style="padding: 10px; width: 95%; border-radius: 5px;font-size: 10px;">
            
            <br>
            <br>
            
            <!--<label for="Seats_per_coach">Seat Per Class</label>
            <input type="Number" name="Seats_per_coach" placeholder="Seat Per Class" required style="padding: 10px; width: 95%; border-radius: 5px;font-size: 10px;">
            
            <br>
            <br>-->
            <input type="submit" value="Insert"style="padding: 5px; width: 80px; border-radius: 10px;font-size: 15px;">
        </form>
        </form>
       </div>
    
    </div>
    <div class = "profile-box">
        <h2>Available Train Routes</h2>
            <?php
                $routes = "SELECT Route_name from route_fare";
                $rest_route = mysqli_query($conn, $routes);
                //echo $rest_route;
                while($row = mysqli_fetch_assoc($rest_route)){
                    $r = $row['Route_name'];
                    echo "<h3>$r</h3>";
                }
            ?>

    </div>
    <div class="profile-box">
        <h2>Add Train</h2>
        <form action="insert_train.php" method="post">
        <label for="to">Train Code:</label>
        <input type="Number" name="Train_Code" placeholder="Train Code" required style="padding: 10px; width: 95%; border-radius: 5px;font-size: 10px;">
        <br>
        <br>
        <label for="to">Train Name:</label>
        <input type="Text" name="Train_Name" placeholder="Train Name" required style="padding: 10px; width: 95%; border-radius: 5px;font-size: 10px;">
        <label for="to">Frequency:</label>
        <input type="Decimal" name="Frequency" placeholder="frequency" required style="padding: 10px; width: 95%; border-radius: 5px;font-size: 10px;">
        <br>
        <br>
        <label for="to">Start Time:</label>
        <input type="Text" name="Start_time" placeholder="00:00:00  (24 hour format)" required style="padding: 10px; width: 95%; border-radius: 5px;font-size: 10px;">
        <label for="to">End Time:</label>
        <input type="Text" name="End_time" placeholder="00:00:00  (24 hour format)" required style="padding: 10px; width: 95%; border-radius: 5px;font-size: 10px;">
        
        <label for="to">From:</label>
            <select id="from" name="Start_Station_Code">
                <option value="Dhaka">Dhaka</option>
                <option value="Rangpur">Rangpur</option>
                <option value="Chattogram">Chattogram</option>
                <option value="Sylhet">Sylhet</option>
                <option value="Barishal">Barishal</option>
                
            </select>
            <label for="to">To:</label>
            <select id="to" name="End_Station_Code">
                <option value="Dhaka">Dhaka</option>
                <option value="Rangpur">Rangpur</option>
                <option value="Chattogram">Chattogram</option>
                <option value="Sylhet">Sylhet</option>
                <option value="Barishal">Barishal</option>
                
            
            <input type="submit" value="Insert">
        </form>
    </div>

    </div>

    


    
    
    

<body>
</html>
