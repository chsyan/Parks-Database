<?php
include 'connect.php';
include 'nav-bkg.php';
echo '<div class="border border-secondary d-flex justify-content-center align-items-center h-75" >';

session_start();
$_SESSION['e1'] = $_SESSION['email'];
$_SESSION['p1'] = $_SESSION['password'];

$np_name = $_POST['id_val'];
$stars = $_POST['stars'];
if ($stars > 5 || $stars <= 0){
    echo "Please enter rating between 0 and 5";
    header('Refresh: 3; URL=leave-rating.php');
} else {
    $visitor_email = $_SESSION['email'];
    $rating_id = uniqid();
    $comment = $_POST['comment'];
    $sql1 = "INSERT INTO np_rating_stars VALUES ('$visitor_email', '$np_name',$stars,'$comment')";
    $sql2 = "INSERT INTO np_rating_id VALUES ('$rating_id', '$visitor_email','$np_name')";


    $conn = OpenCon();
    if ($conn->query($sql1) && $conn->query($sql2) === TRUE) {
    echo "Thank you for reviewing $np_name National Park. <br> Redirecting to Home Page...";
    header('Refresh:5; URL=visitor.php');
    } else {
    echo "You've already left a rating for this park!";
    header('Refresh:3; URL=leave-rating.php');
    }

}

?>