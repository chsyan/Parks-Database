<?php
include 'nav-bkg.php';

session_start();
include 'connect.php';

$conn = OpenCon();


$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];
$start_date_php = date('Y-m-d', strtotime($start_date));
$end_date_php = date('Y-m-d', strtotime($end_date));
echo '<h5>Visitor Records between '. $start_date. ' and '. $end_date. '.</h5><br>';
echo '<div class="border border-secondary justify-content-center align-items-center p-5" >';


$sql = "SELECT a.id as id, a.activity_name as activity_name,a.np_name as np_name, sum(b.num_people) as 'Total number of visitors' FROM Activity a, Books_reservation_id b WHERE b.activity_id = a.id and b.date >= '$start_date_php' and b.date <= '$end_date_php' GROUP BY a.id, a.activity_name,a.np_name";

$result = $conn->query($sql);


if($result->num_rows>0) {
  echo "<table class='table table-bordered' bgcolor=\"#FFF\"><thead class='thead-light'><tr><th class='border-class'>Activity ID</th>";
  echo "<th class='border-class'>Activity Name</th>";
  echo "<th class='border-class'>National Park</th>";
  echo "<th class='border-class'>Total Number of Visitors</th></tr></thead>";
  
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td class='border-class'>".$row["id"]."</td>";
    $id = $row["id"];
    echo "<td class='border-class'>".$row["activity_name"]."</td>";
    
    echo "<td class='border-class'>".$row["np_name"]."</td>";
    echo "<td class='border-class'>".$row["Total number of visitors"]."</td>";
    $num_visitors = $row["Total number of visitors"];
    $sql1= "Insert into popularity_record values ('$id','$start_date_php','$end_date_php', $num_visitors)";
    $conn->query($sql1);
    

  } echo "</table><br>";
} else {
  echo "No visits between $start_date and $end_date.";
}

echo '<a href="enter-popu-details.php"><button class="btn btn-outline-light btn-lg m-2">Return to Records Page</button></a>';

CloseCon($conn);
?>
</div>
<br>
<a href="management.php"><button class='btn btn-outline-light btn-lg m-2'>Back to Home Page</button></a>