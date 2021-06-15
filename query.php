<!-- Referenced and adapted from https://www.w3schools.com/howto/howto_js_cascading_dropdown.asp -->
<!DOCTYPE html>
<html>
<head>
<title>query page</title>
  <?php
  include 'nav-bkg.php';
  session_start();
  ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
window.onload = function() {

  var form_select = document.getElementById("form");
  var table_select = document.getElementById("table");
  var col_select = document.getElementById("col");
  var attr_select = document.getElementById("attr");

  form_select.onsubmit = function() {
      return table_select.value != "";
  };

  table_select.onchange = function() {
    // Get list of attributes
    var val = this.value;
    $.ajax({
      type: "POST",
      url: "funcs.php",
      data: { table: val, func: 'list_col' },

      success: function(response) {
        var attr_arr = response.split(',');
        console.log(attr_arr);
        attr_select.length = 1;

        // Handle display avail col/attr
        var str = "Columns in " + val + " table are: <br>";
        attr_arr.forEach(function(attr) {
          str += attr + "<br>";
          attr_select.options[attr_select.options.length] = new Option(attr, attr);
        });
        col_select.innerHTML = val == ""? "" : str + "<br>";
      }
    });
  }
}
</script>
</head>

<body>

<h2>This page queries tables.</h2>
<br>
<div class="border border-secondary d-flex justify-content-center align-items-center p-5" >
<form id="form" action="query-process.php" method="post">
  <fieldset>
      <div class="form-group">
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
  <label name = "col" id="col"></label>
  <div class="form-group">
    <label>Enter column name(s) as comma separated values: </label>
    <input name="table_cols" type="text" placeholder="Type Here" class="form-control">
  </div>

  <div class="form-group">
    <label>Select attribute:</label>
    <select name = "attr" id="attr" class="form-control">
        <option value="" disabled="disabled" selected="selected">-- Select attribute --</option>
    </select>
  </div>

  <div class="form-group">
    <label>Where attribute like: </label>
    <input name="where_cols" type="text" placeholder="Type Here" class="form-control">
  </div>

  <label>Tip: You can leave fields (except for table) empty to fuzzy search.</label>
  <br>
  <input type="submit" value="Submit" class='btn btn-outline-light btn-lg m-2'>
  </fieldset>
</form>

</div>
<br>
<a href="management.php"><button class='btn btn-outline-light btn-lg m-2'>Back to Home Page</button></a> <br><br>

</body>
</html>