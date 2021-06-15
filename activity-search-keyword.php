
<?php
include 'nav-bkg.php';


include 'connect.php';

$conn = OpenCon();
$keyword = $_POST['keyword'];
echo "<h3>Results for $keyword:</h3>";
echo '<div class="border border-secondary d-flex justify-content-center align-items-center p-5" >';
$sql1 = "SELECT id, activity_name, capacity,price, np_name 
         FROM Activity, Activity_has_keyword
         WHERE word = '$keyword' and activity_id = id";
$result = $conn->query($sql1);

echo "<fieldset>";
echo "<div class='d-flex justify-content-center'>";
if ($result->num_rows > 0) {
  echo "<div class='d-flex justify-content-center'>";
  echo "<table class='table table-bordered' bgcolor=\"#FFF\"><thead class='thead-light'><tr><th class='border-class'>Activity ID</th>";
  echo "<th class='border-class'>Activity Name</th>";
  echo "<th class='border-class'>Capacity</th>";
  echo "<th class='border-class'>Price per person</th>";
  echo "<th class='border-class'>National Park</th>";
  echo "<th class='border-class'></tr></thead>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td class='border-class'>".$row["id"]."</td>";
    echo "<td class='border-class'>".$row["activity_name"]."</td>";
    echo "<td class='border-class'>".$row["capacity"]."</td>";
    echo "<td class='border-class'>".$row["price"]."</td>";
    echo "<td class='border-class'>".$row["np_name"]."</td>";
    
    echo "<td class='border-class'>".'<form method = "post" action= "activity-reservation-details.php"><input type = "hidden" name="id" value="'.$row["id"].'"><input type="submit" name="submit_btn" value="Reserve"></form>'."</td></tr>";
    
  }
  echo "</table>";
  echo "</div>";
  echo "</fieldset>";
} else {
  echo "0 results";
}

echo "</div>";
CloseCon($conn);
?>