
<h2> Update Activity Details of associated National Park</h2>


<form action="management-update_process-activity.php" method="post">
<?php
include 'connect.php';
$conn = OpenCon();
$result = $conn->query("Select ID from Activity");
echo "<select name='id'>";
while ($row = $result->fetch_assoc()){
    unset($ID);
    $ID = $row['ID'];
    
    echo '<option value="'.$ID.'">'.$ID.'</option>';
    }
    echo "</select>";
    ?>
    <br>
    <br>
    <label>Activity Name</label>
    <input type="text" name="activity" placeholder="New activity name">
    <br>
    <br>
    <label>Capacity</label>
    <input type="text" name="capacity" placeholder="New Capacity">
    <br>
    <br>
    <label>Price</label>
    <input type="text" name="price" placeholder="New price per person">
    <br>
    <br>
    <label>National Park Name</label>
    <input type="text" name="np_name" placeholder="associated park name">
    <br>
    <br>
    

 
 
  
  <input type="submit" value="Update Activity">
</form>