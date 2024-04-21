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
    <!-- css -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/review.css">

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <title>Review | GamerBear</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="add_review.js"></script>
    <style>
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
h2{
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
<body>
    <h2>Add Review</h2>
    <form id="addReviewForm">
        <div>
			
            <label for="productId">Product ID:</label>
            <input type="text" id="productId" name="productId" required>
        </div>
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="rating">Rating (1-5):</label>
            <input type="number" id="rating" name="rating" min="1" max="5" required>
        </div>
        <div>
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" rows="4" required></textarea>
        </div>
        <div>
            <button type="submit">Submit Review</button>
        </div>
    </form>
</body>
</html>
