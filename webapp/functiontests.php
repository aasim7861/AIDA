<?php require 'includes/header.php'; ?>
<?php require 'includes/leftnav.php'; ?>
<!-- Content -->
	<div class="one-thirds column">
		<div id="right" id="right">
			<div class="two-thirds column">
				<h3>Functions</h3>
				<ul class="square">
	  	<?php 		
	    		$strvar = "apples";
	   			$intvar = 19;
	    		$floatvar = 27.579;
	    		$product_array = array("id"=>234, "description"=>"apples", "type"=>"bramley");
	    		$url = "www.somesite.com";
		
		print "<br />a) Length of the string $strvar = ".strlen($strvar);
		print "<br />b) Apples to UPPERCASE $strvar = ".strtoupper($strvar);
		print "<br />c) Substring 'some' in $url starts at index position = ".strpos($url, "some");	
		print "<br />d) Apples encrypted with MD5 $strvar = ".md5($strvar);
		print "<br />e) Get the variable type of $intvar = ".gettype($intvar);
		print "<br />f) Is $floatvar numeric? The answer will be 1 (true) or 0 (false)= ".is_numeric($floatvar);
		print "<br />g) Format the number $floatvar to 1 decimal place = ".number_format($floatvar, 1);
		print "<br />h) print the product_array = ".print_r($product_array);
		print "<br />i) number of items in product_array = ".count($product_array);
		print "<br />j) is $strvar in the array = 1".(in_array( "apple", $product_array));
		//echo '<pre>', print "<br />k) Add "price"=>2.45 onto the product array and display =".print_r($product_array), '</pre>';
		print "<br />l) explode $url into an array (separated by ".") and display = ".explode($url);
		print "<br />m) format todays date like this = ".date('D jS F Y');
		?>

		<h3>User Functions</h3>
	   	<?php  
	   	$str = "<© W3Sçh°°¦§>"; 
	   	print "<br /> a) Age of someone born 11 November 1993 = ".getAge(11,11,1993);
		print "<br /> b) Bad String = ".htmlentities($str, ENT_QUOTES, "ISO-8859-1");
		print  "<br /> c)  =".checkString(escapeOutput($bad_string));
		
		?>	

	   
	   </ul>

			</div>
		</div>
	 </div>
<?php require 'includes/footer.php'; ?>
