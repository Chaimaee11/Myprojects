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
    
	<title>ArtSpace - Contact</title>
	
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
                        <li class="current_page_item menu-item-simple-parent">
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
                                    <a href="#">Shopping Bag: <?php echo $row[0]; ?> items $</a>
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
            <section id="primary" class="content-full-width"><!-- **Primary Starts Here** -->
				<div class="fullwidth-section"><!-- Full-width section Starts Here -->
                	<div class="container">
                    	<div class="dt-sc-hr-invisible-small"></div>
						<div class="main-title animate" data-animation="pullDown" data-delay="100">
                            <h3> Contact </h3>
                            <p>Feel free to contact us and we will get back to you as soon as we can.</p>
                        </div>                    	
                    </div>
                    <div class="contact-section"><!-- **contact-section Starts Here** -->
                        <div id="contact_map" class="animate" data-animation="fadeInRight" data-delay="100">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13109.62546744706!2d-1.9438612!3d34.7705439!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1d872a3cfc39206b!2sComplexe%20De%20Formation%20Dans%20Les%20M%C3%A9tiers%20Des%20Nouvelles%20Technologies%20De%20l%E2%80%99Information%2C%20De%20l%E2%80%99Offshoring%20et%20de%20l%E2%80%99Electronique!5e0!3m2!1sfr!2sma!4v1654446484952!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <!-- <div id="contact_map" class="animate" data-animation="fadeInRight" data-delay="100"></div> -->
                        <div class="dt-sc-contact-info animate" data-animation="fadeInLeft" data-delay="100">
                            <h3>Artist Info</h3>
                            <div class="dt-sc-contact-details"><span class="fa fa-map-marker"></span> Address: Dhar Lamhalla, street B 23, OUJDA, Morocco </div>
                            <div class="dt-sc-contact-details"><span class="fa fa-tablet"></span> Phone: +212 7 02 40 28 99  </div>
                            <div class="dt-sc-contact-details"><span class="fa fa-paperclip"></span> Fax: +1 100 458 2345 </div>
                            <div class="dt-sc-contact-details"><span class="fa fa-envelope"></span> Email: <a href="mailto:Chaimaegs11@gmail.com">Chaimaegs11@gmail.com</a> </div>
                            <div class="dt-sc-contact-details"><span class="fa fa-globe"></span> Web: <a href="index.php">http://ArtSpace.com</a> </div>
                            <ul class="type3 dt-sc-social-icons">
                                <li class="twitter"><a href="https://twitter.com/Ihsane_abaali"> <i class="fa fa-twitter"></i> </a></li>
                                <li class="facebook"><a href="https://fr-fr.facebook.com/"> <i class="fa fa-facebook"></i> </a></li>
                                <li class="linkedin"><a href="https://www.linkedin.com/in/chaymae-g-a062511bb"> <i class="fa fa-linkedin"></i> </a></li>
                                <li class="google"><a href="https://support.google.com/accounts/answer/27441?hl=en"> <i class="fa fa-google"></i> </a></li>
                                <li class="dribbble"><a href="https://dribbble.com/signup/new"> <i class="fa fa-dribbble"></i> </a></li>
                                <li class="pinterest"><a href="https://pin.it/1rlEQYz"> <i class="fa fa-pinterest"></i> </a></li>
                            </ul>                        
                        </div>
                    </div><!-- **contact-section Ends Here** -->
                    <div class="dt-sc-hr-invisible-toosmall"></div>
                    <div class="container">
                    	<div class="dt-sc-three-fourth column first animate" data-animation="fadeInDown" data-delay="100">
                            <h3>Get in Touch</h3>
                            <form class="enquiry-form" action="php/send.php" method="post" >
                                <div class="column dt-sc-one-third first">
                                    <p class="input-text">
                                       <input class="input-field" type="text" required="" name="txtname" title="Enter your Name" placeholder="Name *"/>
                                    </p>
                                </div>
                                <div class="column dt-sc-one-third">
                                    <p class="input-text">
                                       <input class="input-field" type="email" required="" autocomplete="off" name="txtemail" title="Enter your valid id" placeholder="Email *"/>
                                    </p>
                                </div>
                                <div class="column dt-sc-one-third">
                                    <p class="input-text">
                                       <input class="input-field" type="text" autocomplete="off" placeholder="Subject"/>
                                    </p>
                                </div>
                                <p class="input-text"> 
                                    <textarea class="input-field" required="" rows="3" cols="5" name="txtmessage" title="Enter your Message" placeholder="Message *"></textarea>
                                </p>
                                
                                <p class="submit"> <input type="submit" value="Send" name="submit" class="button" /> </p>
                            </form>
                            <div id="ajax_contactform_msg"></div>
                        </div>
                        <div class="dt-sc-one-fourth column animate" data-animation="fadeInRight" data-delay="100">
                            <h5>Business Hours</h5>
                            <ul class="dt-sc-working-hours">
                            	<li>Hotline is available for 24 hours a day!..</li>
								<li>Monday - Friday :<span> 8am to 6pm</span></li>
                                <li>Saturday : <span>10am to 2pm</span></li>
                                <li>Sunday : <span>Closed</span></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- Full-width section Ends Here -->
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

    
	<script src="js/jquery.tabs.min.js"></script>
	<script type="text/javascript" src="js/jquery-migrate.min.js"></script>
    
	<script src="js/jquery.validate.min.js" type="text/javascript"></script>    
    
	<script src="js/jsplugins.js" type="text/javascript"></script>   
    
    <script src="http://www.google.com/jsapi"></script>
    
	

	<script src="js/custom.js"></script>
        
</body>
</html>
