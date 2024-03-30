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
            $sql = "CREATE TABLE Users (
                `user_id` SERIAL PRIMARY KEY NOT NULL,
                `product_id` INTEGER NOT NULL,
                `username` VARCHAR(100) NOT NULL,
                `password` VARCHAR (50) NOT NULL,
                `email` VARCHAR(250) NOT NULL,
                FOREIGN KEY(product_id) REFERENCES products(product_id)
                )";
                
                

            if(mysqli_query($conn,$sql)){
                echo"Table created";
            }else{
                 echo "Error: ".mysqli_error($conn);
            }
            
            
            mysqli_close($conn);
      ?>
    </body>
</html>


-- sql = "CREATE TABLE PRODUCTS(
-- `product_id` SERIAL PRIMARY KEY,
-- `staff_id` INTEGER NOT NULL,
-- `product_description` VARCHAR(350) NOT NULL,
-- `price` NUMERIC NOT NULL,
-- `stock_quantity` INTEGER NOT NULL,
-- FOREIGN KEY(staff_id) REFERENCES Staff
-- ON DELETE NO ACTION
-- ON UPDATE NO ACTION
-- )"



-- $sql = "CREATE TABLE Orders (
-- `order_id` SERIAL PRIMARY KEY NOT NULL,
-- `price` NUMERIC NOT NULL
-- )";


--  $sql = "CREATE TABLE Order_Details (
--  `order_id` SERIAL PRIMARY KEY NOT NULL,
--  `user_id` INT NOT NULL,
--  `product_id` INT NOT NULL,
--  `order_date` DATE NOT NULL,
--  `quantity` INTEGER NOT NULL,
--  FOREIGN KEY (order_id) REFERENCES Orders(order_id),
--  FOREIGN KEY (user_id) REFERENCES Users(user_id),
--  FOREIGN KEY (product_id) REFERENCES Products(product_id)
--  ON DELETE CASCADE
--  ON UPDATE CASCADE
--  )";


-- $sql = "CREATE TABLE Users (
-- `user_id` SERIAL PRIMARY KEY NOT NULL,
-- `product_id` INTEGER NOT NULL,
-- `username` VARCHAR(100) NOT NULL,
-- `password` VARCHAR (50) NOT NULL,
-- `email` VARCHAR(250) NOT NULL,
-- FOREIGN KEY (user_id) REFERENCES Users(user_id),
-- FOREIGN KEY (product_id) REFERENCES Products(product_id)
-- )";


