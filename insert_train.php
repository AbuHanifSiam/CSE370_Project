<?php
// first of all, we need to connect to the database
require_once('DBconnect.php');
session_start();
date_default_timezone_set("Asia/Dhaka");
$today = date('Y-m-d');
$day1 = date('Y-m-d', strtotime('+1 days'));
$day2 = date('Y-m-d', strtotime('+2 days'));
$day3 = date('Y-m-d', strtotime('+3 days'));


// available routes
//$routes = "SELECT Route_name from route_fare";
//$rest_route = mysqli_query($conn, $routes);
//echo $rest_route;


// write the query to check if the data exists in our database
$tc=$_POST['Train_Code'];
$tn=$_POST['Train_Name'];
$fr = $_POST['Frequency'];
$st_t = $_POST['Start_time'];
$ed_t = $_POST['End_time'];
$st_s = $_POST['Start_Station_Code'];
$ed_s = $_POST['End_Station_Code'];


if($st_s=='Chattogram'){
    $st_s='CTG';
}else if($st_s=='Dhaka'){
    $st_s = 'DHK';
}
else if($st_s=='Rangpur'){
    $st_s='RNG';
}else if($st_s=='Sylhet'){
    $st_s='SYL';
}else if($st_s=='Barishal'){
    $st_s='BAR';
}

if($ed_s=='Chattogram'){
    $ed_s='CTG';
}
else if($ed_s=='Rangpur'){
    $ed_s='RNG';
}else if($ed_s=='Sylhet'){
    $ed_s='SYL';
}else if($ed_s=='Barishal'){
    $ed_s='BAR';
}


if($st_s=='Choose Start Station' || $ed_s=='Choose End Station'){
    echo "Invalid Station";
}
else{

$sql = " INSERT INTO train VALUES( '$tc','$tn','$fr','$st_t','$ed_t','$st_s','$ed_s' ) ";
$rest = mysqli_query($conn, $sql);
$rn = $st_s.'-'.$ed_s;
$sqlrut = "SELECT * FROM route_fare WHERE route_name = '$rn'";
$res = mysqli_query($conn, $sqlrut);
$rowrt = mysqli_fetch_array($res);
//echo $rowrt[0];
$sqlstp = "INSERT INTO stops Values ('$rowrt[0]', '$tc')";
$res1 = mysqli_query($conn, $sqlstp);

// Seat availability er update
// retrieve class id from class table

$sqlclass = "SELECT DISTINCT Class_ID from class";

$res2 = mysqli_query($conn, $sqlclass);
//echo $res2;
//$rowcls = mysqli_fetch_array($res2);
//echo $rowcls;
//$row = mysqli_fetch_array($res2);
while($row = mysqli_fetch_assoc($res2)){
    //echo $row["Class_ID"];
    $class_id = $row['Class_ID'];
    $newrow1_1 = "INSERT INTO seat_availability VALUES ('$class_id', '$tc', '$day1', 10)"; 
    $update1_1 = mysqli_query($conn, $newrow1_1);
    $newrow1_2 = "INSERT INTO seat_availability VALUES ('$class_id', '$tc', '$day2', 10)"; 
    $update1_2 = mysqli_query($conn, $newrow1_2);
    $newrow1_3 = "INSERT INTO seat_availability VALUES ('$class_id', '$tc', '$day3', 10)"; 
    $update1_3 = mysqli_query($conn, $newrow1_3);
}
}

//Execute the query 

//check if this insertion is happening in the database
if(mysqli_affected_rows($conn)){
	if(mysqli_affected_rows($conn)){
		echo "Inseted Successfully";
		header("Location: adminc.php");
       
	}
	else{
		echo "Insertion Failed";
		
	}
}
else{
	echo "Insertion Failed";
	
}




?>