<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">

  <xsl:template match="/">
  <html>
  	<style type="text/css">
		body{
			background-image: url("./Images/backgroundimage.png");
			height: 100vh;

		}
		.images{
			height: 250px;
			width: 250px;
			object-fit: cover;
		}


	</style>
  
<body>
<h2>Student List</h2>
<table>
<tr>
<td>First Name</td>
<td>Last Name</td>
<td>Nickname</td>
</tr>
<tr>
<td><xsl:value-of select="class/student/firstname"/> </td>
<td><xsl:value-of select="class/student/lastname"/> </td> 
<td><xsl:value-of select="class/student/nickname"/></td>
</tr>
</table>
</body>
  </html>
  </xsl:template>
</xsl:stylesheet>
