<?php
include 'nav-bkg.php';
?>
<h2> Processing Reservation Cancellation Requests</h2>
<br>
<div class="border border-secondary d-flex justify-content-center align-items-center p-5" >
<?php

include 'connect.php';
$conn = OpenCon();

session_start();

$mng_id = $_SESSION['user_id'];
$sql1 = "SELECT reservation_id, visitor_email FROM request_cancel WHERE management_id = '$mng_id'";
$result = $conn->query($sql1);
if ($result->num_rows > 0) {
  echo "<table class='table table-bordered' bgcolor=\"#FFF\"><thead class='thead-light'><tr><th class='border-class'>Reservation id</th>";
  echo "<th class='border-class'>Visitor Email</th>";
  echo "<th class='border-class'></th></tr></thead>";
  
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td class='border-class'>".$row["reservation_id"]."</td>";
    echo "<td class='border-class'>".$row["visitor_email"]."</td>";
    echo "<td class='border-class'>".'<form action= "confirmed_cancellation.php" method = "post"><input type = "hidden" name="id" value="'.$row["reservation_id"].'"><input type = "hidden" name= "visitor_email" value = "'.$row["visitor_email"].'"><input type="submit" name="submit_btn" value="Cancel Reservation"></form>'."</td></tr>";

  }
  echo "</table>";
} else {
  echo "<br>";
  echo "<br><br><br>";
  echo "<br><br><br>";
  echo "No pending cancellation requests.";
  echo "<br>";
  echo "<br><br><br>";
  echo "<br><br><br>";
}


CloseCon($conn);
?>
</div>
<br>
<a href="management.php"><button class='btn btn-outline-light btn-lg m-2'>Back to Home Page</button></a> <br><br>