<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require_once('DBconnect.php');
    session_start();
    ?>
    <title>Home Page</title>
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
        .welcome-message2 {
            background-color: #ffffff;
            color: #ff0000;
            padding: 10px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            text-align: center;
            width: 70%;
        
        }
      
        .developer {
            background-color: #d7d7d7;
            color: #009721;
            padding: 10px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            text-align: center;
            width: 70%;
        
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
        }.image-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px;
            max-width: 1900px;
            margin: 0 auto;

            background-color: #d7d7d7;
            color: #009721;
            padding: 10px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            text-align: center;
            width: 70%;
            }

        .image-item {
            width: calc(20.33% - 20px);
            padding: 10px;
            box-sizing: border-box;
            text-align: center;
            font-weight: bold;
            }

        .image-item img {
            max-width: 100%;
            height: auto;
            }

            @media screen and (max-width: 768px) {
            .image-item {
                width: calc(50% - 20px);
            }
            }

    </style>
</head>
<body>
    <div class="welcome-message">
        
        <h2><marquee behavior = 'alternate'>Welcome to Railway E-ticketing System</marquee></h2>
        <a href="home.php">
            <img src="pics/bangladesh-railway.png" alt="Logo" width="100">
        </a>
        
        <p><span style="color: rgb(0, 0, 0); font-weight: bold">Developed by TEAM ROCK</span></p>
    </div>
    <br>
    <br>
    <br>
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
    }elseif($ses == true){
        echo '<div class="page-links-box3">';
        echo "<a href='$l1'>Home</a>";
        echo "<a href='$l4'>Train Information</a>";
        echo "<a href='$l5'>My Account</a>";
        echo '</div>';
    }
    ?>
</body>
<p><br></p>

  <div class="welcome-message2">
    <img src="pics/BD.png" alt="Logo" width="50">
    <p><span style="color: rgb(0, 0, 0); font-weight: bold">This Website is a property of the Government of Peoples Republic of Bangladesh.<br> Any forgery of the service provided by this website or copying anything of it is punishable by the law.</span></p>
</div>
   
<div class="developer">
<h1 align='center'>Developers</h1>
</div>
<div class="image-list">

<div class="image-item">
    <img src="pics/ahnaf.jpg" alt="Image 1" width="100">
    <p>Asif Ahnaf Chowdhury</p>
</div>

<div class="image-item">
    <img src="pics/hanif.jpg" alt="Image 2" width="100">
    <p>Md. Abu Hanif Siam</p>
</div>

<div class="image-item">
    <img src="pics/niloy.jpg" alt="Image 3" width="100">
    <p>Md. Nafis Sadique Niloy</p>
</div>

<div class="image-item">
    <img src="pics/alvi.jpg" alt="Image 4" width="100">
    <p>Abdul Khalek Alve</p>
</div>

<div class="image-item">
    <img src="pics/akib.jpg" alt="Image 5" width="100">
    <p>Akib Sarwar</p>
</div>
</div>


</body>
</html>
