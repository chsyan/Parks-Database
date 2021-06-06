<?php
include 'connect.php';

$activity_id = $_POST['activity_id'];
$num_people = $_POST['num_ppl'];
$visitor_email = $_POST['email'];
$id = uniqid();
$date = date("Y-m-d");
$sql = "INSERT INTO books_reservation_id VALUES ('$id','$activity_id', '$date', '$visitor_email',$num_people)";

$conn = OpenCon();
if ($conn->query($sql) === TRUE) {
  echo "Success";
} else {
  echo "not success".$conn->error;
}
?>