<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  
  <xsl:template match="/">
    <html>
      <head>
        <link rel="stylesheet" type="text/css" href="shoesX.css"/>
      </head>

      <body>

        <!--For Sneakers-->
        <div class="containerX">

          <xsl:for-each select="/shoestore/sneaker">

            <div class="mcontainer">
              <div class="Xcontainer">
                <div class="contentX">

                  <div class="imageX">
                    <img src="{image}" />
                  </div>

                  <div class="brand">
                    <xsl:value-of select="brand" />
                  </div>

                  <div class="model">
                    <xsl:value-of select="model" />
                  </div>
                  
                  <div class="price">
                    <xsl:value-of select="concat('$', price)"/>
                  </div>

                </div>
              </div>
            </div>

          </xsl:for-each>
        
        </div>

        <a href="sneaker.php" class="flr"><h1 class="flexx-title" style="color:#191970 ;">view more sneakers</h1></a>
        <h1 class="flexx-title">soccer shoes</h1>  
        <h1 class="heado">We offer a wide selection of soccer shoes designed for player's best performance </h1>
        <h1 class="heado">Our shoes are made from durable materials that are built to last, and they provide superior comfort and support for your feet. </h1>
      

    


        <!--For Soccer Shoes-->
        <div class="containerX">

          <xsl:for-each select="/shoestore/soccershoe">

            <div class="mcontainer">
              <div class="Xcontainer">
                <div class="contentX">

                  <div class="imageX">
                    <img src="{image}" />
                  </div>

                  <div class="brand">
                    <xsl:value-of select="brand" />
                  </div>

                  <div class="model">
                    <xsl:value-of select="model" />
                  </div>
                  
                  <div class="price">
                    <xsl:value-of select="concat('$', price)"/>
                  </div>

                </div>
              </div>
            </div>

          </xsl:for-each>
        
        </div>
      <br/>
      <br/>
      </body>
    </html>
  </xsl:template>

</xsl:stylesheet>