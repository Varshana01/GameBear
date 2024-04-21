<html>
    <body>
        <?php

        include('../connection.php');

        $uname = $_POST['uname_reg'];//storing values in variables
        $email = $_POST['email_reg'];
        $passw = $_POST['pass_reg'];

        $sql="INSERT INTO users(username, Mypassword, email)
            VALUES( '$_POST[uname_reg]','$_POST[pass_reg]', '$_POST[email_reg]')";//inserting new user in database

        if(mysqli_query($conn,$sql)){
            header( 'Location: login.php' );    //redirecting to login page if all ok
            }
        else{
            echo"Error". $sql . "<br>" .mysqli_error($conn); //display error
            header( 'Location: register.php' );
        }
  
        mysqli_close($conn);
        ?>
    </body>
</html>
