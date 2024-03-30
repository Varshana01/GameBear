<?php
include 'connection.php';
if(isset($_GET['deleteid'])){//value is fetched
    $id = $_GET['deleteid'];// store it in the variable

    $sql = "DELETE FROM users WHERE user_id = '$id'";//sql query to delete record from database
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "Row Deleted Successfully";
    } else {
        die(mysqli_error($conn));
    }
}
?>
