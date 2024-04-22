<?php
	session_start();
	if(isset($_SESSION['Welcomeuser'])){
		$_SESSION['loggedin'] = true;
	}
	else{
		$_SESSION['loggedin'] = false;
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | GamerBear</title>
    <!-- tab img -->
	<link rel = "icon" href ="..\Images\icon4Nav.png" type = "image/x-icon">
    <!-- css -->
	<link rel="stylesheet" href="../css/style.css">
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
	<!-- Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<style type="text/css">
		body{
			background-image: url("../Images/backgroundimage.png");
  			height: 100vh;
		}
		#Register:hover,a:hover {
  			color: #42a87e;
  		}
	</style>
</head>
<body id="registerbody">
   <!-- Navbar starts here -->
   <nav>
            <div class="nav-padding">
                <ul class="nav-ul">
                    <li class="nav-li"><a href="../index.php" class="logoLink"><span><img class="logo" src="../Images/icon4Nav.png" width="60"></span></a></li>
                    <li class="nav-li userWelcome navPos"><?php if ($_SESSION['loggedin'] == true) {
                                                                    echo "Welcome, ".($_SESSION['Welcomeuser']);
                                                                }
                                                                if($_SESSION['loggedin'] == false){
                                                                    echo"Welcome.";
                                                                }
                                                            ?>
                    </li>
                    <li class="nav-li aboutUs navPos"><a href="../webpages/aboutus.php" class="navButton"><p>About us</p></a></li>
                    <li class="nav-li navPos"><a href="../webpages/store.php" class="navButton"><p>Store</p></a></li>
                    <li class="nav-li navPos"><a href="../webpages/contact.php" class="navButton"><p>Contact us</p></a></li>
                    <li class="nav-li navPos" ><a href="../webpages/login.php" class="navButton"><p>Login</p></a></li>
                    <li class="nav-li navPos"><a href="../webpages/reference.php" class="navButton" ><p>Reference</p></a></li>
                    <?php if ($_SESSION['loggedin'] == true) {
                        echo"<li class='nav-li navPos'><form action='../webpages/logout.php' method='POST' name='logout' class='logout'>
                        <button type='submit' style='background-color: transparent; border: none;'>
                            <i class='fas fa-power-off' style='color: #000000;'></i>
                        </button></form></li>";
                    }													
                    ?>		
                </ul>
            </div>
	    </nav>

	</div> 
	<div class="container4">
	  <form action="processUser.php" method="POST" name="register"> <!--Form submitted to processUser.php for processing-->
	   	<p class="welcome">Register with us!</p>
			<div class="inputBox">
				<span class="fa-regular fa-user"></span>
					<input type="text" placeholder="Username" class="inputFrm" name="uname_reg" required /><br>
				</div>
				<div class="inputBox">
					<span class="fa-regular fa-envelope"></span>
					<input type="email" placeholder="Email" class="inputFrm" name="email_reg" required><br>
				</div>
				<div class="inputBox">
					<span class="fa-solid fa-lock"></span>
					<input type="password" placeholder="Password" class="inputFrm" name="pass_reg" required><br>
				</div>
				<div class="inputBox">
					<select class="options inputFrm" name="age_reg" required >
						<option>	Select age range: </option>
						<option>	10 years -16 years </option>
						<option>	17 years -25 years </option>
						<option>	26 years -35 years </option>
						<option>	36 years -45 years </option>
						<option>	Above 40 years </option>
					</select>
				</div>
				<br>
				<input type="submit" id="Register" value="Register"><br>
			</div>
	  </form>
	</div>

</body>
</html>