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
	<meta charset="utf-8">
	<title>Home|GamerBear</title>
	<meta name="newport" content="width=device-width, initial-scale=1">
	<!-- tab img -->
	<link rel = "icon" href ="Images/icon4Nav.png" type = "image/x-icon">
	<!-- css -->
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/homepage.css">
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
	<!-- Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/brands.min.css">
	<style>
		.titleRelease {
            display: flex;
            flex-direction: row;
			font-size: 30px;
			margin: 30px 15px 15px 15px;
			padding: 3px;
			
		}
          
        .titleRelease:before, /* before and after the title, the line will appear */
        .titleRelease:after {
            content: "";
            flex: 1 1;
            border-bottom: 2px solid #0ca7ca;
            margin: auto;
        }

		.title-footer{
			font-size:25px;  
			/* Create the gradient. */
			background-image:-webkit-linear-gradient(left, #92F2E3, #2b6a5b);
			
			/* Set the background size and repeat properties. */
			background-size: 100%;
			background-repeat: repeat;

			/* Use the text as a mask for the background. */
			/* This will show the gradient as a text color rather than element bg. */
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent; 

		}
	</style>
</head>
<body>
	<!-- Navbar starts here -->
	<nav>
		<div class="nav-padding">
			<ul class="nav-ul">
				<li class="nav-li"><a href="../index.php" class="logoLink"><span><img class="logo" src="./Images/icon4Nav.png" width="60"></span></a></li>
				<li class="nav-li userWelcome navPos"><?php if ($_SESSION['loggedin'] == true) {
																echo "Welcome, ".($_SESSION['Welcomeuser']);
															}
															if($_SESSION['loggedin'] == false){
																echo"Welcome.";
															}
														?>
				</li>
				<li class="nav-li aboutUs navPos"><a href="webpages/aboutus.php" class="navButton"><p>About us</p></a></li>
				<li class="nav-li navPos"><a href="webpages/store.php" class="navButton"><p>Store</p></a></li>
				<li class="nav-li navPos"><a href="webpages/contact.php" class="navButton"><p>Contact us</p></a></li>
				<li class="nav-li navPos" ><a href="webpages/login.php" class="navButton"><p>Login</p></a></li>
				<li class="nav-li navPos"><a href="webpages/reference.php" class="navButton" ><p>Reference</p></a></li>
				<?php if ($_SESSION['loggedin'] == true) {
					echo"<li class='nav-li navPos'><form action='webpages/logout.php' method='POST' name='logout' class='logout'>
					<button type='submit' style='background-color: transparent; border: none;'>
						<i class='fas fa-power-off' style='color: #000000;'></i>
					</button></form></li>";
				}													
				?>		
			</ul>
		</div>
	</nav>

	<div id="homapagelogopic">
		<img src="Images/homepage2pic.png" id="homapagelogopic">
	</div>
	<h2 class="titleRelease">Released Games</h2>
	<div class="container">
		<div class="game1">
			<img src="Images/spacechesspic.jpg" id="spacechesspic">
			<div><a href="webpages/chess.php" class="gameName">Space Chess</a></div>
		</div>
		<br><br>

		<div class="game1">
			<a href="webpages/squidus.php"><img src="Images/squiduspic.png" id="squidusgame"></a>
			<div><a href="webpages/squidus.php" class="gameName">Squid Us</a></div>
		</div>
		<div class="game1">
		<a href="webpages/c4ts.php"><img src=Images/c4tsgamepic.png id="C4tsgame"></a>
		<div><a href="webpages/c4ts.php" class="gameName">4 CATS</a></div>
		</div>
	</div>
	
	

	 <!-- Define the slideshow container -->
	    <div id="slideshow">
	        <div class="slide-wrapper">
	             
	        <!-- Define each of the slides
	         and write the content -->
	          
	            <div class="slide">
	            	<div class="silde-container1">
	            		<div class="container-title1">
	            			FEATURED IN
	            		</div>
	            		<div class="container-content">
	            			<div class="content1">
	            				<h6 class="slider-font">Winning them is all about being consistent and diligent.</h6>
	            				<h6 class="slider-font"><em>The Times</em></h6>
	            			</div>
	            			<div class="content1">
	            				<h6 class="slider-font">There is much more to winning or losing; it is your attitude that counts.</h6>
	            				<h6 class="slider-font"><em>The Guardian</em></h6>
	            			</div>
	            			<div class="content1">
	            				<h6 class="slider-font">Participating in GamerBear brings unspeakable joy.</h6>
	            				<h6 class="slider-font"><em>Kill Screen</em></h6>
	            			</div>
	            		</div>
	            	</div>
	            </div>

	            <div class="slide">
	                <div class="container-title1">
	            			OUR DEVELOPERS
	            	</div>
	            		<div class="container-content">
	            			<div class="content1">
	            				<h6 class="slider-font">2021 Awwwards winner</h6>
	            				<h6 class="slider-font"><em>John Doe</em></h6>
	            			</div>
	            			<div class="content1">
	            				<h6 class="slider-font">2022 DevelopHER Award winner and employee of the year</h6>
	            				<h6 class="slider-font"><em>Jane Lastname</em></h6>
	            			</div>
	            			<div class="content1">
	            				<h6 class="slider-font">2019 Runner up for Awwwards</h6>
	            				<h6 class="slider-font"><em>Max First</em></h6>
	            			</div>
	            		</div>
	            </div>
	            <div class="slide">
	                <div class="container-title1">
	            			FOLLOW US!
	            	</div>
	            		<div class="container-content">
	            			<div class="content2">
	            				<a href="https://www.facebook.com/index.php" target="_blank"><i class="fab fa-facebook"></i></a>
    
	            				<h6 class="slider-font"><em>Facebook</em></h6>
	            			</div>
	            			<div class="content2">
	            				<a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
	            				<h6 class="slider-font"><em>Instagram</em></h6>
	            			</div>
	            			<div class="content2">
	            				<a href="https://twitter.com/i/flow/login" target="_blank"><i class="fab fa-twitter"></i></a>
	            				<h6 class="slider-font"><em>Twitter</em></h6>
	            			</div>
	            		</div>
	            </div>
	            
	        </div>
	    </div>
		<!-- Define the footer container -->	
	<footer class="footer1">
		<div class="container-footer">
			<div class="row">
				<div class="footer-col">
					<h4>GameBear</h4>
					<ul>
						<li><a href="#">Our Services</a></li>
						<li><a href="#">Privacy and Policy</a></li>
						<li><a href="#">Terms of Use</a></li>
					</ul>
				</div>
            </div>
		</div>
		<div>
			<h4 class="title-footer">ON EVERY PLATFORM FOR EVERY GAMER</h4>
		</div>
		<div class="container-footer">
			<div class="row">
				<div class="footer-col">
					<h4>Useful Links</h4>
					<ul>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Store</a></li>
						<li><a href="#">Contact Us</a></li>
						<li><a href="#">Login</a></li>
						<li><a href="#">Acknowledgement</a></li>
					</ul>
				</div>
				<div class="footer-col">
					<ul>
						<li class="contact-li">North America,</li>
						<li class="contact-li">New York</li>
						<li class="contact-li">ABC Street</li>
						<li class="contact-li">Tel:
							 <ul>
								<li class="contact-li">432-9866</li>
								<li class="contact-li">432-9876</li>
								<li class="contact-li">432-9877</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>