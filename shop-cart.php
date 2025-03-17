<?php

include_once('php/inc/config.php');

?>


<!Doctype html>
<html lang="en-gb" class="no-js"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
	<title>Art Space - Cart Page</title>
	
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
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<style>
/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
    background: #504949;
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #504949;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}	
.close {
    font-weight: 900;
    color: #fff;
    opacity: inherit;
}
</style>
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

                        $stmt = $link->query("SELECT SUM(PrixTab) as sum FROM cart c, tableaux t 
                        WHERE c.client_id=$idd
                        AND c.tableau_Id=t.IdTableau");
                        $row1 = $stmt->fetch_array();

                        $sum = $row1['sum'];
                        ?>
            
                                        <a href="shop-cart.php">Cart Page</a>
                                        <a href="#">Shopping Bag : <?php echo $row[0]; ?> items <?php echo $sum; ?></a>
                                        <a href="logout.php">Log Out</a>
                                    </div>
                                        &nbsp;&nbsp;<b><?php echo htmlspecialchars($_SESSION["PrenomClient"]); ?></b>
                                    </div>
                                </div>
                                </li>
                                    
                                <?php
                            }
                            ?>
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
            <section id="primary" class="content-full-width"><!-- **Primary Starts Here** -->
            	<div class="container">
                	<div class="dt-sc-hr-invisible-small"></div>
                	<div class="woocommerce">
                        
    
                            <table class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-name">ID</th>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Remove</th>
                                        <th class="product-update">Update</th>
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
                                        while ($cart = mysqli_fetch_array($sql_req)) {
                                            $vente_link = "shop-checkout.php?id_cart=" . $cart['cartId'];
                                            $tab_link = "shop-detail.php?id_tab=" . $cart['IdTableau'];
                                    ?>
                                    <form name="form1" action="php/update_cart.php" method="post">
                                        <!-- The thumbnail -->
                                        <td><?php echo $cart['cartId']; ?></td>
                                        <td class="product-thumbnail">
                                            <a href="<?php echo $tab_link ?>">
                                            <img data-u="image" style="height:50px !important" alt="" src="<?php echo uplode ?>/<?php echo $cart["PhotoTab"]; ?>" />
                                            </a>
                                        </td>
            
                                        <!-- Product Name -->
                                        <td class="product-name">
                                            <h6><a href="<?php echo $tab_link ?>"><?php echo $cart["NomTab"]?></a></h6>
                                        </td>
            
                                        <!-- Product price -->
                                        <td class="product-price">
                                            <span class="amount">$ <span id="price"><?php echo $cart["PrixTab"]?></span></span>
                                        </td>
            
                                        <!-- Quantity inputs -->
                                        <td class="product-quantity">
                                        	
                                            <div class="quantity">
                                                <input type="number" id="qty" name="quantiy" value='<?php echo $cart["quantity"]?>' title="Qty" class="input-text qty text" />
                                                
                                            </div>			
                                        </td>
            
                                        <!-- Product subtotal -->
                                        <td class="product-subtotal">
                                        <!-- <input type="text" name="total" id="total"> -->
                                            <span class="amount">$ <span id="total"><?php echo $cart["PrixTab"]?></span></span>
                                        </td>
                                        
                                        <!-- Remove from cart link -->
                                        <td class="product-remove">
                                            <a href="#deleteEmployeeModal" data-toggle="modal" class="remove" title="Remove this item">&times;</a>
                                        </td>

                                        <td class="product-Update">
                                        <input type='hidden' name='id_cartt' value='<?php echo $cart['cartId']?>' />
                                            <a href="##" onClick="fn_submit();" class="update" title="Update this item">&circlearrowright;</a>
                                            <script>
                                                function fn_submit()
                                                {
                                                document.form1.submit();
                                                }
                                            </script>
                                        </td>
                                    </tr>
                                    <?php
                                        }   
                                        ?>
                                </tbody>
                            </table>
                            <a href="shop-checkout.php" target="_blank" class="button" data-toggle="tooltip" >Continue Shopping</a>
                        </form>
                    </div>
                </div>
                <div class="dt-sc-hr-invisible-small"></div>
            </section><!-- **Primary Ends Here** -->
            <footer id="footer" class="animate" data-animation="fadeIn" data-delay="100">
                <div class="container">
                    <div class="copyright">    

                        <ul class="footer-links">
                            <li><a href="contact.php">Contact us</a></li>
                            <li><a href="#">Privacy policy</a></li>
                            <li><a href="#">Terms of use</a></li>
                            <li><a href="#">Faq</a></li>                    
                        </ul>
                        <script src="googleTranslate.js" type="text/javascript"></script>   

                        <p>© 2022 <a href="index.php">Art Space</a>. All rights reserved.</p>
                        
                    </div>
                </div>
            </footer> 
        </div>
    </div><!-- Main Ends Here-->
</div>
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="php/delete_cart.php">
				<div class="modal-header">	
				<input type="hidden" name="delete_id" id="delete_id">	
					<h4 class="modal-title">Supprimer le Produit Archivé</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Êtes-vous sûr de vouloir supprimer ces enregistrements?</p>
					<p class="text-warning"><small>Cette action ne peut pas être annulée.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-light" data-dismiss="modal" value="Annuler">
					<input type="submit" name="deletedata" class="btn btn-danger" value="Supprimer">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- **Wrapper Ends** -->   
    <script>
        $(function() {
  var price = $('#price').text();

  $('#subtract').on("click",function() {
    var $qty = $('#qty');
    var current = parseInt($qty.val());
    if ( current > 1 ) {
        $qty.val(current-1);
        $('#total').text(price*(current-1));
    } else {
        $('#total').text(price);
    }
  });

  $('#add').on("click",function() {
    var $qty = $('#qty');
    var current = parseInt($qty.val());
    $qty.val(current+1);
    $('#total').text(price*(current+1));
    
  });
}); 
$(document).ready(function(){
	$(".checkout").on("keyup", ".quantity", function(){
		var price = +$(".price").data("price");
		var quantity = +$(this).val();
		$("#total").text("$" + price * quantity);
	})
})
  </script>
  <script>
        $(document).ready(function () {

            $('.remove').on('click', function () {

                $('#deleteEmployeeModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>
</body>
</html>
