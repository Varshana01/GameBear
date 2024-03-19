<?php
include 'connection.php';
if(isset($_GET['deleteid'])){ //value is fetched
    $id = $_GET['deleteid']; // store it in the variable

    $sql = "DELETE FROM products WHERE product_id = '$id'"; //sql query to delete record from database
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "Row Deleted Successfully";
        header("Location: http://127.0.0.1:8080/Gamebear/product.php");
    } else {
        die(mysqli_error($conn));
}
}
?>