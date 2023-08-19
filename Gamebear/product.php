<?php
include('connection.php');
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Product ID</th>
                <th>Staff ID</th>
                <th>Product Description</th>
                <th>Price</th>
                <th>Stock Quantity</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['product_id']."</td>
                <td>".$row['staff_id']."</td>
                <td>".$row['product_description']."</td>
                <td>".$row['price']."</td>
                <td>".$row['stock_quantity']."</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No products found.";
}

$conn->close();
?>
