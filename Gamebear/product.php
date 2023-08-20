<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
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
            </tr>
            <!-- PHP code to fetch products and generate rows -->
            <?php
            include('connection.php');
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['product_id']."</td>
                        <td>".$row['staff_id']."</td>
                        <td>".$row['product_description']."</td>
                        <td>".$row['price']."</td>
                        <td>".$row['stock_quantity']."</td>
                      </tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
