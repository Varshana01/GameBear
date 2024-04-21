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
    <title>Login  |GamerBear</title>
    <!-- tab img -->
	<link rel = "icon" href ="../Images/icon4Nav.png" type = "image/x-icon">
    <!-- css -->
	<link rel="stylesheet" href="../css/style.css">
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
	<!-- Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<style type="text/css">
		body, #loginbody{
			background-image: url("../Images/backgroundimage.png");
			height: 100vh;
		}
		#SignIn:hover,a:hover {
  			color: #42a87e;
  		}
		.nav-li a {
			display: block;
			color: white;
			text-align: center;
			padding: 5px 1px;
			text-decoration: none;

		}
		.logout{
			padding: 0;
			height: 20px;
		}
		.nav-li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 15px 15px 15px;
			text-decoration: none;

			}
			.aboutUs {
    margin-left: 45vw;
}

	</style>
</head>
<header>
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
				<li class="nav-li userWelcome navPos"><?php if ($_SESSION['loggedin'] == true) {
																echo "<li class='nav-li navPos'><form action='../webpages/logout.php' method='POST' name='logout' class='logout'>
																<button type='submit' style='background-color: transparent; border: none;'>
																	<i class='fas fa-power-off' style='color: #000000;'></i>
																</button></form></li>
																<li class='nav-li navPos' ><a href='../webpages/view_reviews.php' class='navButton'><p>Reviews</p></a></li>";
															
															}
															if($_SESSION['loggedin'] == false){
																echo"<li class='nav-li navPos' ><a href='../webpages/login.php' class='navButton'><p>Login</p></a></li>";
															}
														?>
				</li>
				
							
			</ul>
		</div>
	</nav>
</header>
<body >
	<div id="loginbody">
		<div class="container4">
		  <form action="processLogin.php" method="POST" name="login"> <!--form will be sent to processLogin.php-->
			   <h6 class="welcome">Welcome</h6>
			   <div class="inputBox">
            	<span class="fa-regular fa-envelope"></span>
            	<input type="text" name="Log_uname" placeholder="Username" class="inputFrm" required><br>
        		</div>
        		<div class="inputBox">
        			<span class="fa-solid fa-lock"></span>
			  		<input type="password" name="Log_password" placeholder="Password" class="inputFrm" required><br>
        		</div>
			   	<input type="submit" id="SignIn" value="Sign in" name="SignIn">
			   <br>
			   <input id="rememberMe" type="checkbox" name="rememberMe" checked > Remember me
			   <a class="forgetpass" href="#">Forgot Password?</a>
			   <br>
    			<h6 class="welcome"> Or you can <a class="forgetpass" href="register.php">REGISTER</a> with us!</h6>
			</form>
		</div>
	</div>
</body>
</html>