<?php
include 'connect.php';
$conn = OpenCon();
$keyword = $_POST['keyword'];
$keyword_new = $_POST['keyword_new'];
$sql = "UPDATE Keyword SET word='$keyword_new' WHERE word='$keyword'";
if ($conn->query($sql) === TRUE) {
  echo "Updated successfully";
} else {
  echo "Error: " . $conn->error;
}
CloseCon($conn);
?>
