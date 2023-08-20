<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>MANAGE USERS</title>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>  
    <div class="container">
        <h1>User Management</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>user_id</th>
                        <th>product_id</th>
                        <th>username</th>
                        <th>password</th>
                        <th>email</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include('connection.php');
                    $sql = "SELECT * FROM `users`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>". $row['user_id'] ."</td>";
                        echo "<td>". $row['product_id'] ."</td>";
                        echo "<td>". $row['username'] ."</td>";
                        echo "<td>". $row['Mypassword'] ."</td>";
                        echo "<td>". $row['email'] ."</td>";
                        echo "<td>";
                        echo "<a href='update_user.php?updateid={$row['user_id']}' class='btn btn-primary'>Update</a>";
                        echo "<a href='delete_user.php?deleteid={$row['user_id']}' class='btn btn-danger'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS (you can include it at the bottom of the body) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

