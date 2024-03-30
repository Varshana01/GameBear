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
                                </div>
                                <button id="cartButt" type="button" class="btn btn-primary shop-item-button"><a class="fas fa-shopping-cart"></a></button>
                            </div>
                    </div>
                </div>
            </section>
            <section class="container content-section">
		            <h2 class="section-header">CART</h2>
		            <div class="cart-row">
		               <span class="cart-item cart-header cart-column">ITEM</span>
		               <span class="cart-price cart-header cart-column">PRICE</span>
		               <span class="cart-quantity cart-header cart-column">QUANTITY</span>
		            </div>
		            <div class="cart-items">
		            </div>
		            <div class="cart-total">
		                <strong class="cart-total-title">Total</strong>
		                <span class="cart-total-price">$0</span>
		            </div>
		            <button class="btn btn-primary btn-purchase" type="button" style="color: black;
		    			background-color: #52cbb7;">PURCHASE</button>
		        </section>

		<!-- cart section ends -->
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

                // button creation
                var cartButton = document.getElementById("cartButt");
                var onclickFunc = document.createAttribute("onclick");
                cartButton.setAttribute("onclick", addToCartClicked(i));
                

                var title = productlist[i].getElementsByTagName("prodId")[0].childNodes[0].nodeValue;
                imageDisplayed += "Item # " + title + "<br><br>";
                var price = productlist[i].getElementsByTagName("price")[0].childNodes[0].nodeValue;
                imageDisplayed += "Price: " + price + "<br><br>";
                
            }

            document.getElementById("imageContent").innerHTML = imageDisplayed;

            function ready() {
                    var removeCartItemButtons = document.getElementsByClassName('btn-danger')
                for (var i = 0; i < removeCartItemButtons.length; i++) {
                    var button = removeCartItemButtons[i]
                    button.addEventListener('onclick', removeCartItem)
                }

                var quantityInputs = document.getElementsByClassName('cart-quantity-input')
                for (var i = 0; i < quantityInputs.length; i++) {
                    var input = quantityInputs[i]
                    input.addEventListener('change', quantityChanged)
                }
                document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked)
            }

            function purchaseClicked() {
                var cartItems = document.getElementsByClassName('cart-items')[0]
                while (cartItems.hasChildNodes()) {
                    cartItems.removeChild(cartItems.firstChild)
                }
                updateCartTotal()
            }

            function removeCartItem(event) {
                var buttonClicked = event.target
                buttonClicked.parentElement.parentElement.remove()
                updateCartTotal()
            }

            function quantityChanged(event) {
                var input = event.target
                if (isNaN(input.value) || input.value <= 0) {
                    input.value = 1
                }
                    console.log(input.value)

                updateCartTotal()
            }

            function addToCartClicked(id) {
                var item_title = document.getElementsByClassName('title')[id].innerText
                var price = document.getElementsByClassName('price')[id].innerText
                addItemToCart(item_title, price)
                updateCartTotal()
            }

            function addItemToCart(item_title, price) {
                var cartRow = document.createElement('div')
                cartRow.classList.add('cart-row')
                var cartItems = document.getElementsByClassName('cart-items')[0]
                var cartItemNames = cartItems.getElementsByClassName('cart-item-title')
                for (var i = 0; i < cartItemNames.length; i++) {
                    if (cartItemNames[i].innerText == item_title) {
                        alert('This item is already added to the cart')
                        return
                    }
                }

                var cartRowContents = `
                    <div class="cart-item cart-column">
                        
                        <span class="cart-item-title"><p class="contentText">${item_title}</p></span>
                    </div>
                    <span class="cart-price cart-column"><p class="contentText">${price}</p></span>
                    <div class="cart-quantity cart-column">
                        <input class="cart-quantity-input" type="number" value="1">
                        <button class="btn btn-danger" type="button">REMOVE</button>
                    </div>`
                cartRow.innerHTML = cartRowContents
                cartItems.append(cartRow)
                cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem)
                cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)
            }

            function updateCartTotal() {
                var cartItemContainer = document.getElementsByClassName('shop-items')[0];
                var cartRow = document.getElementsByClassName('cart-items')[0].children;

                console.log(cartRow)
                var total = 0
                for (var i = 0; i < cartRow.length; i++) {
                    var cartItem = cartRow[i]
                    var priceElement = cartItem.getElementsByClassName('cart-price')[0]
                    var quantityElement = cartItem.getElementsByClassName('cart-quantity-input')[0]
                    var price =Number(priceElement.innerText.replace('$',''));
                    var quantity = Number(quantityElement.value)
                    total +=price * quantity
                }

                total = Math.round(total * 100) / 100
                document.getElementsByClassName('cart-total-price')[0].innerText = '$'+total


            }
            ready()
        </script>
    </body>
</html>