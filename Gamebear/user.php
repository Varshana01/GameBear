<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>MANAGE USERS</title>
   <?php
    include('connection.php');
    ?>
</head>

<body>
    <?php

        $sql="Select * from users ";
        $result=mysqli_query($conn,$sql);
        if ($result) {
            {   while ($row = mysqli_fetch_assoc($result)) {
                    $user_id = $row['user_id'];
                    $product_id = $row['product_id'];
                    $username = $row['username'];
                    $password = $row['Mypassword'];
                    $email = $row['email'];
                }
      
            }
        }
    ?>


    <table class="table">
        <thead>
            <tr>
            <th scope="col">user_id</th>
            <th scope="col">product_id</th>
            <th scope="col">username</th>
            <th scope="col">password</th>
            <th scope="col">email</th>
            <th scope="col">Operations</th>
            </tr>
           
                        <?php 
                        $sql="Select * from users ";
                        $result=mysqli_query($conn,$sql);
                        if ($result) {
                            {   while ($row = mysqli_fetch_assoc($result)) {
                                $user_id = $row['user_id'];
                                $product_id = $row['product_id'];
                                $username = $row['username'];
                                $password = $row['Mypassword'];
                                $email = $row['email'];
                                echo "<tr>";
                                echo "<tbody>";
                            echo "<th scope='col'>". $user_id ."</th>";
                            echo "<th scope='col'>". $product_id ."</th>";
                            echo "<th scope='col'>". $username ."</th>";
                            echo "<th scope='col'>". $password."</th>";
                            echo "<th scope='col'>". $email."</th>";
                            echo "<td>";
                            echo "<button><a href='update_user.php?updateid=$user_id'>Update</a></button>";
                            echo"<button><a href='delete_user.php?deleteid=$user_id'>Delete</a></button>";
                            echo "</td>";
                            } 

                            }
                        } ?>
                        
                    </tbody>           
            </tr>
        </thead>
        </tbody>
    </table>


</body>
</html>