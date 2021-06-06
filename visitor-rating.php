<?php
include 'connect.php';

$np_name = $_POST['park_name'];
$stars = $_POST['stars'];
$visitor_email = $_POST['email'];
$rating_id = uniqid();
$comment = $_POST['comment'];
$sql1 = "INSERT INTO np_rating_stars VALUES ('$visitor_email', '$np_name',$stars,'$comment')";
$sql2 = "INSERT INTO np_rating_id VALUES ('$rating_id', '$visitor_email','$np_name')";


$conn = OpenCon();
if ($conn->query($sql1) && $conn->query($sql2) === TRUE) {
  echo "Success";
} else {
  echo "not success".$conn->error;
}
?>