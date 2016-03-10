<!--  Edited with XML Spy v4.2  -->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
<xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
<xsl:template match="/">
<html>
<body>
<h2>Boxing</h2>
	<table border="1">
		<tr bgcolor="yellow">
			<th align="left">BoxerID</th>
			<th align="left">Boxername</th>
		</tr>
<xsl:for-each select="Boxer/Boxers">
	<tr bgcolor="AntiqueWhite">
		<td><xsl:value-of select="BoxerID"/></td>
		<td><xsl:value-of select="Boxername"/></td>
	</tr>
	</xsl:for-each>
</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>