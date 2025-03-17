<?php
session_start();
include("./connexion.php");
$req=$bd->query("SELECT * FROM `admin`");
if(isset($_POST['login'])){

    if((($_POST['username']=="admin") or ($_POST['username']=="admin@gmail.com")) and ($_POST['password']=="admin") ){
        $_SESSION['user']=$_POST['username'];
        $_SESSION['passw']=$_POST['password'];
        header("location:admin/administer.php");
        if (isset($_POST['rememberme'])) {
            setcookie("login",$_POST['username'],time()+(30*24*3600));
                }
    }
    else{
        echo " <b style='color:red; margin-left:530px;'>username or password incorrecte !</b>";
    }
}

?>
<!Doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
	<title>Art Space - Admin</title>
	
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
	
	<!-- Modernizr -->
	<script src="js/modernizr.js"></script> 
</head>

<body>
    <div class="loader-wrapper" style="z-index:10000;">
        <div id="large-header" class="large-header">
            <h1 class="loader-title"><span>Art</span> Space</h1>
        </div>        
    </div>
<!-- **Wrapper** -->
 
	<div class="inner-wrapper">
      <div id="header-wrapper"> <!-- **header-wrapper Starts** -->
          <header id="header" class="header1">
              <div class="container">
                      
                  <!-- **Logo - End** -->
                  <div class="logo">
                      <a href="index.php" title="Art Space"> <img src="images/logo.svg" width="70%" alt="logo"/> </a>
                  </div><!-- **Logo - End** -->
                  <div class="basket-top">
                  <nav id="main-menu">                  
					  <ul class="menu type4"><!-- Menu Starts -->
					  	<li class="menu-item-simple-parent"><a href="index.php">Home</a></li>
					  	<li class="menu-item-simple-parent">
					  		<a href="about.php">About us</a>
					  	</li>
					  	<li class="menu-item-simple-parent"><a href="gallery.php">Gallery</a>
                        	<a class="dt-menu-expand">+</a>                    
                    	</li>
                        <li class="menu-item-simple-parent"><a href="blog.php">Blog</a></li>
                        <li class="menu-item-simple-parent">
                            <a href="contact.php">contact</a>
                        </li>
					  </ul> <!-- Menu Ends -->
                  </nav>
              </div>
          </header>	
      </div>  <!-- **header-wrapper Ends** -->
      <!-- **login - Starts** -->
      <?php
	if (isset($_COOKIE['login'])){?>
	<h1 style="margin-left:570px; margin-top:50px;"><?php echo "Hello " .$_COOKIE['login'];?></h1>
<form method="post" action=""> 
    <div class="login" style="display:style; width: 300px; margin:auto; margin-top:50px;">
	<label>Enter your password </label><input type="password" name="password"><br><br>
    <input type="submit" class="button" name="login1" value="Login" />
</div>
</form>	
<?php 
}
else{
	?>
      <form method="post" action="">
    <div class="login" style="display:style; width: 300px; margin:auto; margin-top:70px;">
    <h3> Hello Admin</h3>
        <p class="form-row form-row-first">
            <label for="username">Username or email <span class="required">*</span></label>
            <input type="text" class="input-text" name="username" id="username" />
        </p>
        <p class="form-row form-row-last">
            <label for="password">Password <span class="required">*</span></label>
            <input class="input-text" type="password" name="password" id="password" />
        </p>
    <div class="clear"></div>
                                                                                
        <p class="form-row">
            <input type="hidden" id="_wpnonce" name="_wpnonce" value="267b4213a5" /><input type="hidden" name="_wp_http_referer" value="" />		
            <input type="hidden" name="redirect" value="" />
            <label for="rememberme" class="inline">
            <input type="submit" class="button" name="login" value="Login" />
        </p>                          
    <div class="clear"></div>
                                                                                    
    </div> <!-- **login - Ends** -->
    </form>
    <?php
}

?>
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
        
</body>
</html>