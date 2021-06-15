<?php
include 'nav-bkg.php';
include 'connect.php';
echo '<div class="border border-secondary d-flex justify-content-center align-items-center h-75" >';
$conn = OpenCon();
session_start();
$email1 = $_SESSION['email'];
$_SESSION['e1'] = $_SESSION['email'];
$email = $_POST["visitor_email"];
$resr_id =  $_POST["id"];
$mang_id = $_SESSION['user_id'];
$activity_id="";



echo "<br>";

$sql3 = "delete from Books_reservation_id where id = '$resr_id'";
$sql2 = "Select BA.activity_id 
     From Books_reservation_id as B, Books_activity_amount as BA 
     where B.id = '$resr_id' and B.activity_id = BA.activity_id";


    $result = $conn->query($sql2);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    $activity_id =  $row["activity_id"];
    }
}


$sql4 = "delete from Books_activity_amount where activity_id ='$activity_id'";
$sql5 = "delete from request_cancel where management_id = '$mang_id' and reservation_id = '$resr_id'";

if ( $conn->query($sql4) === TRUE) {
    if ($conn -> query($sql3) && $conn -> query($sql5) === TRUE) {
   
header( "refresh:5;url= management.php" );
    
    echo "Cancelled the reservation id: $resr_id";
    echo "<br>";
    echo "<br>";
    
    echo "Redirecting to the homepage...";
} else {
    echo "The reservation id: $resr_id could not get cancelled";
    header( "refresh:5;url= process_cancellation_requests.php" );
}}
CloseCon($conn);
?>