<?php
include 'nav-bkg.php';
?>
    <h1>MANAGEMENT LOGIN:</h1>
    <br>
        <div class="border border-secondary d-flex justify-content-center align-items-center h-50" >
            
                
                <form action="management.php" method="post">
                    <div class="form-group">
                        <label>Username: </label>
                        <input class="form-control" name="user_id" type="text" placeholder="Enter Management ID">
                    </div>
                    <br>
        
                    <div class="form-group">
                    <label>Password: </label>
                    <input class="form-control" name="password" type="password" placeholder="Enter Password">
                    </div>

                    <input type="submit" value="Submit" class="btn btn-outline-light btn-lg m-2">

                </form>
        
            
        </div>
    
    </div>
