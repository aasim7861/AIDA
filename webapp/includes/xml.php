<?php
header ("Content-Type:text/xml");//Tell browser to expect xml

	$hostname = "mohammedaasim.co.uk.mysql"; 

	$username = "mohammedaasim_co_uk"; 

	$password = "eyps6wZC"; 

	$databaseName = "mohammedaasim_co_uk"; 

	$connection = mysqli_connect($hostname, $username, $password, $databaseName) or exit("Unable to connect to database!");

$query = "SELECT * FROM Boxer"; 
$result = mysqli_query($connection, $query) or die ("Error in query: $query. ".mysql_error()); 
//Top of xml file
$_xml = '<?xml version="1.0"?>'; 
$_xml .="<Boxers>"; 
while($row = mysqli_fetch_array($result)) { 
$_xml .="<Boxer>"; 
$_xml .="<BoxerID>".$row['BoxerID']."</BoxerID>"; 
$_xml .="<Boxername>".$row['Boxername']."</Boxername>"; 
$_xml .="</Boxer>"; 
} 
$_xml .="</Boxers>"; 

$xml = simplexml_load_string($_xml);
//Parse and create an xml object using the string
//$xmlobj=new SimpleXMLElement($_xml);
//And output
//print $xmlobj->asXML();
//or we could write to a file
//$xmlobj->asXML(winerys.xml);
	
				//Similar with XSL
				 $xsl = new DOMDocument;
				 $xsl -> load('xml.xsl');
				 // Create and Configure the transformer
				 $proc = new XSLTProcessor;
				// attach the xsl rules
				$proc -> importStyleSheet($xsl);
				//Output
				echo $proc -> transformToXML($xml);

?>
     