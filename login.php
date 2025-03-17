<?php

include 'php/inc/config.php'; 
// Initialize the session

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $username_err = '<span class="error_message">Please enter your email.</span>';
    } else{
        $username = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = '<span class="error_message">Please enter your password.</span>';
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT IdClient, PrenomClient, EmailClient, MdpClient FROM client WHERE EmailClient = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $IdClient, $PrenomClient, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                  		if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["IdClient"] = $IdClient;
                            $_SESSION["PrenomClient"] = $PrenomClient;
                       		$_SESSION["EmailClient"] = $username;
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                           $password_err = '<span class="error_message">Password you entered is not valid.</span>';
                            
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = '<span class="error_message">No account found with that email.</span>';
                }
            } else{
                echo "Ops ! Something went wrong. Please try again later.";
            }
	   }
        
        // Close statement
       
    }

    // Close connection
    mysqli_close($link);
}
?>
<!Doctype html>
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
	<title>Art Space - Login</title>
	
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

      <style>
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 450px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
    background-color: #A81C51;
    border: 0px;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #007bff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}
.field-icon {
  float: right;
  cursor: pointer;
  margin-right: 20px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
@media screen and (max-width: 600px) {
  .signup-form {
    width: 100%;
    margin-top: 0;
  }
}
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
   <body >
      <!-- Navigation-->
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
</script> <!-- **header-wrapper Ends** -->

        <div id="main">

        <!-- Content Body Start -->
        <div class="content-body">
            <div class="container">
                <div class="signup-form">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <h2>Connexion</h2>
                        <br><br> 
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <input type="email" class="form-control" name="email" placeholder="Email " required 
                                                    value="<?php echo $username; ?>">
                            <?php echo $username_err; ?>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

                        <input id="pass_log_id" type="password" class="form-control" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Entre the Password here')"
                                                        oninput="this.setCustomValidity('')" >
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        <?php echo $password_err; ?>
                        </div>
                        <div class="form-group">
                        </div><br>      
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg btn-block">Connexion</button>
                        </div>
                    </form>
                    <div class="text-center">If you do not have an account. Create an account from here <a href="register.php"> Register</a></div>
                </div>
            </div>
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
	</div>
</div><!-- **Wrapper Ends** -->
<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>

<script type="text/javascript" src="js/jquery.dropdown.js"></script>

<script src="js/jsplugins.js" type="text/javascript"></script>

<script src="js/custom.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).on('click', '.toggle-password', function() {

        $(this).toggleClass("fa-eye fa-eye-slash");

        var input = $("#pass_log_id");
        input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
        });
    </script> 
        
</body>
</html>
