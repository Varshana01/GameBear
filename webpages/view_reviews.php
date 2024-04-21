<?php
	session_start();
	if(isset($_SESSION['Welcomeuser'])){
		$_SESSION['loggedin'] = true;
	}
	else{
		$_SESSION['loggedin'] = false;
	}

?>
<DOCTYPE html>
<html>
    <head>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Store | GamerBear</title>

    <!-- css -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/store.css">

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">

    <!-- Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
            var xhttp = new XMLHttpRequest();
            function loadXMLDoc(myXmlFile) {
                if(window.XMLHttpRequest){
                    xhttp = new XMLHttpRequest;
                }
                else{
                    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xhttp.open("GET",myXmlFile,false);
                xhttp.send();
                return xhttp.responseXML;
            }
        </script>
 
        <style>
            body, #storebody{
			background-color: #dffffc;

		}
            img{
			height: 250px;
			width: 250px;
			object-fit: cover;
		}
            .logo{
                height: 70px;
                width: 70px;
            }
            .box-container {
                display: grid;
                grid-template-columns: repeat(3, 1fr); /* Creates a 3x3 grid */
                gap: 20px; /* Adds some space between grid items */
            }

            .box {
                text-align: center;
                padding: 20px;
                border: 1px ;
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
      
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1, h2 {
            color: #333;
        }
        .product {
            margin-bottom: 30px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
        }
        .review {
            margin-top: 15px;
            border-top: 1px solid #ccc;
            padding-top: 15px;
        }
        strong {
            color: #555;
        }
  



        .button-50 {
        background-color: #000;
        border: 1px solid #000;
        border-radius: 4px;
        box-shadow: #fff 4px 4px 0 0,#000 4px 4px 0 1px;
        box-sizing: border-box;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        font-size: 14px;
        font-weight: 400;
        line-height: 20px;
        margin: 0 5px 10px 0;
        overflow: visible;
        padding: 12px 40px;
        text-align: center;
        text-transform: none;
        touch-action: manipulation;
        user-select: none;
        -webkit-user-select: none;
        vertical-align: middle;
        white-space: nowrap;
        
        }

        .button-50:focus {
        text-decoration: none;
        }

        .button-50:hover {
        text-decoration: none;
        }

        .button-50:active {
        box-shadow: rgba(0, 0, 0, .125) 0 3px 5px inset;
        outline: 0;
        }

        .button-50:not([disabled]):active {
        box-shadow: #fff 2px 2px 0 0, #000 2px 2px 0 1px;
        transform: translate(2px, 2px);
        }

        @media (min-width: 768px) {
        .button-50 {
            padding: 12px 50px;
        }
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
                    <?php if ($_SESSION['loggedin'] == true) {
                    echo"<li class='nav-li navPos'><form action='../webpages/logout.php' method='POST' name='logout' class='logout'>
                    <button type='submit' style='background-color: transparent; border: none;'>
                        <i class='fas fa-power-off' style='color: #000000;'></i>
                    </button></form></li>
                    <li class='nav-li navPos' ><a href='../webpages/view_reviews.php' class='navButton'><p>Reviews</p></a></li>";
                }													
                ?>			
                </ul>
            </div>
	    </nav>
     </header>
    <body>
        <div id="reviewBody">
            <!-- products section starts  -->
                
            <section id="reviews">
            <h1>Review Section</h1>
                <div class="box-container">
                    
                <?php
                    // Load the XML file
                    $xml = simplexml_load_file('reviews.xml');
                    

                    // Loop through each product
                    foreach ($xml->product as $product) {
                        $productId = $product['id'];
                        
                        
                        // Loop through each review for the product
                        foreach ($product->review as $review) {

                            $username = $review->username;
                            $rating = $review->rating;
                            $comment = $review->comment;
                            
                            echo "<div>";
                            echo "<strong>Product Id:</strong> $productId<br>";
                            echo "<strong>Username:</strong> $username<br>";
                            echo "<strong>Rating:</strong> $rating<br>";
                            echo "<strong>Comment:</strong> $comment";
                            echo "</div>";
                        }
                        
                    }
                    ?>
                </div>
                <button class="button-50"><a href="../webpages/review.php" style="color: white;text-decoration: none;">Add a Review</a></button>
          
            </section>
        </div>
    </body>

    