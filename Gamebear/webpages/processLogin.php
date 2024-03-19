<html>
    <body>
        <?php

        include('../connection.php');
        session_start();
            $uname = $_POST['Log_uname'];//storing values in variables
            $passw = $_POST['Log_password'];
  
            $sql = "SELECT email,Mypassword FROM users WHERE email ='$email' AND Mypassword='$passw'"; //sql query to select row
            
            $result = mysqli_query($conn, $sql);//storing query in variable
            
            if($result==1){
                $_SESSION['Welcomeuser']=$uname; //storing username in a session
                
                header("Location: http://127.0.0.1:8080/Gamebear/index.php"); //redirecting to index if all ok
                die();
            }
            else{
                $_SESSION['loggedin'] = false;
                echo"Error". $sql . "<br>" .mysqli_error($conn);//if error occurs, redirected to login page
                echo '<script>alert(" Invalid username/password. Please try again")
                                window.location.href = "login.php";
                            </script>';
                }
                
            
        
        mysqli_close($conn);
        ?>
    </body>
</html>