<?php
//only for new train
// first of all, we need to connect to the database
require_once('DBconnect.php');
session_start();
// write the query to check if the data exists in our database
$c_code=$_POST['Class_ID'];
//$c_nm=$_POST['Type'];
$price = $_POST['Class_rate'];
//$seat = $_POST['Seats_per_coach'];

$sql = " UPDATE class SET  Class_rate = $price WHERE Class_ID = $c_code";

//Execute the query 
$result = mysqli_query($conn, $sql);

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