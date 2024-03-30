<html>
    <body>
        <?php

        include('connection.php');

        $uname = $_POST['username'];
        $passwrd = $_POST['password'];

        if ((isset($_POST['username']))&&(isset($_POST['password']))){
            
            $sql = "SELECT username, Mypassword FROM adminlogin WHERE username= '$uname' AND Mypassword = '$passwrd'";
            
            $user_result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($user_result)>0){ //i.e if the query output is not null
                $row = mysqli_fetch_assoc($user_result); //fetch the output and store it in the variable (row)
                // $row is an array   =====>  row[id, username, Mypassword]
                session_start();
                $_SESSION['username'] = $uname;
                echo '<script>alert(" Welcome ")</script>';
                header("location: admin.html");
                exit();
                
            }
            else{
                echo"Error". $sql . "<br>" .mysqli_error($conn);
            }

        }
        mysqli_close($conn);
        ?>
    </body>
</html>
