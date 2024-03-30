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
            // $sql = "CREATE TABLE Order_Details (
            //      `order_id` SERIAL PRIMARY KEY NOT NULL,
            //      `user_id` INT NOT NULL,
            //      `product_id` INT NOT NULL,
            //      `order_date` DATE NOT NULL,
            //      `quantity` INTEGER NOT NULL,
            //      FOREIGN KEY (order_id) REFERENCES Orders(order_id),
            //      FOREIGN KEY (user_id) REFERENCES Users(user_id),
            //      FOREIGN KEY (product_id) REFERENCES Products(product_id)
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