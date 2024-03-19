<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>MANAGE USERS</title>
    <style>
        .container4{
            display: flex;
        }
    </style>
</head>

<body>
    <?php
            include('connection.php');
            $id = $_GET['updateid'];
            $sql = "SELECT * FROM `products` WHERE product_id=$id";
           
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die("Query failed: " . mysqli_error($conn));//Result Check: Always check the result of mysqli_query() before using it in functions like mysqli_fetch_assoc(). If the query fails, it will return false, which can cause the error you're encountering.
            }
            $row = mysqli_fetch_assoc($result);
           
            $desc = $row['product_description'];
            $price = $row['price'];
            $stock = $row['stock_quantity'];
            if(isset($_POST['submit'])){
               
                $result=mysqli_query($conn,$sql);
                $desc = $_POST['product_description'];
                $price = $_POST['price'];
                $stock = $_POST['stock_quantity'];
                $image = $_POST['product_image'];
                //query to update records
                $sql = "UPDATE `products` SET product_id='$id', product_description='$desc',price='$price', stock_quantity='$stock', product_image='$image' WHERE product_id=$id";
                $result=mysqli_query($conn,$sql);
                if ($result) {
                        echo"Success";
                        header("Location: http://127.0.0.1:8080/Gamebear/product.php");

                    }
                    else{
                        echo("Error in query: " .mysqli_error($conn));
                    }
                }
                //query to fetch data from products table 
                $sql="Select * from products";
                        $result=mysqli_query($conn,$sql);
                        if ($result) {
                            {   while ($row = mysqli_fetch_assoc($result)) {
                                $product_id = $row['product_id'];
                                $desc = $row['product_description'];
                                $price = $row['price'];
                                $stock = $row['stock_quantity'];
                                $image = $row['product_image'];
                            }
                        }
                    }
             ?>

<div class="container4">
	  <form method="POST">
			<div class="inputBox">
					<input type="text" placeholder="Description"  name="product_description"   value =<?php echo $desc;?>><br>
				</div>
				<div class="inputBox">
					<input type="text" placeholder="price"  name="price" value =<?php echo $price;?>><br>
				</div>
				<div class="inputBox">
					<input type="text" placeholder="Stock Quantity"  name="stock_quantity"  value =<?php echo $stock;?>><br>
				</div>
                <div class="inputBox">
					<input type="text" placeholder="Image name"  name="product_image"  value =<?php echo $image;?>><br>
				</div>
                <!-- <div class="inputBox">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit" value =<?php echo $stock;?>>
                </form>
                </div> -->
                <br>
            <input type="submit"  id = "updateid"  name = "submit" value="Update"><br>
                </div>
    </form>
</div>     
</body>
</html>