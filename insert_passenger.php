<?php
// first of all, we need to connect to the database
require_once('DBconnect.php');
session_start();
// write the query to check if this username and password exists in our database
$phn = $_POST['phone'];
$nid = $_POST['p_nid'];
$nm = $_POST['p_name'];
$pas = $_POST['password'];
echo "$nid";
$sql = " INSERT INTO passenger VALUES( '$phn', '$nid', '$nm', '$pas' ) ";

//Execute the query 
$result = mysqli_query($conn, $sql);

//check if this insertion is happening in the database
if(mysqli_affected_rows($conn)){
	$wlt = rand(10000,99999);
	$sql1 = " SELECT * FROM wallet WHERE wallet_id = '$wlt' ";
	$result1 = mysqli_query($conn, $sql1);
	while (mysqli_num_rows($result1) !=0 ){
		$wlt++;
		$result1 = mysqli_query($conn, $sql1);
	}
	$sql2 = " INSERT INTO wallet VALUES( '$wlt', 0, '$phn' ) ";
	$result2 = mysqli_query($conn, $sql2);
	if(mysqli_affected_rows($conn)){
		echo "Inseted Successfully";
		header("Location: login.php");
	}
	else{
		echo "Insertion Failed";
		//header("Location: add_student.php");
	}
}
else{
	echo "Insertion Failed";
	//header("Location: add_student.php");
}




?>