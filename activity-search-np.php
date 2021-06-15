
<?php
include 'nav-bkg.php';
include 'connect.php';
session_start();

$conn = OpenCon();


if (!isset($_SESSION['s1'])){
    $park = $_POST['id_val'];
    $_SESSION["id_val"] = $_POST['id_val'];
} else {
    $park = $_SESSION['s1'];
    $_SESSION["id_val"] = $park;
}

echo "<fieldset>";
echo "<div class='border border-secondary'>";
echo "<br><h3>Activities for $park National Park</h3><br>";
echo "<div class='d-flex justify-content-center'>";
$sql1 = "SELECT * FROM Activity WHERE np_name ='$park'";
$result = $conn->query($sql1);
if ($result->num_rows > 0) {
  echo "<div class='d-flex justify-content-center'>";
  echo "<table class='table table-bordered' bgcolor=\"#FFF\"><thead class='thead-light'><tr><th class='border-class'>Activity Name</th>";
  echo "<th class='border-class'>Capacity</th>";
  echo "<th class='border-class'>Price per person</th>";
  echo "<th class='border-class'></th></tr></thead>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td class='border-class'>".$row["activity_name"]."</td>";
    echo "<td class='border-class'>".$row["capacity"]."</td>";
    echo "<td class='border-class'>".$row["price"]."</td>";
    echo "<td class='border-class'>".'<form action= "activity-reservation-details.php" method = "post"><input type = "hidden" name="id" value="'.$row["id"].'"><input type="submit" name="submit_btn" value="Reserve"></form>'."</td></tr>";

  }
  echo "</table>";
  echo "</div><br>";

} else {
  echo "No Activities";
}
echo "<br>";
echo "</div>";
echo "</fieldset>";


?>

<br>
<br>
<form id="form" action="visitor-rating.php" method="post">
<div class="border border-secondary d-flex justify-content-center align-items-center h-75">
<br>
<fieldset>
  <h2>Please leave a Rating</h2>
  </br>
<div class="form-group">
  <label>Email</label>
  <input class="form-control" name="email" type="text" placeholder="Enter your email">
</div>
  
<div class="form-group">
  <label>Stars</label>
  <input class="form-control" id="stars" name="stars" type="number" min="0" max="5" step="0.5" placeholder="Enter rating out of 5">
</div>
  
<div class="form-group">
  <label>Comment</label>
  <br>
  <textarea class="form-control" rows="5" cols="60" name="comment" placeholder="Enter text"></textarea>
</div>
  <br>
  <input type="submit" value="Submit" class='btn btn-outline-light btn-lg m-2'>
  </fieldset>
  </div>
</form>
<br>
<br>

<div class="border border-secondary d-flex justify-content-center align-items-center p-4" >
<?php
  $sql = "SELECT visitor_email, stars, comment FROM NP_Rating_Stars WHERE np_name = '$park'";
  $result = $conn->query($sql);

  $avg_rating_sql = "select avg(tab.stars) from (select stars from NP_Rating_Stars where np_name='$park') as tab;";
  $avg_result = $conn->query($avg_rating_sql);

  if ($result->num_rows > 0){
      echo "<fieldset><h3>Park Reviews!</h3>";

      $avg_rating = (mysqli_fetch_row($avg_result))[0];
      echo "<h4>$park average rating: $avg_rating stars</h4>";

      while ($row = $result->fetch_assoc()){
        echo "<hr class=border border-secondary />";
        echo "<fieldset>";
        // echo "<div class='border'>";
        echo "<h5>User: ".$row["visitor_email"]."</h5>";
        echo $row["stars"]." Stars <br><br>";
        if ($row["comment"] != NULL){
            echo "Comment:<br>".$row["comment"];
        }
        // echo "</div>";
        echo "</fieldset><br>";
      }
  }
  echo "</fieldset>";
  echo "</select>";
?>
</div>