<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css”>
<style>
    /* Reset some default styles */
body, h1, h2, h3, h4, h5, h6, p {
    margin: 0;
    padding: 0;
}

/* Apply styles to the container */
.container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
    background-color:#191970;
    color: white;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style for the product table */
.product-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.product-table th, .product-table td {
    border: 1px solid white;
    padding: 10px;
    text-align: left;
    background-color: white;
    color: #3498db;
}

/* Alternating row colors */
.product-table tr:nth-child(even) {
    background-color: #f2f2f2;
}

a {
    color: white;
    text-decoration: none;
}

.add-button {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
    font-size: 16px;
    margin-bottom: 20px;
}

.add-button a {
    color: white;
    text-decoration: none;
}

.updatedImage{
    height: 90px;
	width: 90px;
	object-fit: cover;
}
</style>
</head>
<body>
    <div class="container">
        <h1>Product List</h1>
        <button class="add-button"><a href="addproduct.php">Add Product</a></button>
        <table class="product-table">
            <tr>
                <th>Product ID</th>
                <th>Staff ID</th>
                <th>Product Description</th>
                <th>Price</th>
                <th>Stock Quantity</th>
                <th>Product Image</th>
                <th>Operations</th>

            </tr>
            <!-- PHP code to fetch products and generate rows -->
            <?php
            include('connection.php');
            $sql = "SELECT * FROM products"; //sql query to fetch records
            $result = $conn->query($sql); //same as $result = mysqli_query($conn, $sql);

            while ($row = $result->fetch_assoc()) { //display values from database in table
                echo "<tr>
                        <td>".$row['product_id']."</td>
                        <td>".$row['staff_id']."</td>
                        <td>".$row['product_description']."</td>
                        <td>".$row['price']."</td>
                        <td>".$row['stock_quantity']."</td>
                        <td> 
                            <img src='".$row['product_image']."' class='updatedImage'>
                        </td>
                        <td>
                        <a href='update_product.php?updateid={$row['product_id']}' class='btn btn-primary'>Update</a>
                        <a href='delete_product.php?deleteid={$row['product_id']}' class='btn btn-danger'>Delete</a>
                        </td>
                        <td>
                            
                      </tr>";
            }

            $conn->close();
            ?>
            
        </table>
    </div>
</body>
</html>
