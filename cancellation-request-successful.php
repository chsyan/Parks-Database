<?php
include 'nav-bkg.php';
include 'connect.php';
echo '<div class="border border-secondary d-flex justify-content-center align-items-center h-75" >';
$conn = OpenCon();
session_start();
$email1 = $_SESSION['email'];
$_SESSION['e1'] = $_SESSION['email'];
$resr_id =  $_POST["id"];
$activity_id = $_POST["activity_id"];

$sql = "Select id From management";
$result = $conn->query($sql);
$mang_id = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($mang_id,$row["id"]) ;
}
}

echo "<br>";
$assigned_index = array_rand($mang_id, 1);
$assigned_id = $mang_id[$assigned_index];


echo "<br>";

$sql2 = "insert into Request_cancel values  ('$resr_id','$assigned_id', '$email1')";

if ( $conn->query($sql2)  === TRUE) {
header( "refresh:5;url= visitor.php" );
    
    echo "Request for cancelling the reservation id: $resr_id is confirmed.<br><br>";
    echo "The request will be processed within 24 hours.";
    echo "<br>";
    echo "Redirecting to the homepage...";
} else {
    echo "Cancellation has already been requested for reservation id: '$resr_id'.";
    header( "refresh:5;url= visitor-request-cancellation.php" );
}
CloseCon($conn);
?>