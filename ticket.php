<?php
// first of all, we need to connect to the database
require_once('DBconnect.php');
session_start();
$phn = $_SESSION['phone'];
// write the query to check if the data exists in our database
$Amount=$_SESSION['Amount'];
$Wallet_ID=$_SESSION['wallet'];

$count=$_SESSION['count'];
$t=$_SESSION['tname'];
$dj=$_SESSION['DJ'];
$dt=$_SESSION['DT'];
$cls=$_SESSION['class'];
$q="SELECT * from class where type = '$cls'";
$res=mysqli_query($conn,$q);
$row=mysqli_fetch_array($res);
$Class_ID=$row['Class_ID'];

$q2="SELECT * from train where train_name = '$t'";
$res2=mysqli_query($conn,$q2);
$row2=mysqli_fetch_array($res2);
$trainc=$row2['Train_Code'];

$count= $_SESSION['count'] ;


$Ticket_ID= rand(10000,99999);;

$start_time=$_SESSION['DT'];
$From_date=$_SESSION['DJ'];
$From_Station=$_SESSION['SC'];
$To_Station=$_SESSION['EC'];

$sql = " INSERT INTO ticket VALUES ('$Ticket_ID','$Amount','$start_time','$From_date','$From_Station','$To_Station','$phn','$Class_ID' ) ";
//Execute the query 
$result = mysqli_query($conn, $sql);

$Pay_ID= rand(10000,99999);;
$_SESSION['Pay_ID']=$Pay_ID;
$Pay_time=date('hh:mm:ss');
$Pay_date=date('Y-m-d');


//Seat count update
$sql2 = "UPDATE seat_availability SET seat_count= (seat_count - '$count') WHERE Class_ID = '$Class_ID' AND Train_Code = '$trainc' AND date = '$dj' ";
$res3 = mysqli_query($conn, $sql2);

//User reserver_ticket input
$sql1 ="INSERT INTO reserved_ticket VALUES ( '$Pay_ID','$Pay_time','$Pay_date','$Amount','$Ticket_ID','$Wallet_ID','$phn','$count')";





$result1 = mysqli_query($conn, $sql1);



  
if(mysqli_affected_rows($conn)){
	if(mysqli_affected_rows($conn)){

		//update balance after buying ticket
		
		$sqlrf = "UPDATE wallet SET balance = (balance-$Amount) WHERE Wallet_ID = $Wallet_ID ";
		$result2 = mysqli_query($conn, $sqlrf);
		echo "Congratulations";
		header("Location: show_tickets.php");
		
       
	}
	else{
		echo "Failed Transaction";
		
	}
}
else{
	echo "Failed Transaction";
	
}




?>