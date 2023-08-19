<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>MANAGE USERS</title>
</head>

<body>
    <?php
            include('connection.php');
            $id = $_GET['updateid'];
            $sql = "SELECT * FROM `users` WHERE user_id=$id";
           
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die("Query failed: " . mysqli_error($conn));//Result Check: Always check the result of mysqli_query() before using it in functions like mysqli_fetch_assoc(). If the query fails, it will return false, which can cause the error you're encountering.
            }
            $row = mysqli_fetch_assoc($result);
           
            $username = $row['username'];
            $password = $row['Mypassword'];
            $email = $row['email'];
            if(isset($_POST['submit'])){
               
                $result=mysqli_query($conn,$sql);
                $username = $_POST['username'];
                $password = $_POST['Mypassword'];
                $email = $_POST['email'];
                
                $sql = "UPDATE `users` SET user_id='$id', username='$username',Mypassword='$password', email='$email' WHERE user_id=$id";
                $result=mysqli_query($conn,$sql);
                if ($result) {
                        echo"Success";
                        //heaader location
                    }
                    else{
                        echo("Error in query: " .mysqli_error($conn));
                    }
                }
                $sql="Select * from users ";
                        $result=mysqli_query($conn,$sql);
                        if ($result) {
                            {   while ($row = mysqli_fetch_assoc($result)) {
                                $user_id = $row['user_id'];
                                $username = $row['username'];
                                $password = $row['Mypassword'];
                                $email=$row['email'];
                            }
                        }
                    }
             ?>

<div class="container4">
	  <form method="POST" >
	   	<p class="welcome">Register with us!</p>
			<div class="inputBox">
				<span class="fa-regular fa-user"></span>
					<input type="text" placeholder="Username"  name="username"   value =<?php echo $username;?>><br>
				</div>
				<div class="inputBox">
					<span class="fa-regular fa-envelope"></span>
					<input type="email" placeholder="Email"  name="email" value =<?php echo $email;?>><br>
				</div>
				<div class="inputBox">
					<span class="fa-solid fa-lock"></span>
					<input type="password" placeholder="Password"  name="Mypassword"  value =<?php echo $password;?>><br>
				</div>
                <br>
            <input type="submit"  id = "updateid"  name = "submit" value="Update"><br>
                </div>
    </form>
</div>     
</body>
</html>