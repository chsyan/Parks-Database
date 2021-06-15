<?php
include 'nav-bkg.php';
?>

<div class="border border-secondary d-flex justify-content-center align-items-center p-5" >
<fieldset>
<H3>Generate popularity records using time frames.</H3><br>
    <form action="fetch-popularity-record.php" method="post">
        <div class="form-group">
        <label>Start Date: </label>
        <input class="form-control" name="start_date" type="date" placeholder="Enter Start Date">
        </div>
        <div class="form-group">
        <label>End Date: </label>
        <input class="form-control" name="end_date" type="date" placeholder="Enter End date">
        </div>
        <br>
        <input type="submit" value="Submit" class='btn btn-outline-light btn-lg m-2'>
    </form>
    <a href="management.php"><button class='btn btn-outline-light btn-lg m-2'>Back to Home Page</button></a>
</fieldset>
</div>
<br>
<br>


<div class="border border-secondary justify-content-center align-items-center p-5" >

<h3> Popularity Records </h3>
<hr class="border border-secondary"/>
<br>
<?php
 
include 'connect.php';

$conn = OpenCon();



$sql = "Select * from popularity_record";

$result =  $conn->query($sql);

if($result->num_rows > 0) {
  echo "<table class='table table-bordered' bgcolor=\"#FFF\"><thead class='thead-light'><tr><th class='border-class'>Activity ID</th>";
  echo "<th class='border-class'>Start Date</th>";
  echo "<th class='border-class'>End Date</th>";
  echo "<th class='border-class'>Total Number of Visitors</th></tr></thead>";
  
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td class='border-class'>".$row["activity_id"]."</td>";
    
    echo "<td class='border-class'>".$row["start_date"]."</td>";
    
    echo "<td class='border-class'>".$row["end_date"]."</td>";
    echo "<td class='border-class'>".$row["num_visitors"]."</td>";
    
    
    
    

  } echo "</table>";
} else {
  echo "0 results";
}

CloseCon($conn);
?>
</div>