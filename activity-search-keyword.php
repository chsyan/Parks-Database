<?php
include 'connect.php';

$conn = OpenCon();
$keyword = $_POST['keyword'];
$sql1 = "SELECT Activity.ID, activity_name, capacity,price, np_name 
         FROM Activity, Activity_has_keyword
         WHERE word = '$keyword' and activity_ID = ID";
$result = $conn->query($sql1);
if ($result->num_rows > 0) {
  echo "<table><tr><th class='border-class'>Activity ID</th>";
  echo "<th class='border-class'>Activity Name</th>";
  echo "<th class='border-class'>Capacity</th>";
  echo "<th class='border-class'>Price per person</th>";
  echo "<th class='border-class'>National Park</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td class='border-class'>".$row["ID"]."</td>";
    echo "<td class='border-class'>".$row["activity_name"]."</td>";
    echo "<td class='border-class'>".$row["capacity"]."</td>";
    echo "<td class='border-class'>".$row["price"]."</td>";
    echo "<td class='border-class'>".$row["np_name"]."</td>";
    echo "<td class='border-class'>".'<form type = "post"><input type = "hidden" name="nothing" value="$row["ID"]"><input type="submit" name="submit_btn" value="Reserve"></form>'."</td></tr>";

  }
  echo "</table>";
} else {
  echo "0 results";
}


CloseCon($conn);
?>