<?php
require_once('DBconnect.php');

session_start();

// write the query to check if this username and password exists in our database
$phn = $_SESSION['phone'];
$in = $_POST['inbalance'];
$ephn = $_POST['ecashn'];
$pin = $_POST['ecpin'];
if ($in > 1) {
$sql = "UPDATE wallet SET wallet.balance = (wallet.balance+$in) WHERE wallet.wallet_id
= (SELECT W.wallet_id FROM passenger P,wallet W WHERE P.phone = W.phone AND W.phone = '$phn')";
$result = mysqli_query($conn, $sql);
};
header('Location: myacc.php');


?>