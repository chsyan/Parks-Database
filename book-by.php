
<?php
    session_start();
    include 'nav-bkg.php';
    $_SESSION['e1'] = $_SESSION['email'];
    $_SESSION['p1'] = $_SESSION['password'];
?>

<fieldset>
<h2>Book parks by:</h2>
<br>
<div class="border border-secondary d-flex justify-content-center align-items-center h-50" >

<a href="search-np.php"><button class='btn btn-outline-light btn-lg m-2'>National Park Name</button>
<a href="activity-search-keyword.html"><button class='btn btn-outline-light btn-lg m-2'>Keywords</button></a>

</fieldset>
<br>
<a href="visitor.php"><button class='btn btn-outline-light btn-lg m-2'>Back to Home Page</button></a> <br><br>
