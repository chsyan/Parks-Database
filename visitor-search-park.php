<?php
include 'connect.php';

$conn = OpenCon();
$key = $_POST['key'];
$sql1 = "SELECT np_name FROM NP_Has_Keyword WHERE word='$key'";
$result = $conn->query($sql1);
if ($result->num_rows > 0) {
  echo "<table><tr><th class='border-class'>park names</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td class='border-class'>".$row["np_name"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

echo "$np_names";
CloseCon($conn);
?>
