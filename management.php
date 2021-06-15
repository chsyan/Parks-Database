<?php
include 'nav-bkg.php';
?>

    <div class="border border-secondary d-flex justify-content-center align-items-center p-5" >

    <?php
    include 'connect.php';
    session_start();
    $conn = OpenCon();
    
    if (isset($_POST['user_id'])) {

        $id = $_POST['user_id'];
        $_SESSION['user_id'] = $_POST['user_id'];
        $password = $_POST['password'];
        $_SESSION['password'] = $_POST['password'];
        
        if ($_SESSION['user_id'] == NULL){
            echo "Please Enter Account Details";
            header('Refresh: 2; URL=management-login.php');
        }

    } else {
        $id = $_SESSION['user_id'];
        $password = $_SESSION['password'];
    }

    $sql = "SELECT name, password FROM Management WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $correct_pw = $row["password"];
            $name = $row["name"];
            if ($correct_pw == $password){
                echo "<fieldset>";
                echo "<h2>Hello $name,</h2>";
                echo "<h4>what would you like to do?</h4><br><br>";
                // echo "<div class='btn-group btn-group-vertical'>";
                echo "<a href='insert.php'><button class='btn btn-block btn-outline-light btn-lg m-2'>Insert</button></a> <br>";
                echo '<a href="update.php"><button class="btn btn-block btn-outline-light btn-lg m-2">Update</button></a> <br>';
                echo '<a href="delete.php"><button class="btn btn-block btn-outline-light btn-lg m-2">Delete</button></a> <br>';
                echo '<a href="query.php"><button class="btn btn-block btn-outline-light btn-lg m-2">Search</button></a> <br>';
                echo '<a href="process_cancellation_requests.php"><button class="btn-block btn btn-outline-light btn-lg m-2">Reservation Cancellation Processing</button></a> <br>';
                echo '<a href="enter-popu-details.php"><button class="btn btn-block btn-outline-light btn-lg m-2">Popularity Records</button></a> <br>';
                echo '<a href="np-rate-all.php"><button class="btn btn-block btn-outline-light btn-lg m-2">Visitors who have rated all parks</button></a> <br>';
                echo '<a href="index.html"><button class="btn btn-block btn-outline-light btn-lg m-2">Logout</button></a> <br>';
                echo "</fieldset>";
                // echo '</div>';  
            } else {
                echo "<h2>Sorry, password incorrect. Please try again.</h2>";
                header('Refresh: 2; URL=management-login.php');
            }
        }
    } else {
        echo "<h2>Account not in System. Redirecting...</h2>";
        header('Refresh: 2; URL=management-login.php');
    }


    ?>

    </div>
</div>