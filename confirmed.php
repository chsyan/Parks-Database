<?php
include 'nav-bkg.php';
echo '<div class="border border-secondary d-flex justify-content-center align-items-center h-75" >';
include 'connect.php';
$conn = OpenCon();
session_start();
$email = $_SESSION['e1'];
$reservation_id = uniqid();
$id2 = $_SESSION['id'];
$number = $_SESSION['number'];
$amount = $_SESSION['amount_paid'];
$date = $_SESSION['date'];
$sql1 = "Insert into Books_Activity_Amount values ('$id2','$number', '$amount')";
$sql2 = "Insert into Books_Reservation_ID values ('$reservation_id', '$id2','$date','$email','$number')";


$conn = OpenCon();
if ($conn->query($sql2) === TRUE) {
    header("refresh:5;url= visitor.php");
    echo "Reservation Confirmed.";
    echo "<br>";
    echo "Redirecting to the homepage...";
} else {
  echo "Booking Failed. ".$conn->error;
}
?>