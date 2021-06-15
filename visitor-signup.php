
<?php
include 'nav-bkg.php';
?>

    <h1>ACCOUNT SIGN UP:</h1>
    <br>

    <div class="border border-secondary d-flex justify-content-center align-items-center h-75" >

    <form action="visitor-signup-process.php" method="post">
      <fieldset>
      <div class="form-group">
        <label>Email/Username: </label>
        <input class="form-control" name="email" type="text" placeholder="Enter Email">
      </div>
      <div class="form-group">
        <label>Name: </label>
        <input class="form-control" name="name" type="text" placeholder="Enter Name">
      </div>
      <div class="form-group">
        <label>Phone Number: </label>
        <input class="form-control" name="phone" type="text" placeholder="Enter Phone">
      </div>
      <div class="form-group">
        <label>Password: </label>
        <input class="form-control" name="password" type="text" placeholder="Create Password">
      </div>
      <input type="submit" value="Submit" class="btn btn-outline-light btn-lg m-2"><br>
      </fieldset>
    </form>
    </div>
</div>
    