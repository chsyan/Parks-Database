<?php
include 'nav-bkg.php';
?>

    <div class="border border-secondary d-flex justify-content-center align-items-center h-100" >


    <?php
    // collect items submitted from np-insert.html
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // insert into National_Park
    $sql = "INSERT INTO Visitor VALUES ('$email', '$name', '$phone', '$password')";

    include 'connect.php';
    $conn = OpenCon();

    if ($conn->query($sql) === TRUE) {
      echo "<h3>Successfully created account! Your username is '$email'. Please login again. Redirecting...</h3><br>";
      header('Refresh: 5; URL=visitor-login.php');
      die();
    } else {
      echo "<h3>Error updating record: </h3>" . $conn->error;
    }

    CloseCon();
    ?>
</div>
</div>