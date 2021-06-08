<?php
include 'connect.php';
$activity_id = $_POST['id'];
$name= $_POST['activity'];
$price = $_POST['price'];
$capacity = $_POST['capacity'];
$np_name = $_POST['np_name'];
$conn = OpenCon();
$sql = "update Activity 
       set capacity= '$capacity', activity_name = '$name', 
            price ='$price',
         np_name= '$np_name' 
       where ID = '$activity_id'";
if ($conn->query($sql) === TRUE) { 
    echo "Activity updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
        }
?>