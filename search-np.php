<html>
<head>
<title>Activity Search</title>
</head>
<body>
<?php
include 'nav-bkg.php';
?>
<h3>Search Activites through National Park name.</h3>

<br>
<br>
<div class="border border-secondary d-flex justify-content-center align-items-center h-50" >
<form action= "activity-search-np.php" method = "post">

<fieldset>
<div class="form-group">
<label for= "park-select">Choose a park to see the list of activities offered in it:</label>

<?php
  // display dropdown menu of park names
  include 'connect.php';
  session_start();
  
  $conn = OpenCon();
 
  $sql = "SELECT name,name FROM National_Park";
  $result = $conn->query($sql);

  $name = "name";
  echo "<select name='id_val' class='form-control'>";
  echo '<option value="" disabled>Please select an option</option>';
  while ($row = $result->fetch_assoc()) {
    unset($name_val, $id_val);
    $name_val = $row[$name];
    $id_val = $row[$name];
    echo '<option value="'.$id_val.'">'.$name_val.'</option>';
  }

  echo "</select>";
  ?>
</div>

<br>

<input type="submit" value= "Search" class='btn btn-outline-light btn-lg m-2'>
</fieldset>
</form>
</div>
<br>
<a href="visitor.php"><button class='btn btn-outline-light btn-lg m-2'>Back to Home Page</button></a> <br><br>

</body>
</html>
