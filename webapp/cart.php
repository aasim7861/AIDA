<?php require 'includes/header.php'; ?>
<?php require 'includes/leftnav.php'; ?>
<?php  include "includes/connection.php";?>

<link rel="stylesheet" href="assets/css/cart.css">
<!-- Content -->
			
		<div class="two-thirds column">
			<div id="right" id="right">
				<div class="two-thirds column">
	
			   	<h1>Products</h1>
			    <div class="products">
			    <?php
			    //current URL of the Page. cart_update.php redirects back to this URL
				$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			    
				$query = "SELECT * FROM products ORDER BY id ASC";
			    $results =  mysqli_query($connection,$query) or exit("Error in query: $query. " . mysqli_error());

			    if ($results) { 
				
			        //fetch results set as object and output HTML
			        while($obj = $results->fetch_object())
			        {
						echo '<div class="product">'; 
			            echo '<form method="post" action="cart_update.php">';
						echo '<div class="product-thumb"><img width="100" height="100" src="'.$obj->product_img_name.'"></div>';
			            echo '<div class="product-content"><h3>'.$obj->product_name.'</h3>';
			            echo '<div class="product-desc">'.$obj->product_desc.'</div>';
			            echo '<div class="product-info">';
						echo 'Price £'.$currency.$obj->price.' | ';
			            echo 'Qty <input type="text" name="product_qty" value="1" size="3" />';
						echo '<button class="add_to_cart">Add To Cart</button>';
						echo '</div></div>';
			            echo '<input type="hidden" name="product_code" value="'.$obj->product_code.'" />';
			            echo '<input type="hidden" name="type" value="add" />';
						echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
			            echo '</form>';
			            echo '</div>';
			        }
			    
			    }
			    ?>
			    </div>
			    
			<div class="shopping-cart">
			<h2>Your Shopping Cart</h2>
			<?php
			if(isset($_SESSION["products"]))
			{
			    $total = 0;
			    echo '<ol>';
			    foreach ($_SESSION["products"] as $cart_itm)
			    {
			        echo '<li class="cart-itm">';
			        echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
			        echo '<h3>'.$cart_itm["name"].'</h3>';
			        echo '<div class="p-code">P code : '.$cart_itm["code"].'</div>';
			        echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
			        echo '<div class="p-price">Price : £'.$currency.$cart_itm["price"].'</div>';
			        echo '</li>';
			        $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
			        $total = ($total + $subtotal);
			    }
			    echo '</ol>';
			    echo '<span class="check-out-txt"><strong>Total :£'.$currency.$total.'</strong> </span>';
				echo '<span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url='.$current_url.'">Empty Cart</a></span>';
			}else{
			    echo 'Your Cart is empty';
			}
			?>
			</div>
			    
		</div>		
	</div>
<?php require 'includes/footer.php'; ?>
		</div>

	 

