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
        <div id="storebody">
            <!-- products section starts  -->
    
            <section id="products">
                <div class="box-container"></div>
            </section>
            

            <!-- CART SECTION STARTS -->
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
                    <button class="btn btn-primary btn-purchase" id="paypal-button" type="button" style="color: black; background-color: #52cbb7;">PURCHASE</button>
		        </section>

		<!-- cart section ends -->

 <script>
    $(document).ready(function(){
        // Function to load product
        function loadProduct() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) { 
                    var productDiv = document.createElement('div');
                    productDiv.innerHTML = xhr.responseText;
                    var productsDiv = document.getElementById('products');
                    productsDiv.appendChild(productDiv);
                    
                }
            };
            xhr.open('GET', '../webpages/message.html', true);
            xhr.send();
        }

        $(".btn-purchase").click(function(){
            loadProduct();
        });
    });

    // Loading XML and creating product grid
    var xmlDoc = loadXMLDoc("store.xml");
    var productlist = xmlDoc.getElementsByTagName("product");
    var container = document.querySelector(".box-container");

    for (var i = 0; i < productlist.length; i++) {
        var image = document.createElement("img");
        var src = productlist[i].getElementsByTagName("img")[0].getAttribute("src");
        image.setAttribute("src", src);

        var prodId = productlist[i].getElementsByTagName("prodId")[0].textContent;
        var price = productlist[i].getElementsByTagName("price")[0].textContent;

        var box = document.createElement("div");
        box.className = "box";
        box.innerHTML = `
            <img src="${src}" alt="Product Image">
            <p>Product ID: ${prodId}</p>
            <p>Price: $${price}</p>
            <button class="btn btn-primary shop-item-button" onclick="addToCartClicked(${i})">
                <i class="fas fa-shopping-cart"></i> Add to Cart
            </button>
        `;
        
        container.appendChild(box);
    }


 function ready() {

//--------------------------------------------CART JS-------------------------------------------------------
                var removeCartItemButtons = document.getElementsByClassName("btn-danger");
                for (var i = 0; i < removeCartItemButtons.length; i++) {
                    var button = removeCartItemButtons[i];
                    button.addEventListener("onclick", removeCartItem);
                }

                var quantityInputs = document.getElementsByClassName("cart-quantity-input");
                for (var i = 0; i < quantityInputs.length; i++) {
                    var input = quantityInputs[i];
                    input.addEventListener("change", quantityChanged);
                }
                document.getElementsByClassName("btn-purchase")[0].addEventListener("click", purchaseClicked);
            }

            function purchaseClicked() {
                $(".btn-purchase").click(function() {
                    // Get the total price from the cart
                    var totalAmount = document.getElementsByClassName('cart-total-price')[0].innerText.replace('$', '');

                    // Call the PHP function to process PayPal payment
                    $.ajax({
                        url: 'paymentGatewayServer.php',
                        type: 'POST',
                        data: {
                            amount: totalAmount
                        },
                        dataType: 'json', // Expect JSON response
                        success: function(response) {
                            if (response.status === 'success') {
                                window.location.href = response.approval_url;  // Redirect to PayPal for payment approval
                            } else {
                                alert('Error: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            // Log or display the raw response text for debugging
                            console.error('AJAX Error: ', xhr.responseText);
                            alert('An error occurred while processing the payment.');
                        }
                    });
                });
            };

            

            function removeCartItem(event) {
                var buttonClicked = event.target;
                buttonClicked.parentElement.parentElement.remove();
                updateCartTotal();
            }

            function quantityChanged(event) {
                var input = event.target;
                if (isNaN(input.value) || input.value <= 0) {
                    input.value = 1;
                }
                console.log(input.value);

                updateCartTotal();
            }

            function addToCartClicked(id) {
                var title ="";
                var price="";
                for (i = 0; i < 4; i++) {
                    var title = productlist[id].getElementsByTagName("prodId")[0].childNodes[0].nodeValue;
                    var price = productlist[id].getElementsByTagName("price")[0].childNodes[0].nodeValue;
                }
                addItemToCart(title, price);
                updateCartTotal();
            }

            function addItemToCart(title, price) {
                var cartRow = document.createElement("div");
                cartRow.classList.add("cart-row");
                var cartItems = document.getElementsByClassName("cart-items")[0];
                var cartItemNames = cartItems.getElementsByClassName("cart-item-title");
                for (var i = 0; i < cartItemNames.length; i++) {
                    if (cartItemNames[i].innerText == title) {
                        alert("This item is already added to the cart");
                        return;
                    }
                }

                var cartRowContents = `
                    <div class="cart-item cart-column">
                        <span class="cart-item-title"><p class="contentText">${title}</p></span>
                    </div>
                    <span class="cart-price cart-column"><p class="contentText">${price}</p></span>
                    <div class="cart-quantity cart-column">
                        <input class="cart-quantity-input" type="number" value="1">
                        <button class="btn btn-danger" type="button">REMOVE</button>
                    </div>`;
                cartRow.innerHTML = cartRowContents;
                cartItems.append(cartRow);
                cartRow.getElementsByClassName("btn-danger")[0].addEventListener("click", removeCartItem);
                cartRow.getElementsByClassName("cart-quantity-input")[0].addEventListener("change", quantityChanged);
            }

            function updateCartTotal() {
                var cartRow = document.getElementsByClassName('cart-items')[0].children;
                var total = 0;

                for (var i = 0; i < cartRow.length; i++) {
                    var cartItem = cartRow[i];
                    var priceElement = cartItem.getElementsByClassName('cart-price')[0];
                    var quantityElement = cartItem.getElementsByClassName('cart-quantity-input')[0];
                    var priceText = priceElement.innerText;
                    var price = parseFloat(priceText.replace(/[^0-9.-]+/g, "")); // Extract numeric value
                    var quantity = parseFloat(quantityElement.value);
                    total += price * quantity;
                }

                total = Math.round(total * 100) / 100;
                document.getElementsByClassName('cart-total-price')[0].innerText = '$' + total.toFixed(2);
            }

            ready();
        </script>
        
    </body>
</html>