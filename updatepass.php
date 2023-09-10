<?php
// first of all, we need to connect to the database
require_once('DBconnect.php');
session_start();

// write the query to check if this username and password exists in our database
$phn = $_SESSION['phone'];
$opas = $_POST['oldpass'];
$npas = $_POST['newpass'];
$sql = "SELECT password FROM passenger WHERE phone = '$phn'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
if ($row['password'] == $opas) {
    $sql1 = "UPDATE `passenger` SET `password` = '$npas' WHERE `passenger`.`Phone` = '$phn';";
    $result1 = mysqli_query($conn, $sql1); // sql running command
    header('Location: myacc.php');
} else {
    echo "<script>alert('Old password is incorrect')</script>";
}

?>

