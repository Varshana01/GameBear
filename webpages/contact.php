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
    <title>Contact Us | GamerBear</title>
    <!-- css -->
	<link rel="stylesheet" href="..\css\style.css">
	<link rel="stylesheet" href="..\css\contact.css">
	<!-- Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">	<style type="text/css">
		body, #contactbody{
			background-image: url("../Images/backgroundimage.png");
			height: 100vh;
		}
		a :hover {
  			color: #42a87e;
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
 </header>
 <body>
	<div class="wrapper">
		<div class="title-text">
		  <div class="title contact">Contact Us</div>
		  <div class="title apply">Apply For Job</div>
		</div>
		<div class="form-container">
		  <div class="slide-controls">
			<input type="radio" name="slide" id="contact" checked>
			<input type="radio" name="slide" id="apply">
			<label for="contact" class="slide contact">Contact Us</label>
			<label for="apply" class="slide apply">Apply For Job</label>
			<div class="slider-tab"></div>
		  </div>
		  <div class="form-inner">
			<form action="#" class="contact">
			  <div class="field">
				<input type="text" placeholder="Username" required>
			  </div>
			  <div class="field">
				<input type="email" placeholder="Email Address" required>
			  </div>
			  <div class="field">
				<textarea  rows="4" cols="45" placeholder="Leave your message here"></textarea>
			  </div>
			  <br>
			  <div class="field btn">
				<div class="btn-layer"></div>
				<input type="submit" value="Send">
			  </div>
			</form>
			<form action="#" class="apply">
			  <div class="field apply">
				<input type="text" placeholder="Full Name" class="inputapply" required>
			  </div>
			  <div class="field apply">
				<input type="email" placeholder="Email Address" class="inputapply" required>
			  </div>
			  <div class="field apply" >
				<input type="tel" placeholder="Phone Number: +230-5-123-4567"  class="inputapply" required>
			  </div>
			  <div class="field apply">
				<input type="apply" placeholder="Desired Position" class="inputapply" required>
			  </div>
			  <div class="field btn">
				<div class="btn-layer"></div>
				<input type="submit" value="Submit" style="margin-bottom: 10px;" id="subButn">
			  </div>
			</form>
		  </div>
		</div>
	  </div>
  
	  <script>
		const ContactUsText = document.querySelector(".title-text .contact");
		const ContactForm = document.querySelector("form.contact");
		const ContactBtn = document.querySelector("label.contact");
		const ApplyBtn = document.querySelector("label.apply");
		const subBtn = document.getElementById("subButn");

		ApplyBtn.onclick = (()=>{
			ContactForm.style.marginLeft = "-50%";
			ContactUsText.style.marginLeft = "-50%";
		});
		ContactBtn.onclick = (()=>{
			ContactForm.style.marginLeft = "0%";
		  	ContactUsText.style.marginLeft = "0%";
		});
		subBtn.onclick = (()=>{
			alert("Thank you,We will send you an email shortly");
		});

		
	  </script>
  
 </body>	
	
	
</html>
