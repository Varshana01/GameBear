<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <style>
        .divAddProd{
            display: flex;
            justify-content: center;

        }
        input{
            width: 50%;
            padding: 5px 5px;
            margin: 8px 8px;
            box-sizing: border-box;
            float: left;
        }
        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
            }
    </style>
</head>
<body>
    <h1>Add Product</h1>
    <div class="divAddProd">
        <form action="addproduct.php" method="post">
            Product ID: <input type="text" name="product_id"><br> 
            Staff ID : <input type="text" name="staff_id"><br>
            Product Description: <input type="text" name="product_description"><br>
            Price: <input type="text" name="price"><br>
            Stock Quantity: <input type="text" name="stock_quantity"><br>
            <input type="submit" value="Add Product">
        </form>
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
