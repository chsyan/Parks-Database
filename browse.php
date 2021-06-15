<fieldset>
<?php
include 'nav-bkg.php';
  session_start();
  $_SESSION['e1'] = $_SESSION['email'];
  $_SESSION['p1'] = $_SESSION['password'];
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
window.onload = function() {
  init( {table: "National_Park", select: document.getElementById("display_park")} );
  init( {table: "Activity", select: document.getElementById("display_activity")} );
  init( {table: "Attraction", select: document.getElementById("display_attraction")} );
  document.getElementById("browse_park").onclick = function() { toggle_display(document.getElementById("display_park")) };
  document.getElementById("browse_activity").onclick = function() { toggle_display(document.getElementById("display_activity")) };
  document.getElementById("browse_attraction").onclick = function() { toggle_display(document.getElementById("display_attraction")) };
}

function init(btn) {
  btn.select.style.display = "none";
  $.ajax({
    type: "POST",
    url: "funcs.php",
    data: { table: btn.table, func: 'get_row_table' },
    success: function(response) {
      btn.select.innerHTML = response + "<br>";
    }
  });
}

function toggle_display(elem) {
  if (elem.style.display == "none") {
    elem.style.display = "block";
  } else {
    elem.style.display = "none";
  }
}
</script>

<h2>Browse Parks by:</h2>
<br>
<div class="border border-secondary d-flex justify-content-center" style="padding: 3%;">
<br>
<br>
<div class="container">
    <div id="browse_buttons"></div>
    <div class="row">
    <button id="browse_park" class="btn-lg bg-dark btn-block btn-outline-light">National Park</button> <br><br>
    </div><br>
    <div class="row justify-content-center">
    <div id="display_park"></div>
    </div>

    <br>

    <div class="row">
    <button id="browse_activity" class="btn-lg bg-dark btn-block btn-outline-light">Activity</button> <br><br>
    </div><br>
    <div class="row justify-content-center">
    <div id="display_activity"></div>
    </div>

    <br>

    <div class="row">
    <button id="browse_attraction" class="btn-lg bg-dark btn-block btn-outline-light">Attraction</button> <br><br>
    </div><br>
    <div class="row justify-content-center">
    <div id="display_attraction"></div>
    </div>

    <br><br>

    <div class="row justify-content-center">
    <a href="visitor.php"><button class='btn btn-block btn-outline-light btn-lg '>Back to Home Page</button></a> <br><br>
    </div>
</div>
</fieldset>
</div>