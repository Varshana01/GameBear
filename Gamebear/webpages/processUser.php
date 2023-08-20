<html>
    <body>
        <?php

        include('../connection.php');

        $uname = $_POST['uname_reg'];
        $email = $_POST['email_reg'];
        $passw = $_POST['pass_reg'];

        $sql="INSERT INTO users(username, Mypassword, email)
            VALUES( '$_POST[uname_reg]','$_POST[pass_reg]', '$_POST[email_reg]')";

        if(mysqli_query($conn,$sql)){
            header( 'Location: login.html' );    
            }
        else{
            echo"Error". $sql . "<br>" .mysqli_error($conn);
            header( 'Location: register.html' );
        }
  
        mysqli_close($conn);
        ?>
    </body>
</html>
