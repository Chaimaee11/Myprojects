<?php
    include_once('php/inc/config.php');
?>
<!Doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
	<title>Art Space - Checkout Page</title>
	
    <meta name="description" content="">
	<meta name="author" content="">
	
	<!--[if lt IE 9]>
	    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- **CSS - stylesheets** -->
	<link id="default-css" rel="stylesheet" href="style.css" type="text/css" media="all" />
	
    <!-- **Additional - stylesheets** -->
    <link href="css/animations.css" rel="stylesheet" type="text/css" media="all" />
	<link id="shortcodes-css" href="css/shortcodes.css" rel="stylesheet" type="text/css" media="all"/>
    <link id="skin-css" href="skins/red/style.css" rel="stylesheet" media="all" />
    <link href="css/isotope.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
    <link href="css/pace.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/responsive.css" type="text/css" media="all"/>
	<script src="js/modernizr.js"></script> <!-- Modernizr -->                 
    
    <link id="light-dark-css" href="dark/dark.css" rel="stylesheet" media="all" />    

    <!-- **Font Awesome** -->
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
    <style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
    margin-top: 10px;
    display: none;
    background-color: black;
    border: 1px solid;
    position: absolute;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgb(0 0 0 / 20%);
    z-index: 1;
}

.dropdown-content a {
  color: #ffff !important;
  padding: 14px 16px !important;
  font-size: 12px !important;
  text-decoration: none !important;
  display: block !important;
  text-transform: capitalize !important;
  margin:0px !important;
}

.dropdown a:hover {background-color: #A81C51;}

.show {display: block;}
.avatar {
  vertical-align: middle;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  border: none;
  cursor: pointer;
}

</style>
</head>

<body>
    <div class="loader-wrapper">
        <div id="large-header" class="large-header">
            <h1 class="loader-title"><span>Art</span> Space</h1>
        </div>        
    </div>
<!-- **Wrapper** -->
<div class="wrapper">
	<div class="inner-wrapper">
        <div id="header-wrapper"> <!-- **header-wrapper Starts** -->
          <header id="header" class="header1">
              <div class="container">
                      
                  <!-- **Logo - End** -->
                  <div class="logo">
                      <a href="index.php" title="Art Space"> <img src="images/logo.svg" width="70%" alt="logo"/> </a>
                  </div><!-- **Logo - End** -->

                  <nav id="main-menu">
                      <div id="dt-menu-toggle" class="dt-menu-toggle">
                        Menu
                        <span class="dt-menu-toggle-icon"></span>
                      </div>                  
                      <ul class="menu type4"><!-- Menu Starts -->
                        <li class="menu-item-simple-parent"><a href="index.php">Home</a></li>
                        <li class="menu-item-simple-parent">
                            <a href="about.php">About us</a>
                        </li>
                        <li class="menu-item-simple-parent"><a href="gallery.php">Gallery</a>
                            <a class="dt-menu-expand">+</a>                    
                        </li>
                        <?php
                        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                        ?>
                        <?php
                        } else {
                            ?>
                        <li class="menu-item-simple-parent"><a href="shop.php">Shop</a>                   
                        </li>
                        <?php
                        }
                        ?>
                        <li class="menu-item-simple-parent"><a href="blog.php">Blog</a></li>
                        <li class="menu-item-simple-parent">
                            <a href="contact.php">contact</a>
                        </li>
                        <?php
                        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                        ?>
                        <li>
                        <button onclick="window.location.href='login.php'" class="btn btn-light">Connexion</button>
                        </li>
                        <?php
                        } else {
                            ?>
                            <li>
                            <div class="menu-item-simple-parent">
                               <div class="dropdown">
                                  &nbsp;&nbsp;&nbsp;&nbsp;<img src="images/user.png" onclick="myFunction()"alt="avatar" class="avatar">
                                  <div id="myDropdown" class="dropdown-content">
                                  <?php 
                                    $idd=$_SESSION["IdClient"];
                                    $result = $link->query("SELECT COUNT(*) FROM cart WHERE client_id =$idd");
                                    $row = $result->fetch_row();

                                    ?>
                                    <a href="shop-cart.php">Cart Page</a>
                                    <a href="#">Shopping Bag : <?php echo $row[0]; ?> items </a>
                                    <a href="logout.php">Log Out</a>
                                  </div>
                                    &nbsp;&nbsp;<b><?php echo htmlspecialchars($_SESSION["PrenomClient"]); ?></b>
                                </div>
                              </div>
                              </li>
                                
                             <?php } ?>
                        
                        </ul></nav>
              </div>
          </header> 
        </div>
        <script>
            function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
            }
            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
            if (!event.target.matches('.avatar')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
                }
            }
            }
        </script>  <!-- **header-wrapper Ends** -->

        <div id="main">
            <section id="primary" class="content-full-width">
            	<div class="container">
                	<div class="dt-sc-hr-invisible-small"></div>
                    <!-- **woocommerce - Starts** --> 
                    <div class="woocommerce">
                        
                        <!-- **checkout - Starts** -->
                        <form name="checkout" method="post" class="checkout" action="php/checkout.php">
                            <!-- **col2-set - Starts** -->    
                            <div class="col2-set" id="customer_details">
                                <!-- **col-2 - Starts** --> 
                                <div class="col-12">
                                    <!-- **woocommerce-shipping-fields - Starts** -->
                                    <div class="woocommerce-shipping-fields">
                                        <h3>Shipping Address</h3>
                                        <p id="ship-to-different-address">
                                            <input id="ship-to-different-address-checkbox" class="input-checkbox"  checked='checked' type="checkbox" name="ship_to_different_address" value="1" />
                                            <label for="ship-to-different-address-checkbox" class="checkbox"><span></span>Ship to Billing Address</label>
                                        </p>
                                        <!-- **shipping-address - Starts** -->
                                        <div class="shipping_address">
                                
                                            <div class="form-row form-row-wide address-field update_totals_on_change validate-required" id="shipping_country_field">
                                                <label for="shipping_country" class="">Country *</label>
                                                <div class="selection-box">    
                                                    <select name="shipping_country" id="shipping_country" class="shop-dropdown" >
                                                        <option value="-1" selected>Select a country&hellip;</option>
                                                        <option value="Morocco" class="fa fa-tree">Morocco</option>
                                                        <option value="France" class="fa fa-train">France</option>
                                                        <option value="Egypt" class="fa fa-plane">Egypt</option>
                                                        <option value="Algeria" class="fa fa-subway">Algeria</option>
                                                        <option value="Spain" class="fa fa-ship">Spain</option>
                                                    </select>
                                                </div>
                                                
                                                <noscript><input type="submit" name="woocommerce_checkout_update_totals" value="Update country" /></noscript>
                                            </div>
                                        
                                            <p class="form-row form-row-first validate-required" id="shipping_first_name_field">
                                            	<label for="shipping_first_name" class="">First Name *</label><input type="text" class="input-text " name="shipping_first_name" id="shipping_first_name" placeholder=""  value=""  />
                                            </p>
                                        
                                            <p class="form-row form-row-last validate-required" id="shipping_last_name_field">
                                            	<label for="shipping_last_name" class="">Last Name *</label><input type="text" class="input-text " name="shipping_last_name" id="shipping_last_name" placeholder=""  value=""  />
                                            </p>
                                            
                                            <div class="clear"></div>
                                        
                                            <p class="form-row form-row-wide address-field" id="shipping_address_2_field">
                                            	<label for="shipping_address_2" class="">Address</label><input type="text" class="input-text" name="shipping_address_2" id="shipping_address_2" placeholder="Apartment Name, No.. etc"  value=""  />
                                            </p>
                                        
                                            <p class="form-row form-row-first address-field validate-required" id="shipping_city_field">
                                            	<label>Town / City *</label><input type="text" class="input-text " value=""  placeholder="Town / City" name="shipping_state" />
											</p>
                                            
                                            <p class="form-row form-row-last address-field validate-required validate-postcode" id="shipping_postcode_field">
                                                <label for="shipping_postcode" class="">Postcode *</label>
                                                <input type="text" class="input-text " name="shipping_postcode" id="shipping_postcode" placeholder="Postcode / Zip"  value=""  />
                                            </p>
                                            <div class="clear"></div>
                                        
                                        </div> <!-- **shipping_address - Ends** --> 

                                    </div> <!-- **woocommerce-shipping-fields - Ends** --> 
                               	</div> <!-- **col-2 - Ends** -->
                            </div> <!-- **col2-set - Ends** -->
    
                            <div class="dt-sc-margin50"></div>
                            <h3 id="order_review_heading">Order Review &amp; Payment</h3>
                            <div id="order_review">
                                <table class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr class = "cart_table_item">
                                        <?php
                                            $idcli = $_SESSION["IdClient"];
                                            $req_global = "SELECT * FROM cart c, tableaux t 
                                            WHERE c.client_id=$idcli
                                            AND c.tableau_Id=t.IdTableau";
                                            $sql_req = mysqli_query($link, $req_global);
                                            $totalSum = 0;
                                            while ($cart = mysqli_fetch_array($sql_req)) {
                                                $vente_link = "shop-checkout.php?id_cart=" . $cart['cartId'];
                                                $tab_link = "shop-detail.php?id_tab=" . $cart['IdTableau'];
                                        ?>
                                            <!-- The thumbnail -->
                                            <td class="product-thumbnail">
                                                <a href="<?php echo $tab_link ?>">
                                                <img data-u="image" style="height:50px !important" alt="" src="<?php echo uplode ?>/<?php echo $cart["PhotoTab"]; ?>" />
                                            </td>
                
                                            <!-- Product Name -->
                                            <td class="product-name">
                                                <h6><a href="<?php echo $tab_link ?>"><?php echo $cart["NomTab"]?></a></h6>
                                            </td>
                
                                            <!-- Product price -->
                                            <td class="product-price">
                                                <span class="amount"><i class="fa fa-gbp"></i> <?php echo $cart["PrixTab"]?></span>
                                            </td>
                
                                            <!-- Quantity inputs -->
                                            <td class="product-quantity">
                                                <span class="amount"><?php echo $cart["quantity"]?></span>			
                                            </td>
                                            
                                            <?php
                                            $qty = $cart["quantity"];
                                            $price = $cart["PrixTab"];
                                            $total = $qty * $price;
                                            $totalSum += $total; ?>
                                            <!-- Product subtotal -->
                                            <td class="product-subtotal">
                                                <span class="amount"><i class="fa fa-gbp"></i> <?php echo $total?></span>
                                            </td>
                                            
                                        </tr>
                                        <?php
                                        }   
                                        ?>
                                    </tbody>
                                </table>
                            
                                <!-- **cart-collaterals - Starts** --> 
                                <div class="cart-collaterals">
                
                                    <div class="cart_totals">
                                        <h3>Cart Totals</h3>
                                        <table>
                                            <tbody>
                                            
                                                <tr class="cart-subtotal">
                                                    <th>Cart Subtotal</th>
                                                    <td><span class="amount"><i class="fa fa-gbp"></i> <?php echo $totalSum?></span></td>
                                                </tr>
                                                
                                                <tr class="shipping">
                                                    <th>Shipping</th>
                                                    <td>Free Shipping<input type="hidden" name="shipping_method" id="shipping_method" value="free_shipping" /></td>
                                                </tr>
                                                
                                                <tr class="total">
                                                    <th>Order Price Total</th>
                                                    <td><strong><span class="amount"><i class="fa fa-gbp"></i> <?php echo $totalSum?></span></strong></td>
                                                </tr>
                                            
                                            </tbody>
                                        </table>
                                    </div>                        	
                                </div> <!-- **cart-collaterals - Ends** -->
                                <!-- **payment - Starts** --> 
                                <div id="payment">
                                    <ul class="payment_methods methods">
                                        <li class="payment_method_bacs">
                                            <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs"  checked='checked' data-order_button_text="" />
                                            <label for="payment_method_bacs"><span></span>Direct Bank Transfer </label>
                                            <div class="payment_box payment_method_bacs" ><p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won&#8217;t be shipped until the funds have cleared in our account.</p> </div>
                                        </li>
                                       
                                        <li class="payment_method_paypal">
                                            <input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="paypal"  data-order_button_text="Proceed to PayPal" />
                                            <label for="payment_method_paypal"><span></span>PayPal <img src="images/paypal.png" alt="PayPal" /></label>
                                            <div class="payment_box payment_method_paypal" style="display:none;"><p>Pay via PayPal; you can pay with your credit card if you don&#8217;t have a PayPal account</p> </div>						
                                        </li>
                                    </ul>
                                    
                                    <div class="form-row place-order">
        
                                        <noscript>Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.<br/><input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals" /></noscript>
                                        <input type="hidden" value="<?php echo $_SESSION["IdClient"]; ?>" /><input type="hidden" name="id_client" />
                                        <input type="submit" class="button alt" name="checkout_place_order" id="place_order" value="Place order" data-value="Place order" />
                                        
                                    </div>
                            
                                    <div class="clear"></div>
        
                                </div>  <!-- **payment - Ends** --> 
                            </div> <!-- **order_review - Ends** -->
                        </form> <!-- **checkout - Ends** -->
                    </div> <!-- **woocommerce - Ends** --> 
                </div>
            </section> <!-- **Primary - Ends** -->  

            <footer id="footer" class="animate" data-animation="fadeIn" data-delay="100">
                <div class="container">
                    <div class="copyright">

                        <ul class="footer-links">
                            <li><a href="contact.php">Contact us</a></li>
                            <li><a href="#">Privacy policy</a></li>
                            <li><a href="#">Terms of use</a></li>
                            <li><a href="#">Faq</a></li>                    
                        </ul>
                     
                        <p>© 2022 <a href="index.php">Art Space</a>. All rights reserved.</p>
                    </div>
                </div>
            </footer>
        </div><!-- Main Ends Here-->
	</div>
</div><!-- **Wrapper Ends** -->
    
<!-- **jQuery** -->  
	<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>

	<script type="text/javascript" src="js/jquery.dropdown.js"></script>

	<script src="js/jsplugins.js" type="text/javascript"></script>

	<script src="js/custom.js"></script>
        
</body>
</html>
