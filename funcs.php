<?php

$post = (object) $_POST;
if(!$post)
    return false;

$func = $post->func;
return $func($post);

function open_con() {
  $dbhost = "localhost";
  $dbuser ="root";
  $dbpass ="root";
  $db = "zagi";
  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db)
    or die("Connect failed: %s\n". $conn -> error);
  return $conn;
}

function generic_table($post) {
  $conn = open_con();
  display_table($conn, $post->sql);
}


function display_table($obConn,$sql)
{
  $rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
  if(mysqli_num_rows($rsResult)>0)
  {
    echo "<table class='table table-bordered' cellspacing=\"2\"cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#CCCCCC\">";
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

function list_col($post) {
    $conn = open_con();
    if ($post->table != "") {
      $result = $conn->query("SHOW COLUMNS FROM $post->table");
      $table_cols = "";
      while ($row = mysqli_fetch_array($result)) {
        $table_cols .= $row['Field'] . ",";
      }
      echo substr($table_cols, 0, -1);
    }
}

function get_row_table($post) {
  $conn = open_con();
  $table_cols = get_table_cols($conn, $post->table);
  $sql = "SELECT $table_cols FROM $post->table";
  display_table($conn, $sql);
}

function get_pk($post) {
  $conn = open_con();
  $sql = "SHOW COLUMNS FROM ".$post->table." WHERE `Key` = 'PRI'";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  if(mysqli_num_rows($result)>0)
  {
    $str = "";
    while($row = mysqli_fetch_array($result)) {
        $str .= $row['Field'] . ",";
    }
  }
  $str = substr($str, 0, -1);
  echo "<br>";
  echo $str;
  
}
?>