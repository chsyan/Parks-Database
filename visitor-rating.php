<?php
include 'nav-bkg.php';
include 'connect.php';
echo '<div class="border border-secondary d-flex justify-content-center align-items-center h-75" >';
session_start();
$_SESSION['s1'] = $_SESSION['id_val'];

$np_name = $_SESSION['id_val'];
$stars = $_POST['stars'];
$visitor_email = $_POST['email'];
$rating_id = uniqid();
$comment = $_POST['comment'];
$sql1 = "INSERT INTO np_rating_stars VALUES ('$visitor_email', '$np_name',$stars,'$comment')";
$sql2 = "INSERT INTO np_rating_id VALUES ('$rating_id', '$visitor_email','$np_name')";


$conn = OpenCon();
if ($conn->query($sql1) && $conn->query($sql2) === TRUE) {
  echo "Review Submitted! <br> Redirecting to ". $_SESSION['id_val']. " National Park...";
  header('Refresh: 5; URL=activity-search-np.php');
  die();
} else {
  echo "Already Reviewed";
  header('Refresh: 5; URL=activity-search-np.php');
  die();
}

?>