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
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/store.css">

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">

    <!-- Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
            var xhttp = new XMLHttpRequest();;
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
			background-image: url("./Images/backgroundimage.png");
			height: 100vh;

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
        </style>
    </head>
    <header>
        <!-- Navbar starts here -->
        <nav>
               <div class="nav-padding">
                 <ul class="nav-ul">
                   <li class="nav-li"><a href="./index.php" class="logoLink"><span><img class="logo" src="./Images/icon4Nav.png" width="60"></span></a></li>
                   <li class="nav-li userWelcome navPos">
                    <?php if ($_SESSION['loggedin'] == true) {
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
    <body>
        <h1>Store</h1>
        <div id="storebody">
            <!-- products section starts  -->
    
            <section id="products">
               <div class="box-container" class="shop-items">
    
                  <div class="box" class="shop-item" id="shop-item">
                        <div class="image" id="imageContent"></div>
                            <div class="icon">
                                <div class="content">
                                    <h3 class="title"></h3>
                                    
                                    <div class="price contentText" id="priceContent"></div>
                                    <button onclick="addToCartClicked(0)" class="btn btn-primary shop-item-button" type="button"><a class="fas fa-shopping-cart"></a></button>
                                </div>
                            </div>
                           
                        
                    </div>
        <script>
            var xmlDoc = loadXMLDoc("store.xml");
            var imageDisplayed = "<p>";
            var productlist = xmlDoc.getElementsByTagName("product");

            for (i = 0; i < productlist.length; i++) {
                var image = document.createElement("img");
                var src = document.createAttribute("src");
                var Imageurl = productlist[i].getElementsByTagName("img")[0].getAttribute("src");
                console.log(Imageurl)
                image.setAttribute("src", Imageurl);
                imageDisplayed += image.outerHTML + "<br>";
                
                var price = productlist[i].getElementsByTagName("price")[0].childNodes[0].nodeValue;
                imageDisplayed += "Price: " + price + "<br><br>";
            }

            document.getElementById("imageContent").innerHTML = imageDisplayed;
        </script>
    </body>
</html>