<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  
  <!-- Define variables -->
  <xsl:variable name="currency" select="'$'"/> <!-- Currency symbol -->

  <!-- Root template: match the 'store' element -->
  <xsl:template match="/store">
    <html>
      <head>
        <h1>Online Store</h1>
        <style>
          /* Basic styles */
          body { font-family: Arial, sans-serif; }
          .product { border: 1px solid #ccc; padding: 10px; margin-bottom: 20px; }
          .button { background-color: #007bff; color: #fff; padding: 5px 10px; border: none; cursor: pointer; }
          #cart { border: 1px solid #ccc; padding: 10px; margin-top: 20px; }
        </style>
        <script>
          <![CDATA[
          // JavaScript function to add product to cart and calculate total
          function addToCart(prodId, price) {
            var cart = document.getElementById('cart');
            var newItem = document.createElement('div');
            newItem.innerHTML = 'Product ID: ' + prodId + ' - Price: ' + price;
            cart.appendChild(newItem);
            
            // Calculate total price
            var currentTotal = parseFloat(document.getElementById('total').getAttribute('data-total'));
            var productPrice = parseFloat(price);
            var newTotal = currentTotal + productPrice;
            document.getElementById('total').setAttribute('data-total', newTotal.toFixed(2));
            document.getElementById('total').innerHTML = 'Total: ' + '$' + newTotal.toFixed(2);
          }
          ]]>
        </script>
      </head>
      <body>
        <h1>Online Store</h1>
        <!-- Apply template to each 'product' -->
        <xsl:apply-templates select="product"/>
        <!-- Cart -->
        <div id="cart">
          <h2>Shopping Cart</h2>
        </div>
        <!-- Total price -->
        <div id="total" data-total="0">
          <h2>Total: $0.00</h2>
        </div>
      </body>
    </html>
  </xsl:template>

  <!-- Template for displaying each 'product' -->
  <xsl:template match="product">
    <div class="product">
      <!-- Product details -->
      <h2>Product ID: <xsl:value-of select="prodId"/></h2>
      <img src="{img/@src}" alt="Product Image" style="max-width: 200px; height: auto;"/>
      <p>Price: <xsl:value-of select="concat($currency, price)"/></p>
      <!-- Button to add product to cart -->
      <button class="button" onclick="addToCart('{prodId}', '{price}')">Add to Cart</button>
    </div>
  </xsl:template>

</xsl:stylesheet>
