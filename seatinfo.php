<?php
require_once('dbconnect.php');
date_default_timezone_set("Asia/Dhaka");
$today = date('Y-m-d');
$day1 = date('Y-m-d', strtotime('+1 days'));
$day2 = date('Y-m-d', strtotime('+2 days'));
$day3 = date('Y-m-d', strtotime('+3 days'));

// Seat updating..............

$trains = "SELECT class_id,train_code FROM seat_availability WHERE date = '9999-12-31' ORDER BY train_code ASC, class_id ASC";
$trrun = mysqli_query($conn, $trains); // getting train codes

$delrow = "DELETE FROM seat_availability WHERE date <= '$today'";
mysqli_query($conn, $delrow); // deleting present day's rows because we do not serve these tickets




while($row = mysqli_fetch_assoc($trrun)) {
    //echo  $row["class_id"]. "&nbsp".$row["train_code"]. "&nbsp".$row["date"]. "<br>";
    $class_id = $row['class_id'];
    $train_code = $row['train_code'];
    //echo $class_id.'__'.$train_code."<br>";
    $sqlin3 = "SELECT * FROM seat_availability WHERE class_id = '$class_id' AND train_code = '$train_code' AND ('$class_id','$train_code', '$day1') IN (SELECT class_id, train_code, date FROM seat_availability)";
    $resin3 = mysqli_query($conn, $sqlin3);
    $sqlin2 = "SELECT * FROM seat_availability WHERE class_id = '$class_id' AND train_code = '$train_code' AND ('$class_id','$train_code', '$day2') IN (SELECT class_id, train_code, date FROM seat_availability)";
    $resin2 = mysqli_query($conn, $sqlin2);
    $sqlin1 = "SELECT * FROM seat_availability WHERE class_id = '$class_id' AND train_code = '$train_code' AND ('$class_id','$train_code', '$day3') IN (SELECT class_id, train_code, date FROM seat_availability)";
    $resin1 = mysqli_query($conn, $sqlin1);

    if (mysqli_num_rows($resin3) == 0) {
        $newrow = "INSERT INTO seat_availability VALUES ('$class_id', '$train_code', '$day1', 10)"; 
        $update = mysqli_query($conn, $newrow);
        $newrow1 = "INSERT INTO seat_availability VALUES ('$class_id', '$train_code', '$day2', 10)"; 
        $update1 = mysqli_query($conn, $newrow1);
        $newrow2 = "INSERT INTO seat_availability VALUES ('$class_id', '$train_code', '$day3', 10)"; 
        $update2 = mysqli_query($conn, $newrow2);
        echo "in 3 <br>";
    } elseif (mysqli_num_rows($resin2) == 0) {
        $newrow = "INSERT INTO seat_availability VALUES ('$class_id', '$train_code', '$day2', 10)"; 
        $update = mysqli_query($conn, $newrow);
        $newrow1 = "INSERT INTO seat_availability VALUES ('$class_id', '$train_code', '$day3', 10)"; 
        $update1 = mysqli_query($conn, $newrow1);
    } elseif (mysqli_num_rows($resin1) == 0) {
        $newrow = "INSERT INTO seat_availability VALUES ('$class_id', '$train_code', '$day3', 10)"; 
        $update = mysqli_query($conn, $newrow);
    } 
    //echo "Success<br>";
}


// Seat updating..............Done





?>