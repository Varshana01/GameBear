<html>
    <body>
        <?php

        include('../connection.php');
        session_start();
            $email = $_POST['Log_email'];
            $passw = $_POST['Log_password'];
  
            $sql = "SELECT email,Mypassword FROM users WHERE email ='$email' AND Mypassword='$passw'";
            
            $result = mysqli_query($conn, $sql);
            
            if($result==1){
                $_SESSION['Welcomeuser']=$Username;
                header("Location: http://127.0.0.1/Gamebear/index.html");
                die();
            }
            else{
                echo"Error". $sql . "<br>" .mysqli_error($conn);
                echo '<script>alert(" Invalid username/password. Please try again")
                                window.location.href = "login.html";
                            </script>';
                }
                
            
        
        mysqli_close($conn);
        ?>
    </body>
</html>