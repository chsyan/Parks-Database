<!-- Referenced and adapted from https://www.w3schools.com/howto/howto_js_cascading_dropdown.asp -->
<!DOCTYPE html>
<html>
<head>
  <title>insert page</title>
  <?php
  include 'nav-bkg.php';
  session_start();
  ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
window.onload = function() {

  var form_select = document.getElementById("form");
  var table_select = document.getElementById("table");
  var attr_select = document.getElementById("attr");
  var col_select = document.getElementById("col");

  form_select.onsubmit = function() {
      return table_select.value != "" && attr_select.value != "";
  };

  table_select.onchange = function() {
    var val = this.value;
    $.ajax({
      type: "POST",
      url: "funcs.php",
      data: { table: val, func: 'list_col' },

      success: function(response) {
        var attr_arr = response.split(',');
        var str = "<b>Columns in " + val + " table are: </b><br>";
        attr_arr.forEach(function(attr) {
          str += attr + "<br>";
        });
        col_select.innerHTML = val == ""? "" : str + "<br>";
      }
    });
  }
}
</script>
</head>

<body>

<h2>This page inserts into tables.</h2><br>
<div class="border border-secondary d-flex justify-content-center align-items-center p-5" >
<form id="form" action="insert-process.php" method="post">
  <fieldset>
  <div class="form-group">
    <label><b>Tables:</b></label>
    <select name="table" id="table" class="form-control">
      <option value="" disabled="disabled" selected="selected">-- Select table --</option>
      <?php
      include 'connect.php';
      $conn = OpenCon();
      $result = $conn->query("SELECT table_name FROM information_schema.tables WHERE table_schema = 'zagi'");
      while ($row = mysqli_fetch_assoc($result)) {
        foreach ($row as $val) {
          echo '<option value="' . $val . '">' . $val . '</option>';
        }
      }
      ?>
    </div>
  </select>
  <br>
  <br>
  <label name = "col" id="col"></label>
  <div class="form-group">
  <label><b>Enter values of columns as comma separated values:</b></label>
  <input id="attr" class="form-control" name="attr" type="text" placeholder="E.g. 'value1', 'value2', 'value3'">
  </div>
  <br>
  <br>
  <input type="submit" value="Submit" class='btn btn-outline-light btn-lg m-2'>
  </fieldset>
</form>

</div>
<br>
<a href="management.php"><button class='btn btn-outline-light btn-lg m-2'>Back to Home Page</button></a> <br><br>
</body>
</html>