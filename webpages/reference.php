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
              <li class="nav-li navPos"><form action="../webpages/logout.php" method="POST" name="logout" class="logout">
                <button type="submit" style="background-color: transparent; border: none;">
                  <i class="fas fa-power-off" style="color: #000000;"></i>
                </button></form></li>
            </ul>
          </div>
        </nav>
</header>
<body >
	<table border="1" style="width: 50%;">
			<tr>
				<th>Page Name</th>
				<th>Used for</th>
				<th>Link</th>
			</tr>
			<tr>
				<td>Throughout website</td>
				<td>Fonts</td>
				<td><a href="https://fonts.google.com/specimen/Acme">https://fonts.google.com/specimen/Acme</a></td>
			</tr>
			<tr>
				<td>Most of pages</td>
				<td>Icons</td>
				<td><a href="https://fontawesome.com/versions"> https://fontawesome.com/versions</a></td>
			</tr>
			<tr>
				<td>Store</td>
				<td>Product pictures</td>
				<td>All pictures used in store page was created using Canva app; an application that allows you to use pictures that are royalty-free.<br>
					<a href="https://www.canva.com/help/licenses-copyright-legal-commercial-use/">More Info</a></td>
			</tr>
		</table>
</body>
</html>