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
    <title>Space chess | GamerBear</title>
    <!-- tab img -->
	<link rel = "icon" href ="..\Images\icon4Nav.png" type = "image/x-icon">
    <!-- css -->
	<!-- <link rel="stylesheet" href="C:\Users\ty\Documents\Nidhi\Web\Tutorials\GameBear-main\2210199_2210593\css\style.css"> -->
	<link rel="stylesheet" href="..\css\games.css">
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
	<!-- Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

	<style type="text/css">
		body, #gamebody{
			background-image: url("../Images/backgroundimage.png");
			height: 100vh;
		}
		a:hover {
  			color: #42a87e;
  		}
		
  		
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#descBut").click(function(){
				$("#desc").fadeIn("slow");
			});
			$("#gameReq").click(function(){
				$("#Req").fadeIn("slow");
			});
			$("#comp").click(function(){
				$("#compDesc").fadeIn("slow");
			});
		});
	</script>
</head>
<header>
   <!-- Navbar starts here -->
   <nav>
          <div class="nav-padding">
            <ul class="nav-ul">
              <li class="nav-li"><a href="../index.php" class="logoLink"><span><img class="logo" src="../Images/icon4Nav.png" width="60"></span></a></li>
              <li class="nav-li userWelcome navPos" style="padding: 14px 1px;"><?php if ($_SESSION['loggedin'] == true) {
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
              <li class="nav-li navPos"><form action="../webpages/logout.php" method="POST" name="logout" class="logout">
                <button type="submit" style="background-color: transparent; border: none;">
                  <i class="fas fa-power-off" style="color: #000000;"></i>
                </button></form></li>
            </ul>
          </div>
        </nav>
</header>
<body >
	<div id="gamebody">
		<h2 id="gametitle" style="font-size: 30px;">Space Chess</h2>
		<div class="gamecontainer1">
			<img src="..\Images\spacechesspic.jpg" id="spacechesspic">
		</div>
		<div class="containerBuy">
			<div class="buyOn">
				<h5 style="margin: 3px;">Buy on</h5>
				<h6>Steam</h6>
				<div class="icon"><i class="fa-brands fa-square-steam"></i></div>
			</div>
			<div class="buyOn">
				<h5 style="margin: 3px;">Buy on</h5>
				<h6>App Store</h6>
				<div class="icon"><i class="fa-brands fa-app-store"></i></div>
			</div>
		</div>
		<button type="button" class="collapse" id="descBut">
			<h2 id="gameSypnosis" style="font-size: 25px;">Sypnosis <i class="fa-solid fa-plus"></i></h2>
		</button>
		<div class="gameDes" id="desc">
			<p style="font-size: 15px;">The space chess game was played in the zero-gravity environment of a large, cylindrical space station. The chessboard was suspended in mid-air, its holographic pieces floating weightlessly above it. The board was a deep, dark color, the perfect backdrop for the stark white and black pieces.
			<br><br>
			The pieces themselves were crafted to resemble futuristic spaceships, with sharp angles and sleek curves. The pawns were small, nimble craft, able to dart quickly across the board. The knights were shaped like agile fighters, able to change direction at a moment's notice. The bishops were more like stealthy cruisers, able to sneak up on the opponent and strike from an unexpected angle. The rooks were like massive battleships, capable of laying down heavy fire from long range. And finally, the queen was like a majestic flagship, able to command the battlefield with her formidable presence.</p>
		</div>
		<br>
		<button type="button" class="collapse" id="gameReq"> 
			<h2 id="gameRequirements" style="font-size: 25px;">Requirements <i class="fa-solid fa-plus"></i></h2>
		</button>
		<div class="gameDes" id="Req">
			<p style="font-size: 15px;">
				Necessary PC requirements
			</p>
			<ul class="reqList">
				<li>RAM</li>
				<li>Operating System</li>
				<li>DX</li>
				<li>Storage</li>
				<li>GPU</li>
			</ul>
			
			<p style="font-size: 15px;">
				Optional requirements
			</p>
			<ul class="reqList">
				<li>Network Connection</li>
				<li> Sound</li>
				<li>Optical Disk Drive</li>
			</ul>
			
		</div>
		<br>
		<button type="button" class="collapse" id="comp">
			<h2 id="gameRequirements" style="font-size: 25px;">Compatibility <i class="fa-solid fa-plus"></i></h2>
		</button>
		<div class="gameDes" id="compDesc">
			<p style="font-size: 15px;">
				This game is compatible on
			</p>
			
			<ul class="reqList">
				<li>Iphones</li>
				<li> Android</li>
				<li>PCs with 128GB minimum</li>
			</ul>		
		</div>
		<br>
			Last update: 30 Feb 2023
		<br>
		<div id="rating">
			<h5>Game rating: </h5>
			<i class="fa-solid fa-star"></i>
			<i class="fa-solid fa-star"></i>
			<i class="fa-solid fa-star"></i>
			<i class="fa-solid fa-star"></i>
			<i class="fa-regular fa-star"></i>
		</div>

	</div>
	
</body>
<script type="text/javascript">
	var coll = document.getElementsByClassName("collapsible");
	var i;

	for (i = 0; i < coll.length; i++) {
	  coll[i].addEventListener("click", function() {
	    this.classList.toggle("active");
	    var content = this.nextElementSibling;
	    if (content.style.display === "block") {
	      content.style.display = "none";
	    } else {
	      content.style.display = "block";
	    }
	  });
	}
</script>
</html>