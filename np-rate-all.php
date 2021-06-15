<!DOCTYPE html>
<html>
<head>
<title>Rated all parks</title>
  <?php
  include 'nav-bkg.php';
  session_start();
  ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
window.onload = function() {
  var sql = "SELECT v.email, v.name, v.phone_num FROM visitor v WHERE NOT EXISTS ((SELECT np.name FROM national_park np) EXCEPT (SELECT ra.np_name FROM np_rating_stars ra WHERE ra.visitor_email = v.email))";
  $.ajax({
    type: "POST",
    url: "funcs.php",
    data: { sql: sql, func: 'generic_table' },

    success: function(response) {
      document.getElementById("table").innerHTML = response;
    }
  });
}
</script>
</head>

<body>

<h2>Visitors who have rated all national parks</h2><br>
<div class="border border-secondary d-flex justify-content-center align-items-center p-5" >
<div id="table"></div>
</div>
<br>
<a href="management.php"><button class='btn btn-outline-light btn-lg m-2'>Back to Home Page</button></a> <br><br>
</body>
</html>
