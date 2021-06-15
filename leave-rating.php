<?php
include 'nav-bkg.php';
?>

<h2>Please leave a rating for a park of your choice.</h2><br>
<div class="border border-secondary d-flex justify-content-center align-items-center h-75" >
<fieldset>
    <form action="save-rating.php" method="post">
        <div class="form-group">
            <label>National Park</label>

            <?php
            // display dropdown menu of park names
            include 'connect.php';
            $conn = OpenCon();
            session_start();
            $_SESSION['e1'] = $_SESSION['email'];
            $_SESSION['p1'] = $_SESSION['password'];
            $sql = "SELECT name,name FROM National_Park";
            $result = $conn->query($sql);

            $name = "name";
            echo "<select name='id_val' class='form-control'>";
            while ($row = $result->fetch_assoc()) {
                unset($name_val, $id_val);
                $name_val = $row[$name];
                $id_val = $row[$name];
                echo '<option value="'.$id_val.'">'.$name_val.'</option>';
            }
            echo "</select>";
            ?>

        </div>

        <div class="form-group">
            <label>Stars</label>
            <input class="form-control" name="stars" type="text" placeholder="Enter rating out of 5">
        </div>
        <br>
        <div class="form-group">
            <label>Comment</label>
            <textarea class="form-control" rows="5" cols="60" name="comment" placeholder="Enter text"></textarea>
            <input type="submit" value="Submit" class='btn btn-outline-light btn-lg m-2'>
        </div>
    </form>

</fieldset>
</div>
<br>
<a href="visitor.php"><button class='btn btn-outline-light btn-lg m-2'>Back to Home Page</button></a> <br><br>