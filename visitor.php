<?php
include 'connect.php'
$sql = "INSERT INTO books_reservation_id($activity_id, $date, $id, $num_people, $visitor_email"
$activity_id = $_POST['activity_id'];
$num_people = $_POST['num_ppl'];
$visitor_email = $_POST['email'];
$id = uniqid();

$conn = OpenCon();
if ($conn->query($sql) === TRUE) {
  echo "Success";
} else {
  echo "not success" . $conn->error;
}
?>
