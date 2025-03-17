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

                        $stmt = $link->query("SELECT SUM(PrixTab) as sum FROM cart c, tableaux t 
                        WHERE c.client_id=$idd
                        AND c.tableau_Id=t.IdTableau");
                        $row1 = $stmt->fetch_array();

                        $sum = $row1['sum'];
                        ?>
                                        <a href="shop-cart.php">Cart Page</a>
                                        <a href="#">Shopping Bag: <?php echo $row[0]; ?> items $<?php echo $sum; ?></a>
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
            </script> 
        <div class="placeorder text-center content-wrapper">
                <h1>Your Order Has Been Placed</h1>
                <img src="images/order.png" data-u="image" style="height:300px !important" alt="" >
                <p>Thank you for ordering with us, we'll contact you by email with your order details.</p>
        </div>
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
	</div>
</div><!-- **Wrapper Ends** -->
    
<!-- **jQuery** -->  
	<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>

	<script type="text/javascript" src="js/jquery.dropdown.js"></script>

	<script src="js/jsplugins.js" type="text/javascript"></script>

	<script src="js/custom.js"></script>
        
</body>
</html>