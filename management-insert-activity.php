<?php
include 'connect.php';

$activity_id = $_POST['id'];
$name = $_POST['name'];
$capacity = $_POST['capacity'];
$price = $_POST['price'];
$np_name = $_POST['np_name'];
$sql = "INSERT INTO Activity VALUES ('$activity_id', '$capacity', '$name','$price', '$np_name')";

$conn = OpenCon();
if ($conn->query($sql) === TRUE) {
  echo "Activity entry successfully inserted";
} else {
  echo "not success".$conn->error;
}
?>