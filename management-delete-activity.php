<?php
include 'connect.php';

$activity_id = $_POST['id'];

$sql = "DELETE FROM Activity where ID = '$activity_id'";

$conn = OpenCon();
if ($conn->query($sql) === TRUE) {
  echo "Activity successfully deleted from associated park";
} else {
  echo "not success".$conn->error;
}
?>