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
    
	<title>ArtSpace - About</title>
	
    <meta name="description" content="">
	<meta name="author" content="">
	
	<!--[if lt IE 9]>
	    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />    
    
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
            <!--<div class="loader-title"><img src="images/loader-logo.png" alt=""></div>-->
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
                        <li class="current_page_item menu-item-simple-parent">
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
                                    <a href="#">Shopping Bag  : <?php echo $row[0]; ?> items </a>
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
        </script>
  <!-- **header-wrapper Ends** -->
        <div id="main">
			<section id="primary" class="content-full-width"> <!-- **Primary Starts Here** -->            
                <div class="container">
					<div class="dt-sc-hr-invisible-small"></div>                
                	<div class="main-title animate" data-animation="pullDown" data-delay="100">
                        <h3> About Art </h3>
                        <p>“I dream my painting, and then I paint my dream.” – Vincent Van Gogh.</p>
                    </div>
                    <div class="dt-sc-service-content">
                    	<p>Art is not a simple imitation of nature. It is the expression of man or the mark he leaves of his ideas in the world. Which is different from the art of reproduction which is specific to technology. A work of art meets the criterion of beauty. Art includes human works intended to touch the senses and emotions of the public. It can be painting as well as sculpture, video, photo, drawing, literature, music, dance.</p>
                    </div>
                    <div class="dt-sc-hr-invisible"></div>
                    <div class="service-grid">
                        <div class="dt-sc-one-half column first animate" data-animation="fadeInDown" data-delay="100">
                        	<img src="images/about-img.png" alt="" title="">
                        </div>

                        <div class="dt-sc-one-half column">
                        	<div class="dt-sc-icon-content-wrapper"><!-- *dt-sc-icon-content-wrapper Starts here** -->
                                <div class="dt-sc-one-half column first">
                                    <div class="dt-sc-ico-content animate" data-animation="fadeInRight" data-delay="100">
                                        <h6>About Us</h6>
                                        <p><span>Name:</span>ChaYmae & Ihsane</p>
                                        <p><span>Age:</span>20 & 22</p>
                                        <p><span>Location:</span>Oujda / Morocco</p>
                                        <div class="dt-sc-hr-invisible-very-small"></div>
                                        <p>We are two students passionate about art and Aesthetics "Or philosophy of art" is a discipline of philosophy. Our interest in creativity and new technologies pushed us to create this project.</p>
                                    </div>
                                </div>
                                <div class="dt-sc-one-half column dt-sc-icon-wrapper">
                                    <div class="dt-sc-icon"><i class="fa fa-user-secret animate" data-animation="fadeInLeft" data-delay="100"></i></div>
                                </div>
                            </div><!-- *dt-sc-icon-content-wrapper Ends here** -->
                        </div>

                        <div class="dt-sc-one-half column">
                        	<div class="dt-sc-icon-content-wrapper left"><!-- *dt-sc-icon-content-wrapper Starts here** -->
                                <div class="dt-sc-one-half column first dt-sc-icon-wrapper">
                                    <div class="dt-sc-icon"><i class="fa fa-paint-brush animate" data-animation="fadeInRight" data-delay="100"></i></div>
                                </div>
                                <div class="dt-sc-one-half column">
                                    <div class="dt-sc-ico-content animate" data-animation="fadeInLeft" data-delay="100">
                                        <h6>Exhibitions</h6>
                                        <p><span>London:</span> Jan 2nd to Feb 12th</p>
                                        <p><span>France:</span> Mar 5th to Apr 18th</p>
                                        <p><span>Morocco:</span> Sep 22nd to Nov 1st</p>
                                        <p><span>Australia:</span> Nov 21st to Dec 25th</p>
										<p><span>Rome:</span> Vacation</p>                                        
                                    </div>
                                </div>
                            </div><!-- *dt-sc-icon-content-wrapper Ends here** -->
                        </div>

                        <div class="dt-sc-one-half column">
                        	<div class="dt-sc-icon-content-wrapper"><!-- *dt-sc-icon-content-wrapper Starts here** -->
                                <div class="dt-sc-one-half column first">
                                    <div class="dt-sc-ico-content animate" data-animation="fadeInRight" data-delay="100">
                                        <h6>Get in touch</h6>
                                        <p><i class="fa fa-map-marker"></i>109, Al-qods, Baltimore, Morocco</p>
                                        <p><i class="fa fa-phone"></i> +212 6 69 85 98 73 </p>
                                         <p><i class="fa fa-envelope"></i><a href="https://myaccount.google.com/u/1/?utm_source=OGB&tab=kk&utm_medium=app">spaceart.infos@gmail.com</a></p>
                                        <div class="dt-sc-hr-invisible-very-small"></div>
                                        <h6>Follow us on</h6>
                                        <ul class="type3 dt-sc-social-icons">
                                            <li class="twitter"><a href="https://twitter.com/Ihsane_abaali"><i class="fa fa-twitter"></i></a></li>
                                            <li class="facebook"><a href="https://fr-fr.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                            <li class="google"><a href="https://myaccount.google.com/u/1/?tab=kk"><i class="fa fa-google"></i></a></li>
                                            <li class="dribbble"><a href="https://dribbble.com/signup/new"> <i class="fa fa-dribbble"></i> </a></li>
                                        </ul>                                    
                                    </div>
                                </div>
                                <div class="dt-sc-one-half column dt-sc-icon-wrapper">
                                    <div class="dt-sc-icon"><i class="fa fa-whatsapp animate" data-animation="fadeInLeft" data-delay="100"></i></div>
                                </div>
                            </div><!-- *dt-sc-icon-content-wrapper Ends here** -->
                        </div>

                    </div>
                </div>				
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
                       
                        <p>© 2022 <a href="index.php">Art Space</a>. All rights reserved.</p>
                    </div>
                </div>
            </footer>
        </div><!-- Main Ends Here-->
	</div>
</div><!-- **Wrapper Ends** -->
	
<!-- **jQuery** --> 
   
	<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="js/jsplugins.js" type="text/javascript"></script>

	<script src="js/controlpanel.js" type="text/javascript"></script>
    
	<script src="js/custom.js"></script>
        
</body>
</html>
