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
    
	<title>Art Space - Home</title>
	
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
	<!-- Modernizr -->
	<script src="js/modernizr.js"></script> 
</head>

<body>
    <div class="loader-wrapper">
        <div id="large-header" class="large-header">
            <h1 class="loader-title"><span>Art</span> Space</h1>
        </div>        
    </div>
<!-- **Wrapper** -->
<div class="wrapper">
     <div class="slider-container">
        <div class="slider fullwidth-section parallax">
        </div>
    </div> 
    
	<div class="inner-wrapper">
      <div id="header-wrapper"> <!-- **header-wrapper Starts** -->
          <header id="header" class="header1">
              <div class="container">
                      
                  <!-- **Logo - End** -->
                  <div class="logo">
                      <a href="home.php" title="Art Space"> <img src="images/logo.png" alt="logo"/> </a>
                  </div><!-- **Logo - End** -->

                  <nav id="main-menu">
                      <div id="dt-menu-toggle" class="dt-menu-toggle">
                        Menu
                        <span class="dt-menu-toggle-icon"></span>
                      </div>                  
                      <ul class="menu type4"><!-- Menu Starts -->
                        <li class="current_page_item menu-item-simple-parent"><a href="home.php">Home</a></li>
                        <li class="menu-item-simple-parent">
                            <a href="about.php">About us</a>
                        </li>
                        <li class="menu-item-simple-parent"><a href="gallery.php">Gallery</a>
                            <ul class="sub-menu">
                                <li><a href="gallery-detail-with-lhs.php">Gallery-detail</a></li>
                            </ul>
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
  <!-- **header-wrapper Ends** -->

        <div id="main">
			<section id="primary" class="content-full-width"> <!-- **Primary Starts Here** -->  
                      
            	<div class="dt-sc-hr-invisible-small"></div>
                
                <div class="fullwidth-section"> <!-- **Full-width-section Starts Here** -->
                    <div class="container">
                        <div class="main-title animate" data-animation="pullDown" data-delay="100">
                            <h2 class="aligncenter"> Portfolio </h2>
                            <p> Some of my best work </p>
                        </div>
                    </div>
                    <div class="portfolio-fullwidth">
                        <div class="portfolio-grid">
                            <div class="dt-sc-portfolio-container isotope"> <!-- **dt-sc-portfolio-container Starts Here** -->
                                <div class="portfolio nature still-life dt-sc-one-fourth">
                                    <figure>
                                        <img src="images/port1.jpeg" alt="" title="">
                                        <figcaption>
                                            <div class="portfolio-detail">
                                                <div class="views">
                                                    <a class="fa fa-camera-retro" data-gal="prettyPhoto[gallery]" href="images/port1.jpeg"></a>
                                                </div>
                                                <div class="portfolio-title">
                                                    <h5><a href="gallery.php">Vincent Van Gogh</a></h5>
                                                    <p>We must begin by experiencing what we want to express!</p>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="portfolio nature people street dt-sc-one-fourth">
                                    <figure>
                                        <img src="images/port2.jpeg" alt="" title="">
                                        <figcaption>
                                            <div class="portfolio-detail">
                                                <div class="views">
                                                    <a class="fa fa-camera-retro" data-gal="prettyPhoto[gallery]" href="images/port2.jpeg"></a>
                                                </div>
                                                <div class="portfolio-title">
                                                    <h5><a href="gallery.php">Coco Chanel</a></h5>
                                                    <p>Fashion fades, only style remains</p>
                                                </div>
                                            </div>
                                        </figcaption>
                                   </figure>
                                </div>
                                <div class="portfolio street landscapes still-life dt-sc-one-fourth">
                                    <figure>
                                        <img src="images/port3.jpeg" alt="" title="">
                                        <figcaption>
                                            <div class="portfolio-detail">
                                                <div class="views">
                                                    <a class="fa fa-camera-retro" data-gal="prettyPhoto[gallery]" href="images/port3.jpeg"></a>
                                                </div>
                                                <div class="portfolio-title">
                                                    <h5><a href="gallery.php">F R I D A K A L H L O</a></h5>
                                                    <p>To create your own paradise, you have to tap into your personal hell.</p>
                                                </div>
                                            </div>
                                        </figcaption>                                        
                                   </figure>
                                </div>
                                <div class="portfolio nature still-life dt-sc-one-fourth">
                                    <figure>
                                        <img src="images/port4.jpeg" alt="" title="">
                                        <figcaption>
                                            <div class="portfolio-detail">
                                                <div class="views">
                                                    <a class="fa fa-camera-retro" data-gal="prettyPhoto[gallery]" href="images/port4.jpeg"></a>
                                                </div>
                                                <div class="portfolio-title">
                                                    <h5><a href="gallery.php">Line art & Calligraphie</a></h5>
                                                    <p>Style is a way of saying what you are without speaking!</p>
                                                </div>
                                            </div>
                                        </figcaption>                                        
                                   </figure>
                                </div>
                                <div class="portfolio people still-life dt-sc-one-fourth">
                                    <figure>
                                        <img src="images/port5.jpeg" alt="" title="">
                                        <figcaption>
                                            <div class="portfolio-detail">
                                                <div class="views">
                                                    <a class="fa fa-camera-retro" data-gal="prettyPhoto[gallery]" href="images/port5.jpeg"></a>
                                                </div>
                                                <div class="portfolio-title">
                                                    <h5><a href="gallery.php">Line art</a></h5>
                                                    <p>Minimalism for a new life</p>
                                                </div>
                                            </div>
                                        </figcaption>                                        
                                   </figure>
                                </div>
                                <div class="portfolio people still-life dt-sc-one-fourth">
                                    <figure>
                                        <img src="images/port6.jpeg" alt="" title="">
                                        <figcaption>
                                            <div class="portfolio-detail">
                                                <div class="views">
                                                    <a class="fa fa-camera-retro" data-gal="prettyPhoto[gallery]" href="images/port6.jpeg"></a>
                                                </div>
                                                <div class="portfolio-title">
                                                    <h5><a href="gallery.php">Line art & Calligraphie</a></h5>
                                                    <p>The art of simplicity</p>
                                                </div>
                                            </div>
                                        </figcaption>                                        
                                   </figure>
                                </div>
                        
                            </div><!-- **dt-sc-portfolio-container Ends Here** -->
                        </div>
                    </div>
                </div><!-- **Full-width-section Ends Here** -->
                <div class="clear"></div>              
                <div class="container">
                    <div class="main-title animate" data-animation="pullDown" data-delay="100">
                        <h2 class="aligncenter"> Blog </h2>
                        <p> To interact with artists and post news for art and interests. join us in our blog </p>
                    </div>
                </div>	
                <div class="fullwidth-section"><!-- **Full-width-section Starts Here** -->
                	<div class="blog-section">
                        <article class="blog-entry">
                            <div class="entry-thumb">
                                <ul class="blog-slider">
                                    <li> <img src="images/blog1.jpg" alt="" title=""> </li>
                                    <li> <img src="images/blog2.jpg" alt="" title=""> </li>
                                    <li> <img src="images/blog3.jpg" alt="" title=""> </li>
                                    <li> <img src="images/blog4.jpg" alt="" title=""> </li>
                                </ul>
                            </div> 
                            <div class="entry-details">
                                <div class="entry-title">
                                    <h3><a href="blog-detail.php">Acrylic</a></h3>
                                </div>
                                <div class="entry-body">
                                    <p><b>Acrylic painting</b>, Acrylic paint is a paint composed of a mixture of pigments and acrylic resin. It dries by evaporation of the water it contains, and not by evaporation of volatile organic solvents, unlike oil paints. It therefore contains little or no volatile organic compounds (VOCS). </p>
                                </div>
                                
                            </div>                   	
                        </article>
					</div>
                    
                	<div class="blog-section">
                        <article class="blog-entry type2">
                            <div class="entry-details">
                                <div class="entry-title">
                                    <h3><a href="blog-detail.php">Encaustic</a></h3>
                                </div>
                                <div class="entry-body">
                                    <p><b>Encaustic painting</b>, Encaustic painting or wax painting, used since Antiquity, is a painting technique that uses colors diluted in melted wax, that is to say using beeswax as a binder. This paste is used hot. This technique is mainly used in painting on wood. </p>
                                </div>
                               
                            </div>                   	
							<div class="entry-thumb">
                                <ul class="blog-slider">
                                    <li> <img src="images/blog5.jpg" alt="" title=""> </li>
                                    <li> <img src="images/blog6.jpg" alt="" title=""> </li>
                                    <li> <img src="images/blog7.png" alt="" title=""> </li>
                                    <li> <img src="images/blog8.jpg" alt="" title=""> </li>
                                </ul>
                            </div>                             
                        </article>
					</div>
                    
                	<div class="blog-section">
                        <article class="blog-entry">
                            <div class="entry-thumb">
                                <ul class="blog-slider">
                                    <li> <img src="images/blog9.jpg" alt="" title=""> </li>
                                    <li> <img src="images/blog10.jpg" alt="" title=""> </li>
                                    <li> <img src="images/blog11.png" alt="" title=""> </li>
                                    <li> <img src="images/blog12.jpg" alt="" title=""> </li>
                                </ul>
                            </div> 
                            <div class="entry-details">
                                <div class="entry-title">
                                    <h3><a href="blog-detail-with-lhs.php">Oil painting</a></h3>
                                </div>
                                <div class="entry-body">
                                    <p><b>Oil painting</b>, Oil paint is a paint whose binder or vehicle is a drying oil which completely envelops the pigment particles, is the process of painting with pigments with a medium of drying oil as a binder. It has been the most common technique of artistic painting on wood panel or canvas for several centuries. </p>
                                </div>
                                
                            </div>                   	
                        </article>
					</div>
                    
                	<div class="blog-section">
                        <article class="blog-entry type2">
                            <div class="entry-details">
                                <div class="entry-title">
                                    <h3><a href="blog-detail-with-rhs.php">Impasto</a></h3>
                                </div>
                                <div class="entry-body">
                                    <p><b>Impasto painting</b>, Impasto is a technique used in painting, where paint is deposited onto an area of the surface in a thick manner, usually thick enough that the strokes of the brush or paint knife are visible. The paint can also be mixed directly on the canvas. </p>
                                </div>
                            </div>                   	
							<div class="entry-thumb">
                                <ul class="blog-slider">
                                    <li> <img src="images/blog13.jpg" alt="" title=""> </li>
                                    <li> <img src="images/blog14.png" alt="" title=""> </li>
                                    <li> <img src="images/blog15.jpg" alt="" title=""> </li>
                                </ul>
                            </div>                             
                        </article>
					</div>
                </div><!-- **Full-width-section Ends Here** -->
                <div class="clear"></div>             
                
                <div class="fullwidth-section"><!-- **Full-width-section Starts Here** -->
                    <div class="container">
                        <div class="main-title animate" data-animation="pullDown" data-delay="100">
                            <h2 class="aligncenter"> Frames </h2>
                            <p> Tell the full story with a secret story pocket on the back of your frame </p>
                        </div>
                    </div>
                    <div class="frame-grid"><!-- **Frame-Grid Starts Here** -->
                        <div class="frame-thumb"><!-- **Frame-Thumb Starts Here** -->
                            <div class="frame-fullwidth">
                                <div class="dt-sc-frame-container isotope"> <!-- **dt-sc-portfolio-container Starts Here** -->
                                    <div class="frame ceramic dt-sc-one-third">
                                        <figure>
                                            <img src="images/portrait.jpg" alt="" title="">
                                       </figure>
                                    </div>
                                    <div class="frame plastic dt-sc-one-third">
                                        <figure>
                                            <img src="images/camane.jpg" alt="" title="">
                                       </figure>
                                    </div>
                                    <div class="frame steel dt-sc-one-third">
                                        <figure>
                                            <img src="images/mosque.jpg" alt="" title="">
                                       </figure>
                                    </div>
                                    <div class="frame wooden dt-sc-one-third">
                                        <figure>
                                            <img src="images/henrik-donnestad.jpg" alt="" title="">
                                       </figure>
                                    </div>                                    
                                    <div class="frame wooden dt-sc-one-third">
                                        <figure>
                                            <img src="images/aquardioa-1.jpg" alt="" title="">
                                       </figure>
                                    </div>
                                </div><!-- **dt-sc-portfolio-container Ends Here** -->
                            </div>
                        </div><!-- **Frame-Thumb Starts Here** -->
                        <div class="frame-details"><!-- **Frame-Details Starts Here** -->
                        	<div class="frame-content">
                            	<div id="frame-all" class="dt-frames">
                                    <p>We'll recommend specific frames based on if your art is on paper or canvas.</p>
                                </div>
                            	<div id="frame-steel" class="dt-frames hidden">
                                    <p>Take a Look at our Custom Welded Steel Picture Frames for Paintings.</p>
                                </div>
                            	<div id="frame-wooden" class="dt-frames hidden">
                                    <p>A versatile and durable wooden frame that can be placed on a tabletop or hung horizontally or vertically on the wall.</p>
                                </div>
                            	<div id="frame-plastic" class="dt-frames hidden">
                                    <p>This plastic picture frame is perfect for displaying your paintings.</p>
                                </div>
                            	<div id="frame-ceramic" class="dt-frames hidden">
                                    <p>This ceramic picture frame is perfect for displaying your paintings.</p>
                                </div>
                            </div>
                            <div class="frame-sorting"><!-- **Frame-sorting Starts Here** -->
                                <a data-filter="*" href="#" class="active-sort type1 dt-sc-button animate" data-animation="fadeIn" data-delay="100">All</a>
                                <a data-filter=".steel" href="#" class="type1 dt-sc-button animate" data-animation="fadeIn" data-delay="200">Steel</a>
                                <a data-filter=".wooden" href="#" class="type1 dt-sc-button animate" data-animation="fadeIn" data-delay="300">Wooden</a>
                                <a data-filter=".plastic" href="#" class="type1 dt-sc-button animate" data-animation="fadeIn" data-delay="400">plastic</a>
                                <a data-filter=".ceramic" href="#" class="type1 dt-sc-button animate" data-animation="fadeIn" data-delay="500">Ceramic</a>
                            </div><!-- **Frame-sorting Ends Here** -->
                        </div><!-- **Frame-Details Ends Here** -->
                    </div><!-- **Frame-Grid Ends Here** -->
                </div><!-- **Full-width-section Ends Here** -->
                
            	<div class="dt-sc-hr-invisible-small"></div>
                <div class="clear"></div>

                <div class="fullwidth-section"><!-- **Full-width-section Starts Here** -->
                    <div class="container">
                    
                        <div class="main-title animate" data-animation="pullDown" data-delay="100">
                            <h2 class="aligncenter"> About Us </h2>
                            <p> ArtSpace online gallery site to display your artwork for everyone. </p>
                        </div>
                        
                        <div class="about-section">
                        
                            <div class="dt-sc-one-half column first">
                                <img src="images/about.png" title="" alt="">
                            </div>
                            
                            <div class="dt-sc-one-half column">
                                <h3 class="animate" data-animation="fadeInLeft" data-delay="200">A Little Intro</h3>
                                <p>ArtSpace online gallery site to display your artwork for everyone.<br>
                                ArtSpace is a platform where the works of art of new talents, new artists are exhibited.<br> ArtSpace certify the quality of the work sold. Additionally, the platform helps artists deliver their artwork to buyers.</p>
                                <h3 class="animate" data-animation="fadeInLeft" data-delay="300">My Exhibitions</h3>
                                <p>Our Gallery display the artworks of our artists.
                                Art Space organizes online galleries.</p>
                                <h3 class="animate" data-animation="fadeInLeft" data-delay="400">Newsletter</h3>
                                <p>Stay up to date with weekly art releases, insightful artist profiles and exclusive collections.</p>
                                <form method="post" class="mailchimp-form dt-sc-three-fourth" name="frmnewsletter" action="php/subscribe.php">	
                                    <p class="input-text">
                                       <input class="input-field" type="email" name="mc_email" value="" required/>
                                       <label class="input-label">
                                                <i class="fa fa-envelope-o icon"></i>
                                                <span class="input-label-content">Mail</span>
                                            </label>
                                       <input type="submit" name="submit" class="submit" value="Subscribe" />
                                    </p>
                                </form>
                                <div id="ajax_subscribe_msg"></div>                               
                            </div>
                        </div>
                    </div>
				</div><!-- **Full-width-section Ends Here** -->
                
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

                        <p>© 2022 <a href="home.php">Art Space</a>. All rights reserved.</p>
                        
                    </div>
                </div>
            </footer>            
        </div><!-- Main Ends Here-->
	</div><!-- **inner-wrapper - End** -->
</div><!-- **Wrapper Ends** -->
	
<!-- **jQuery** -->  
	<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>

    <script src="js/jquery.inview.js" type="text/javascript"></script>
    <script src="js/jquery.viewport.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    
	<script src="js/jsplugins.js" type="text/javascript"></script>
    
	<script src="js/jquery.prettyPhoto.js" type="text/javascript"></script>   
    
	<script src="js/jquery.validate.min.js" type="text/javascript"></script> 
    
    <script src="js/jquery.tipTip.minified.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
	
	<script src="js/custom.js"></script>
        
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
</body>
</html>
