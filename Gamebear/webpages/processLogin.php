<html>
    <body>
        <?php

        include('../connection.php');
        session_start();
            $uname = $_POST['Log_uname'];
            $passw = $_POST['Log_password'];
  
            $sql = "SELECT email,Mypassword FROM users WHERE email ='$email' AND Mypassword='$passw'";
            
            $result = mysqli_query($conn, $sql);
            
            if($result==1){
                $_SESSION['Welcomeuser']=$uname;
                
                header("Location: http://127.0.0.1:8080/Gamebear/index.php");
                die();
            }
            else{
                $_SESSION['loggedin'] = false;
                echo"Error". $sql . "<br>" .mysqli_error($conn);
                echo '<script>alert(" Invalid username/password. Please try again")
                                window.location.href = "login.php";
                            </script>';
                }
                
            
        
        mysqli_close($conn);
        ?>
    </body>
</html>