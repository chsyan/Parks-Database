<?php
include 'nav-bkg.php';
echo '<div class="border border-secondary d-flex justify-content-center align-items-center h-75" >';

$table = $_POST['table'];
$attr = $_POST['attr'];
$sql = "INSERT INTO $table VALUES ($attr)";

include 'connect.php';
$conn = OpenCon();
if ($conn->query($sql) === TRUE) {
  echo "Successfully updated record. <br> Redirecting back to insert in 5 seconds...";
  header('Refresh: 5; URL=insert.php');
  die();
} else {
  echo "Error updating record: " . $conn->error;
  echo "<br><form action='insert.php'><input type='submit' class='btn btn-outline-light btn-lg m-2' value='Return to insert'/></form>";
}
?>

</div>
</div>