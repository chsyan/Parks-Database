<?php
include 'nav-bkg.php';
?>
<h2>These are your current reserved activities.</h2>
<br>
<div class="border border-secondary d-flex justify-content-center align-items-center p-5" >
<?php
include 'connect.php';
$conn = OpenCon();

session_start();
$email = $_SESSION['email'];
$_SESSION['e1'] = $email;
$_SESSION['p1'] = $_SESSION['password'];

$sql1 = "SELECT id, activity_id, date, num_people FROM books_reservation_id WHERE visitor_email = '$email'";
$result = $conn->query($sql1);
if ($result->num_rows > 0) {
  echo "<table class='table table-bordered' bgcolor=\"#FFF\"><thead class='thead-light'><tr><th class='border-class'>Reservation id</th>";
  echo "<th class='border-class'>Activity id</th>";
  echo "<th class='border-class'>Reservation Date</th>";
  echo "<th class='border-class'>People</th>";
  echo "<th class='border-class'></th></tr></thead>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td class='border-class'>".$row["id"]."</td>";
    echo "<td class='border-class'>".$row["activity_id"]."</td>";
    echo "<td class='border-class'>".$row["date"]."</td>";
    echo "<td class='border-class'>".$row["num_people"]."</td>";
    echo "<td class='border-class'>".'<form action= "cancellation-request-successful.php" method = "post"><input type = "hidden" name="id" value="'.$row["id"].'"><input type = "hidden" name= "activity_id" value = "'.$row["activity_id"].'"><input type="submit" name="submit_btn" value="Request Cancellation"></form>'."</td></tr>";

  }
  echo "</table>";
} else {
  echo "0 results";
}


CloseCon($conn);
?>
</div>
<br>
<a href="visitor.php"><button class='btn btn-outline-light btn-lg m-2'>Back to Home Page</button></a> <br><br>
