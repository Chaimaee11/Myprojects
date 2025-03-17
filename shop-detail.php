<?php
include_once('php/inc/config.php');


error_reporting(E_ALL);
ini_set("display_errors", 1);
$id_tab = $_GET['id_tab'];
$sql = "SELECT * FROM  tableaux t, artistes a, categorie c 
											WHERE t.IdTableau='".$id_tab."' 
                                            AND t.IdTableau = a.IdArtiste
											AND t.IdTableau = c.IdCategorie";

$tableaux = mysqli_fetch_array(mysqli_query($link,$sql));


?>

<!Doctype html>
<html lang="en-gb" class="no-js"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
	<title>Art Space - Shop Details</title>
	
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
                        <li class="current_page_item menu-item-simple-parent"><a href="shop.php">Shop</a>                   
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
        </script>   <!-- **header-wrapper Ends** -->

        <div id="main">
            <section id="primary" class="content-full-width"><!-- **Primary Starts Here** -->
                <div class="container">
                	<div class="dt-sc-hr-invisible-small"></div>
                    <div class="main-title animate" data-animation="pullDown" data-delay="100">
                        <h3> How Art Saved My Life </h3>
                        <p>For some, shopping is an art. For others, it's a sport.</p>
                    </div>
                    <div class="cart-wrapper"><!-- *cart-wrapper starts here** -->
                        <div class="dt-sc-three-fifth column first">
                            <div class="cart-thumb">
                                    <img data-u="image" style="height:500px !important" alt="" src="<?php echo uplode ?>/<?php echo $tableaux["PhotoTab"]; ?>" />
                            </div>
                            <h5>more from this artist</h5>
                            <ul class="thumblist">
                            	<li>
                                	<a href="#" class="product"><img src="images/acrilique4.jpg" alt="" title=""></a>
                                </li>
                            	<li>
                                	<a href="#" class="product"><img src="images/acrilique5.jpg" alt="" title=""></a>
                                </li>
                            	<li>
                                	<a href="#" class="product"><img src="images/acrilique6.jpg" alt="" title=""></a>
                                </li>
                            	<li>
                                	<a href="#" class="product"><img src="images/acrilique7.jpg" alt="" title=""></a>
                                </li>
                            	<li>
                                	<a href="#" class="product"><img src="images/acrilique8.jpg" alt="" title=""></a>
                                </li>                                                                                                                   
                            </ul>
                            <div class="commententries"><!-- *commententries starts here** -->
                                <h4> Comments ( 3 ) </h4>
                                <ul class="commentlist"><!-- *commentlist starts here** -->
                                    <li>
                                        <div class="comment">
                                            <header class="comment-author">
                                                <img title="" alt="image" src="images/post-img1.jpg">
                                            </header>
                                            <div class="comment-details">
                                                <div class="author-name">
                                                    <a href="#">Callahan James</a>
                                                </div>
                                                <div class="commentmetadata"><span>/</span> Acrylic Painting</div>
												<div title="Rated 5.00 out of 5" class="star-rating"><span style="width:80%"></span></div>
                                                <div class="comment-body">
                                                    <div class="comment-content">
                                                        <p>The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>
                                                        <div class="author-metadata">
                                                            <p><span class="fa fa-comments"></span><a href="#"> 19 </a></p>
                                                            <p><span class="fa fa-folder-open"> </span><a href="#"> Art</a></p>
                                                            <p><span class="fa fa-calendar"></span><a href="#"> 05 Apr 2022 </a></p>
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="children">
                                            <li>
                                                <div class="comment">
                                                    <header class="comment-author">
                                                            <img title="" alt="image" src="images/post-img2.jpg">
                                                    </header>
                                                    <div class="comment-details">
                                                        <div class="author-name">
                                                            <a href="#">Sean Bean</a>
                                                        </div>
                                                    <div class="commentmetadata"><span>/</span> Sculpture</div>
														<div title="Rated 5.00 out of 5" class="star-rating"><span style="width:70%"></span></div>                                                    
                                                        <div class="comment-body">
                                                            <div class="comment-content">
                                                                <p>The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>
                                                                <div class="author-metadata">
                                                                    <p><span class="fa fa-comments"></span><a href="#"> 08 </a></p>
                                                                    <p><span class="fa fa-folder-open"> </span><a href="#"> Creative</a></p>
                                                                    <p><span class="fa fa-calendar"></span><a href="#"> 16 Juin 2022 </a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>                                    
                                    </li>
                                </ul><!-- *commentlist Ends here** -->
                            </div><!-- *commententries Ends here** -->
                        </div>
                        <div class="dt-sc-two-fifth column">
                            <!-- Author Detail Starts Here -->
                            <div class="post-author-details">
                                <div class="entry-author-image">
                                    <img data-u="image" style="height:100px !important" alt="" src="<?php echo uplode1 ?>/<?php echo $tableaux["PhotoArtiste"]; ?>" />
                                </div>
                                <div class="author-title">
                                    <h5><a href="#"><?php echo $tableaux['NomArtiste'] . ' ' . $tableaux['PrenomArtiste']; ?></a></h5>
                                    <span><?php echo ($tableaux['AdresseArtiste']) ?></span>
									<div class="woocommerce-product-rating">
                                        <div title="Rated 4.40 out of 5" class="star-rating"><span style="width:85%"></span></div>
                                        <a href="#">( 4 customer reviews )</a>
                                    </div>
                                </div>                                
                                <div class="author-desc">
                                    <p><?php echo ($tableaux['BioArtiste']) ?></p>
                                </div>
                            </div>
                            <div class="project-details">
                            	<ul class="client-details">
                                	<li>
                                    	<p><span>Title :</span><?php echo ($tableaux['NomTab']) ?></p>
                                    </li>
                                    <li>
                                    	<p><span>Price :</span>$&nbsp;<?php echo ($tableaux['PrixTab']) ?></p>
                                    </li>  
                                	<li>
                                    	<p><span>Artist :</span><?php echo $tableaux['NomArtiste'] . ' ' . $tableaux['PrenomArtiste']; ?></p>
                                    </li>
                                	<li>
                                    	<p><span>Category :</span><?php echo ($tableaux['NomCategorie']) ?></p>
                                    </li>
                                	<li>
                                    	<p><span>Description :</span><?php echo ($tableaux['DescriptionTab']) ?></p>
                                    </li>
                                	<li>
                                    	<p><span>Uploaded :</span><?php
                                        $date = $tableaux['DateTab']; // d F Y : 07-December-2017 12:15:23
                                        $_date = date("F d,Y", strtotime($date));
                                        echo ($_date) ?></p>
                                    </li>
                                	<li>
                                    	<p><span>Colors :</span><?php echo ($tableaux['CouleurTab']) ?></p>
                                    </li>
                                    <li>
                                    	<p><span>Shape :</span><?php echo ($tableaux['Shape']) ?></p>
                                    </li>                                                                                                                                              
                                </ul>
                            </div>                       	
                        </div>
                    </div><!-- *cart-wrapper Ends here** -->
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

    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.perfectmasonry.min.js"></script>

	<script type="text/javascript" src="js/jquery.dropdown.js"></script>      
    
	<script src="js/jsplugins.js" type="text/javascript"></script>

	<script src="js/custom.js"></script>
        
</body>
</html>
