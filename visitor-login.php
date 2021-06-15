<?php
include 'nav-bkg.php';
session_start();
session_unset();
?>

    <h1>VISITOR LOGIN:</h1>
    <br>
        <div class="border border-secondary d-flex justify-content-center align-items-center h-50" >
            
                
                <form action="visitor.php" method="post">
                    <div class="form-group">
                        <label>Username: </label>
                        <input class="form-control" name="email" type="text" placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                    <label>Password: </label>
                    <input class="form-control" name="password" type="password" placeholder="Enter Password">
                    </div>

                    <input type="submit" value="Submit" class="btn btn-outline-light btn-lg m-2">

                </form>
        
            
        </div>
        <br>
        <a href="visitor-signup.php"><button class="btn btn-outline-light btn-lg m-2">If you do not already have an account, please sign up here.</button></a>
    
    </div>
