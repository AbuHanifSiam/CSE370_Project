<?php
require_once('DBconnect.php');
session_start();
$phn =  $_SESSION['phone'];

$tid = $_POST['rf'];
$sqlt = "SELECT * FROM ticket WHERE Ticket_ID = $tid";
$resultt = mysqli_query($conn, $sqlt);
$tici = mysqli_fetch_array($resultt);

$origin = date_create($tici["From_date"]);
$target = date_create(date('Y-m-d'));
$interval = date_diff($origin, $target);
$gap = $interval->format('%a');

if ($gap>=1){
    $sqlrt = "SELECT * FROM reserved_ticket WHERE Ticket_ID = $tid";
    $resultrt = mysqli_query($conn, $sqlrt);
    $rowt = mysqli_fetch_array($resultrt);

    $fare = $rowt[3];
    $w = $rowt[5];
    $count = $rowt['count'];
    $cls = $tici['Class_ID'];
    $fromd = $tici['From_date'];
    $fs = $tici['From_station'];
    $ts = $tici['To_station'];
    $sq1 = "SELECT * FROM train WHERE start_station_code IN ('$fs','$ts') AND
    end_station_code IN ('$fs','$ts')";
    $result1 = mysqli_query($conn, $sq1);
    $rowtr = mysqli_fetch_array($result1);

    $trainc = $rowtr['Train_Code'];

    $sqlrf = "UPDATE wallet SET wallet.balance = (wallet.balance+$fare) WHERE wallet.wallet_id = $w";
    $sqlsc = "UPDATE seat_availability SET seat_count= (seat_count + $count) WHERE Class_ID = '$cls' AND Train_Code = '$trainc' AND date = '$fromd' ";
    $sqltc = "DELETE FROM ticket WHERE Ticket_ID = $tid";
    $sqlrc = "DELETE FROM reserved_ticket WHERE Ticket_ID = $tid";
    


    $result = mysqli_query($conn, $sqlrf);
    $result = mysqli_query($conn, $sqlsc);
    $result = mysqli_query($conn, $sqltc);
    $result = mysqli_query($conn, $sqlrc);
    
    header('Location: refdone.php');
} else {
    $_SESSION['referror']=true;
    header('Location: refdone.php');;
}
?>