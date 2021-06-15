<!-- Referenced and adapted from https://www.w3schools.com/howto/howto_js_cascading_dropdown.asp -->
<!DOCTYPE html>
<html>
<head>
<title>delete page</title>
  <?php
  include 'nav-bkg.php';
  session_start();
  ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
window.onload = function() {

  var form_select = document.getElementById("form");
  var table_select = document.getElementById("table");
  var row_select = document.getElementById("row");
  var pk_select = document.getElementById("pk");
  var table_cols_select = document.getElementById("table_cols");

  form_select.onsubmit = function() {
      return table_select.value != "" && table_cols_select.value != "";
  };

  table_select.onchange = function() {
    var val = this.value;
    $.ajax({
      type: "POST",
      url: "funcs.php",
      data: { table: val, func: 'get_row_table' },

      success: function(response) {
        row_select.innerHTML = response + "<br>";
      }
    });

    $.ajax({
      type: "POST",
      url: "funcs.php",
      data: { table: val, func: 'get_pk' },

      success: function(response) {
        pk_select.innerHTML = "Primary key(s): " + response + "<br><br>";
      }
    });


    $.ajax({
      type: "POST",
      url: "funcs.php",
      data: { table: val, func: 'list_col' },

      success: function(response) {
        var attr_arr = response.split(',');
        console.log(attr_arr);
        attr_select.length = 1;

        // Handle display avail col/attr
        attr_arr.forEach(function(attr) {
          attr_select.options[attr_select.options.length] = new Option(attr, attr);
        });
      }
    });
  }
}
</script>
</head>

<body>

<h2>This page deletes tables.</h2><br>
<div class="border border-secondary d-flex justify-content-center align-items-center p-5" >
<form id="form" action="delete-process.php" method="post">
  <fieldset>
    <div class='form-group'>
        <label>Tables:</label>
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
        </select>
    </div>
  <label name="row" id="row"></label> <br>
  <label name="pk" id="pk"></label>
  <div class='form-group'>
  <label>Enter columns to search by as comma separated values: </label>
  <input class="form-control" name="table_cols" id="table_cols" type="text" placeholder="E.g. col1='val1',col2='val2'">
  </div>
  <input type="submit" value="Submit" class='btn btn-outline-light btn-lg m-2'>
  </fieldset>
</form>

</div>
<br>
<a href="management.php"><button class='btn btn-outline-light btn-lg m-2'>Back to Home Page</button></a> <br><br>

</body>
</html>