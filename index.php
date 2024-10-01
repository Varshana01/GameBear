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
	<title>Home | GamerBear</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="Images/icon4Nav.png" type="image/x-icon">
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/homepage.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/brands.min.css">
	<style>
		.titleRelease {
			display: flex;
			flex-direction: row;
			font-size: 30px;
			margin: 15px;
			padding: 3px;
		}
		.titleRelease:before,
		.titleRelease:after {
			content: "";
			flex: 1 1;
			border-bottom: 2px solid #0ca7ca;
			margin: auto;
		}
		.title-footer {
			font-size: 25px;
			background-image: -webkit-linear-gradient(left, #92F2E3, #2b6a5b);
			background-size: 100%;
			background-repeat: repeat;
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}
		.nav-li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 15px;
			text-decoration: none;
		}
		.news-container {
			display: flex;
			flex-wrap: wrap;
		}
		.news-item {
			border: 1px solid #ccc;
			border-radius: 5px;
			margin: 10px;
			padding: 10px;
			flex: 1 1 200px; /* Adjust the width as needed */
			box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
		}
	</style>
</head>
<body>
	<nav>
		<div class="nav-padding">
			<ul class="nav-ul">
				<li class="nav-li"><a href="../index.php" class="logoLink"><img class="logo" src="./Images/icon4Nav.png" width="60"></a></li>
				<li class="nav-li userWelcome navPos"><?php echo $_SESSION['loggedin'] ? "Welcome, " . $_SESSION['Welcomeuser'] : "Welcome."; ?></li>
				<li class="nav-li aboutUs navPos"><a href="webpages/aboutus.php" class="navButton"><p>About Us</p></a></li>
				<li class="nav-li navPos"><a href="webpages/store.php" class="navButton"><p>Store</p></a></li>
				<li class="nav-li navPos"><a href="webpages/contact.php" class="navButton"><p>Contact Us</p></a></li>
				<li class="nav-li userWelcome navPos">
					<?php if ($_SESSION['loggedin']): ?>
						<form action='webpages/logout.php' method='POST' class='logout' style='display:inline;'>
							<button type='submit' style='background-color: transparent; border: none;'>
								<i class='fas fa-power-off' style='color: #000000;'></i>
							</button>
						</form>
						<a href='webpages/view_reviews.php' class='navButton'><p>Reviews</p></a>
					<?php else: ?>
						<a href='webpages/login.php' class='navButton'><p>Login</p></a>
					<?php endif; ?>
				</li>
			</ul>
		</div>
	</nav>

	<div id="homapagelogopic">
		<img src="Images/homepage2pic.png" id="homapagelogopic">
	</div>
	<h2 class="titleRelease">Released Games</h2>
	<div class="container">
		<div class="game1">
			<a href="webpages/chess.php"><img src="Images/spacechesspic.jpg" id="spacechesspic"></a>
			<div><a href="webpages/chess.php" class="gameName">Space Chess</a></div>
		</div>
		<br><br>

		<div class="game1">
			<a href="webpages/squidus.php"><img src="Images/squiduspic.png" id="squidusgame"></a>
			<div><a href="webpages/squidus.php" class="gameName">Squid Us</a></div>
		</div>
		<div class="game1">
			<a href="webpages/c4ts.php"><img src="Images/c4tsgamepic.png" id="C4tsgame"></a>
			<div><a href="webpages/c4ts.php" class="gameName">4 CATS</a></div>
		</div>
	</div>

	<h2 class="titleRelease">Recent Gaming News</h2>
	<div id="recent-news" class="news-container">
		<!-- News items will be appended here by JavaScript -->
	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const recentNewsDiv = document.getElementById('recent-news');

			function fetchGames() {
				const apiKey = '3f72f3055e2a4fc19d11ce545f64adce';
				const url = `https://api.rawg.io/api/games?key=${apiKey}&page_size=5&ordering=-released`;

				recentNewsDiv.innerHTML = 'Loading...';

				fetch(url)
					.then(response => response.json())
					.then(data => {
						recentNewsDiv.innerHTML = '';
						data.results.forEach(game => {
							const releaseDate = game.released;
							const platforms = game.platforms.map(platform => platform.platform.name).join(', ') || 'N/A';
							const domainName = 'example.com'; 
							const gameCount = Math.floor(Math.random() * 100); 

							const newsItem = document.createElement('div');
							newsItem.classList.add('news-item');
							newsItem.innerHTML = `
								<h3>${game.name}</h3>
								<p>Release Date: ${releaseDate}</p>
								<p>Domain Name: ${domainName}</p>
								<p>Game Count: ${gameCount}</p>
								<p>Platforms: ${platforms}</p>
							`;
							recentNewsDiv.appendChild(newsItem);
						});
					})
					.catch(error => {
						recentNewsDiv.innerHTML = 'Failed to load news. Please try again later.';
						console.error('Error fetching news:', error);
					});
			}

			fetchGames();
		});
	</script>

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

