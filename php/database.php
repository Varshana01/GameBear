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
            // $sql = "CREATE TABLE adminlogin (
            //      `id` SERIAL PRIMARY KEY NOT NULL,
            //      `username` VARCHAR(255) NOT NULL,
            //      `Mypassword` VARCHAR(255) NOT NULL
            //      ON DELETE CASCADE
            //      ON UPDATE CASCADE
            //      )";
            
            // $sql = "CREATE TABLE users (
            //      `user_id` SERIAL PRIMARY KEY NOT NULL,
            //      `username` VARCHAR(255) NOT NULL,
            //      `Mypassword` VARCHAR(255) NOT NULL,
            //      `email` VARCHAR(255) NOT NULL
            //      ON DELETE CASCADE
            //      ON UPDATE CASCADE
            //      )";
                

            // if(mysqli_query($conn,$sql)){
            //     echo"Table created";
            // }else{
            //     echo"Error: ".mysqli_error($conn);
            // }
            
            
            
            mysqli_close($conn);
        ?>
    </body>
</html>