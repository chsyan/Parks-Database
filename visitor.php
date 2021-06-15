<?php
include 'nav-bkg.php';
?>

    <div class="border border-secondary d-flex justify-content-center align-items-center p-5" >


        <?php
        include 'connect.php';
        $conn = OpenCon();
        session_start();

        if (!isset($_SESSION['e1'])){
            $id = $_POST['email'];
            $password = $_POST['password'];
            $_SESSION['email'] = $id;
            $_SESSION['password'] = $password;
        } else {
            $id = $_SESSION['e1'];
            $password = $_SESSION['p1'];
            $_SESSION['email'] = $id;
            $_SESSION['password'] = $password;
        }

        if ($id == NULL){
            echo "<h2>Please Enter Account Details<br></h2>";
            header('Refresh: 1; URL=visitor-login.php');
        }

        $sql = "SELECT name, password FROM Visitor WHERE email = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $name = $row['name'];
                $correct_pw = $row["password"];
                if ($correct_pw == $password){
                    echo "<fieldset>";
                    echo "<h2>Hello $name,</h2>";
                    echo "<h4>This is the National Parks Booking System!</h4><br><br>";
                    echo "<a href='visitor-request-cancellation.php'><button class='btn btn-block btn-outline-light btn-lg m-2'>View/Cancel Reservations</button></a> <br>";
                    echo '<a href="book-by.php"><button class="btn btn-block btn-outline-light btn-lg m-2">Book Reservations</button></a> <br>';
                    echo '<a href="leave-rating.php"><button class="btn btn-block btn-outline-light btn-lg m-2">Leave a Rating</button></a> <br>';
                    echo '<a href="browse.php"><button class="btn btn-block btn-outline-light btn-lg m-2">Browse Parks</button></a> <br>';
                    echo '<a href="index.html"><button class="btn btn-block btn-outline-light btn-lg m-2">Logout</button></a> <br>';
                    echo "<fieldset>";
                } else {
                    echo "<h1>Sorry, password incorrect. Please try again.</h1>";
                    header('Refresh: 2; URL=visitor-login.php');
                }
            }
        } else {
            echo "<fieldset>";
            echo "<h2>Account not in system... </h2><br>";
            echo "<a href='visitor-signup.php'><button class='btn btn-outline-light btn-lg m-2'>Create Account</button></a><br><br>";
            echo "<a href='visitor-login.php'><button class='btn btn-outline-light btn-lg m-2'>Return to Login Page</button></a>";
            echo "</fieldset>";
        }


        ?>

    </div>

</div>