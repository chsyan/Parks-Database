<?php
include 'nav-bkg.php';


function myTable($obConn,$sql)
{
  $rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
  if(mysqli_num_rows($rsResult)>0)
  {
    echo "<table cellspacing=\"2\"cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#CCCCCC\">";
    $i = 0;
    while ($i < mysqli_num_fields($rsResult)){
      $field = mysqli_fetch_field_direct($rsResult, $i);
      $fieldName=$field->name;
      echo "<td><strong>$fieldName</strong></td>";
      $i = $i + 1;
    }
    echo "</tr>";
    //>>>Field names retrieved<<<//We dump info
    $bolWhite=true;
    while ($row = mysqli_fetch_assoc($rsResult)) {
      echo $bolWhite ? "<tr bgcolor=\"#FFF\">" : "<tr bgcolor=\"#CCCCCC\">";
      $bolWhite=!$bolWhite;
      foreach($row as $data) {
        echo "<td>$data</td>";
      }
      echo "</tr>";
    }
    echo "</table>";
  }
}

function get_table_cols($obConn,$table) {
  $sql = "SHOW COLUMNS FROM $table";
  $result = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
  if(mysqli_num_rows($result)>0)
  {
    $table_cols = "";
    while($row = mysqli_fetch_array($result)) {
        $table_cols .= $row['Field'] . ",";
    }
  }
  $table_cols = substr($table_cols, 0, -1);
  return $table_cols;
}

include 'connect.php';
$table = $_POST['table'];
$table_cols = $_POST['table_cols'];
$where_cols= $_POST['where_cols'];
if (isset($_POST['attr'])){
  $attr = $_POST['attr'];
}
echo '<div class="border border-secondary d-flex justify-content-center align-items-center h-75">';

$conn = OpenCon();
if ($table_cols == "*" || $table_cols == "") {
  $table_cols = get_table_cols($conn,$table);
}
if ($where_cols == "*" || $where_cols == "") {
  $sql = "SELECT $table_cols FROM $table";
} else {
  $sql = "SELECT $table_cols FROM $table WHERE $attr LIKE '%$where_cols%'";
}
myTable($conn,$sql);
echo "<div class='back'>";
echo "<form action='query.php'><input class='btn btn-outline-light btn-lg m-2' type='submit' value='Return to query'/></form>";
echo "</div>";
?>