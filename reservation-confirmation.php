<?php
session_start();
include 'nav-bkg.php';
echo '<h3>Your reservation details.<br></h3><h5>Click CONFIRM RESERVATION to book.</h5><br>';
echo '<div class="border border-secondary d-flex justify-content-center align-items-center p-5" >';
include 'connect.php';

$conn = OpenCon();


$id1 = $_SESSION['id'];
$number = $_POST["number"];
$_SESSION['number'] = $number;
$date = $_POST["reservation"];
$_SESSION['date'] = $date;

$sql = "SELECT id, activity_name, capacity,price * $number as total_price, np_name 
         FROM Activity
         WHERE id = '$id1'";
$result = $conn->query($sql);


if(mysqli_num_rows($result)>0) {
  echo "<div>";
  echo '<fieldset>';
  echo "<table class='table table-bordered' bgcolor=\"#FFF\"><thead class='thead-light'><tr><th class='border-class'>Activity ID</th>";
  echo "<th class='border-class'>Activity Name</th>";
  echo "<th class='border-class'>Capacity</th>";
  echo "<th class='border-class'>Total Price</th>";
  echo "<th class='border-class'>National Park</th>";
  echo "<th class='border-class'>Reservation Date</th></tr></thead>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $_SESSION['amount_paid'] = $row["total_price"];
    echo "<tr><td class='border-class'>".$row["id"]."</td>";
    echo "<td class='border-class'>".$row["activity_name"]."</td>";
    echo "<td class='border-class'>".$row["capacity"]."</td>";
    $price = number_format((float) $row["total_price"], 2,'.', '');
    echo "<td class='border-class'>$price</td>";
    echo "<td class='border-class'>".$row["np_name"]."</td>";
    echo "<td class='border-class'>".$date."</td>";
    

  } 
  echo '</fieldset>';
  echo "</table>";
  
  echo "</div>";
} else {
  echo "0 results";
}

echo "</div>";

?>
<br>
<br>
<form method="post">
<input class='form-control btn btn-outline-light btn-lg m-2' type="submit" formaction= "confirmed.php" value="Confirm Reservation">
<br>

<br>
<input class='btn btn-outline-light btn-lg m-2' type="submit" formaction= "activity-reservation-details.php" value="Go Back">
</form>

<?php
CloseCon($conn);
?>