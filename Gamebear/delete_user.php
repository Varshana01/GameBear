<?php
include 'connection.php';
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM users WHERE user_id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "Row Deleted Successfully";
    } else {
        die(mysqli_error($conn));
    }
}
?>
