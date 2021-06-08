<?php
include 'connect.php';

$conn = OpenCon();
$park = $_POST['parks'];
$sql1 = "SELECT * FROM activity WHERE np_name ='$park'";
$result = $conn->query($sql1);
if ($result->num_rows > 0) {
  echo "<table><tr><th class='border-class'>Activity Name</th>";
  echo "<th class='border-class'>Capacity</th>";
  echo "<th class='border-class'>Price per person</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td class='border-class'>".$row["activity_name"]."</td>";
    echo "<td class='border-class'>".$row["capacity"]."</td>";
    echo "<td class='border-class'>".$row["price"]."</td>";
    echo "<td class='border-class'>".'<form type = "post"><input type = "hidden" name="nothing" value="$row["activity_name"]"><input type="submit" name="submit_btn" value="Reserve"></form>'."</td></tr>";

  }
  echo "</table>";
} else {
  echo "0 results";
}


CloseCon($conn);
?>