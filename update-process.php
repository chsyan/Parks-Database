<?php
include 'nav-bkg.php';
echo '<div class="border border-secondary d-flex justify-content-center align-items-center h-75" >';

include 'connect.php';
$table = $_POST['table'];
$table_cols = $_POST['table_cols'];
$attr = $_POST['attr'];
$attr_val = $_POST['attr_val'];
$conn = OpenCon();
$table_cols = str_replace(',', ' AND ', $table_cols);
$sql = "UPDATE $table SET $attr = '$attr_val' WHERE $table_cols";
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully. <br> Redirecting to update in 5 seconds...";
  header('Refresh: 5; URL=update.php');
  die();
} else {
  echo "Error updating record: " . $conn->error;
  echo "<form action='update.php'><input type='submit' value='Return to update'/></form>";
}
CloseCon($conn);
?>