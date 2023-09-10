<?php
// first of all, we need to connect to the database
require_once('DBconnect.php');

session_start();

// write the query to check if this username and password exists in our database
$phn = $_POST['phone'];
$pas = $_POST['password'];
$sql = "SELECT * FROM passenger WHERE phone = '$phn' AND password = '$pas'";

//Execute the query 
$result = mysqli_query($conn, $sql);

//check if it returns an empty set
if(mysqli_num_rows($result) !=0 ){
	$_SESSION['phone'] = $phn;
	//echo "LET HIM ENTER";
	header("Location: myacc.php");
}
else{
	$_SESSION['error']=true;
	header("Location: login.php");
}
	



?>
