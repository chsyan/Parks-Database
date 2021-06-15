<body>
  <?php 
  include 'nav-bkg.php';
  ?>
<h3>Enter Reservation Details to Reserve for the Activity</h3>
<br>
<div class="border border-secondary d-flex justify-content-center align-items-center h-75" >
  <form action = "reservation-confirmation.php" method= "post">
  
    <fieldset>
      <div class="form-group">
      <label><h5>Enter the details for Activity ID: </h5></label> 
      <?php 
      session_start();
      if (isset($_POST['id'])) {
        $_SESSION['id'] = $_POST['id'];
      }

      echo $_SESSION['id']; 
      ?>
      </div>

      <div class="form-group">
      <label>Enter number of persons to make reservations for</label>
      <input class="form-control" name="number" type="text" placeholder="Enter number of persons">
      </div>
      <div class="form-group">
      <label for="reserve">Date of Reservation:</label>
      <input class="form-control" type="date" id="reserve" name="reservation">
      </div>
      
      <input type="submit" value="Reserve Activity" class='btn btn-outline-light btn-lg m-2'>
    </fieldset>

  </form>
</body>