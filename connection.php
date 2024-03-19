<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Database</title>
    </head>
    <body>
        <?php
            $conn=mysqli_connect("localhost","root","","gamebear");
            if(!$conn){
                die("Connection failed: ". mysqli_connect_error());
            }          
            
        ?>
    </body>
</html>