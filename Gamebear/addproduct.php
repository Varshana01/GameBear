<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <style>
        h1{
            color: white;
            display: flex;
            justify-content: center;
        }
        .divAddProd{
            display: flex;
            justify-content: center;

        }
        input{
            width: 50%;
            padding: 5px 5px;
            margin: 8px 8px;
            box-sizing: border-box;
           
            float: right;
        }
        label {
            color: white;
            padding: 12px 12px 12px 0;
            display: inline-block;
            float: left;
            }
        #container{
            border-radius: 5px;
            background-color: #191970;
            padding: 20px;
            margin: 5%;
        }
    </style>
</head>
<body>
    <div id="container">
        <h1>Add Product</h1>
        <div class="divAddProd">
            <form action="addproduct.php" method="post">
            <label for="pId">Product ID:</label> <input type="text" name="product_id" id="pId"><br> 
            <label for="sId">Staff ID : </label><input type="text" name="staff_id" id="sId"><br>
            <label for="Pdesc">Product Description: </label><input type="text" name="product_description" id="Pdesc"><br>
            <label for="Price">Price: </label><input type="text" name="price" id="Price"><br>
            <label for="Squant">Stock Quantity: </label><input type="text" name="stock_quantity" id="Squants"><br>
                <input type="submit" value="Add Product">
            </form>
        </div>
    </div>
    <?php
        include('connection.php');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $staff_id = $_POST['staff_id'];
    $product_description = $_POST['product_description'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];

    $sql = "INSERT INTO products (product_id,staff_id,product_description,price, stock_quantity)
            VALUES ('$product_id','$staff_id','$product_description', '$price', '$stock_quantity')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

</body>

</html>
