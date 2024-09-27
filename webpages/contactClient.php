<?php

require_once('lib/nusoap.php');

// Directly specify the SOAP endpoint instead of relying on WSDL
$endpoint = "http://127.0.0.1:8080/Gamebear/webpages/contact.php";

// Initialize nusoap client (without WSDL)
$client = new nusoap_client($endpoint, false); // Set WSDL to false

// Check for any errors initializing the client
$err = $client->getError();
if ($err) {
    echo "Error initializing SOAP client: $err";
    exit();
}

// Process form submission if it exists
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the posted values from the form
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Validate the inputs
    if (empty($username) || empty($email) || empty($message)) {
        echo "All fields are required!";
        exit();
    }

    // Call the SOAP service to send the message
    $params = array(
        'username' => $username,
        'email' => $email,
        'message' => $message
    );
    $result = $client->call('sendMessage', $params);

    // Check for any faults
    if ($client->fault) {
        echo "Fault: <pre>";
        print_r($result);
        echo "</pre>";
    }  else {
            // Display the result (response from the web service)
            echo "$result";
        }
    }
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
    <title>Contact Us | Client</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
                }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
            margin-top: 40px;
        }
        .field {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        body{
			background-color: #dffffc;

		}
        
    </style>
    <!-- css -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/store.css">

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">

    <!-- Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
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
    <form action="contactClient.php" method="post">
        <div class="field">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="field">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="field">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="4" cols="50" required></textarea>
        </div>
        <div class="field">
            <input type="submit" value="Send Message">
        </div>
    </form>
</body>
</html>
