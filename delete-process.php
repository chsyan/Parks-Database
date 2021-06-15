<?php
include 'nav-bkg.php';
echo '<div class="border border-secondary d-flex justify-content-center align-items-center h-75" >';

include 'connect.php';
$table = $_POST['table'];
$table_cols = $_POST['table_cols'];
$conn = OpenCon();
$table_cols = str_replace(',', ' AND ', $table_cols);
$sql = "DELETE FROM $table WHERE $table_cols";
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully. <br> Redirecting to delete in 5 seconds...";
  header('Refresh: 5; URL=delete.php');
  die();
} else {
  echo "Error deleting record: <br>" . $conn->error;
  echo "<br><form action='delete.php'><input class='btn btn-outline-light btn-lg m-2' type='submit' value='Return to delete'/></form>";
}
CloseCon($conn);
?>