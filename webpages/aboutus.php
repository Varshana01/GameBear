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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="../css/aboutus.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
    
.text-block {
  position: absolute;
  bottom: 10px;
  right: 300px;
  background-color:none;
  color:white;
  padding-left: 20px;
  padding-right: 20px;
  border-left: 1px solid rgba(255,255,255,0.3);
  border-top: 1px solid rgba(255,255,255,0.3);
  backdrop-filter: blur(10px);
  box-shadow: 20px 20px 40px -6px rgba(0,0,0,0.2);
  height:auto;
  padding: 3px;
  margin: 3px;
}

* {
  box-sizing: border-box;
}

#scorecard{
  font-family: Arial;
  margin: 0 auto; /* Center website */
  max-width: 1000px; /* Max width */
  padding: 20px;
  margin-right: 15rem;
  margin-left: 5rem;
}
.containerScore{
  margin: 15px;
  padding: 15px;
  width: 90%;
}

.heading {
  font-size: 25px;
  margin-right: 25px;
}


.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}

#scorecard{
  margin:15px;
  padding:15px;
}

/* Individual bars */
.bar-5 {width: 60%; height: 18px; background-color: #5bc09b;}
.bar-4 {width: 40%; height: 18px; background-color: #2196F3;}
.bar-3 {width: 20%; height: 18px; background-color: #9c2179;}
.bar-2 {width: 10%; height: 18px; background-color: #f5dd21;}
.bar-1 {width: 4%; height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  .right {
    display: none;
  }
}
body{
			background-color: #dffffc;

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
<body>
    <div id="overlay">
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
        <div class="container">
          <div class="text-block">
            <h1 style="font-size: 30px;">Our Mission</h1><br>
            <p>At GameBear, we have a passion for games that fuels everything we do.Our Mission is to create an amazing platform for gamers to play different kinds of games.
              Our aim is to develop creativity and individuality in people.
            </p><br><br>
            <p>We provide games which are creative and mindful expression of the human spirit that has an entertaining, flexible  instructive and competing for an element.
              It explores and test people’s skills, efforts and invites them to develop new ways of managing the obstacles which stop them from attaining the game’s goal.  
            </p>    
          </div>
        </div>
   </div>

   <br>
    <h2 class="devTitle" style="margin-top:20rem;">Our Developers</h2>
    <div class="container-all">
      
        <!-- A div with container id to hold the card -->
        <div class="container-card">

            <!-- A div with card class for the card  -->
            <div class="card">
                <img src="../Images/developer1.jpg" style="width:265px;" class="dev-Images">
    
                <!-- A div with card__details class to hold the details in the card  -->
                <div class="card__details">
    
                    <!-- A div with name class for the name of the card -->
                    <div class="name">James David</div>
                    <p class="para-card">Game Developer</p>
                </div>        
            </div>
        </div>

        <!-- A div with container id to hold the card -->
        <div class="container-card">

            <!-- A div with card class for the card  -->
            <div class="card">
                <img src="../Images/developer2.jpg"  style="width:250px" class="dev-Images" >
    
                <!-- A div with card__details class to hold the details in the card  -->
                <div class="card__details">
    
                    <!-- A div with name class for the name of the card -->
                    <div class="name">Sarah Williams</div>
                    <p class="para-card"> Assistant Game Developer</p>
                </div>       
            </div>
        </div> 

            <!-- A div with container id to hold the card -->
        <div class="container-card">

            <!-- A div with card class for the card  -->
            <div class="card">
                <img src="../Images/developer3.png"  style="width:250px;"  class="dev-Images">
    
                <!-- A div with card__details class to hold the details in the card  -->
                <div class="card__details">
    
                    <!-- A div with name class for the name of the card -->
                    <div class="name">Jack Williams</div>
                    <p class="para-card">Web Developer</p>
  
    
                </div>
            </div>
        </div>
      </div>
    </div>
    <br><br>
    <div class="containerScore">
      <div id="scorecard">
        <span class="heading">Ratings</span>
        <hr style="border:3px solid #67f2ef">
        <div class="row">
            <div class="side">
              <div>5 star</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div class="bar-5"></div>
              </div>
            </div>
            <div class="side right">
              <div>150</div>
            </div>
            <div class="side">
              <div>4 star</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div class="bar-4"></div>
              </div>
            </div>
            <div class="side right">
              <div>63</div>
            </div>
            <div class="side">
              <div>3 star</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div class="bar-3"></div>
              </div>
            </div>
            <div class="side right">
              <div>15</div>
            </div>
            <div class="side">
              <div>2 star</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div class="bar-2"></div>
              </div>
            </div>
            <div class="side right">
              <div>6</div>
            </div>
            <div class="side">
              <div>1 star</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div class="bar-1"></div>
              </div>
            </div>
            <div class="side right">
              <div>20</div>
            </div>
        </div>
      </div>
      </div>
    </div>
  
</body>
</html>