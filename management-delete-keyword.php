<?php
include 'connect.php';
$conn = OpenCon();
$keyword = $_POST['keyword'];
$sql = "DELETE FROM Keyword WHERE word='$keyword'";
if ($conn->query($sql) === TRUE) {
  echo "Updated successfully";
} else {
  echo "Error: " . $conn->error;
}
CloseCon($conn);
?>
