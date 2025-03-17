<?php

include_once('php/inc/config.php');

?>

<!Doctype html>
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Art Space - Shop</title>
    
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
    <link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
    <link href="pagination/css/A_green.css" rel="stylesheet" type="text/css" />
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
            <section id="primary" class="content-full-width"><!-- **Primary Starts Here** -->
                <div class="dt-sc-hr-invisible-small"></div>
                <div class="container">
                    <div class="main-title animate" data-animation="pullDown" data-delay="100">
                        <h3> Shop </h3>
                        <p>For some, shopping is an art. For others, it's a sport.</p>
                    </div>                      
                </div>
                <div class="fullwidth-section shop-grid"><!-- Full-width section Starts Here -->
                    <div class="sorting-products"><!-- sorting-products Starts Here -->
                        <div class="dt-sc-one-fifth column first">
                            <div class="categories">
                                <h5>Categories</h5>
                                <div class="selection-box">
                                    <select class="shop-dropdown">
                                        <option value="-1" selected>Choose your category</option>
                                        <option value="1" class="fa fa-tree">Nature</option>
                                        <option value="1" class="fa fa-child">People</option>                                                                                
                                        <option value="3" class="fa fa-road">Street</option>
                                        <option value="4" class="fa fa-globe">Still life</option>
                                    </select>                                    
                                </div>
                            </div>
                        </div>
                        <div class="dt-sc-one-fifth column">
                            <div class="categories">
                                <h5>Sort By</h5>
                                <div class="selection-box">
                                    <select class="shop-dropdown">
                                        <option value="-1" selected>Sort by</option>
                                        <option value="1" class="fa fa-mortar-board">Popular Artist</option>
                                        <option value="2" class="fa fa-money">Best Seller</option>                                        
                                        <option value="3" class="fa fa-thumb-tack">Featured Art</option>
                                        <option value="4" class="fa fa-child">New Artist</option>
                                    </select>                                    
                                </div>
                            </div>
                        </div>
                        <div class="dt-sc-one-fifth column">
                            <div class="categories">
                                <h5>Art Type</h5>
                                <div class="selection-box">
                                    <select class="shop-dropdown">
                                        <option value="-1" selected>Choose your type</option>
                                        <option value="1" class="fa fa-flask">Acrylic</option>
                                        <option value="2" class="fa fa-paint-brush">Oil Painting</option>                                        
                                        <option value="2" class="fa fa-scissors">Sculpture</option>
                                        <option value="3" class="fa fa-tint">Water Painting</option>
                                    </select>                                    
                                </div>
                            </div>
                        </div>
                        <div class="dt-sc-one-fifth column">
                            <div class="categories">
                                <h5>Size &amp; Shape</h5>
                                <div class="selection-box">
                                    <select class="shop-dropdown">
                                        <option value="-1" selected>Choose your shape</option>
                                        <option value="1" class="fa fa-picture-o">Landscape</option>
                                        <option value="2" class="fa fa-barcode">Portrait</option>
                                    </select>                                    
                                </div>
                            </div>
                        </div>
                        <div class="dt-sc-one-fifth column">
                            <div class="categories">
                                <h5>Color</h5>
                                <div class="selection-box">
                                    <select class="shop-dropdown">
                                        <option value="-1" selected>Choose your color</option>
                                        <option value="1" class="fa fa-bookmark red">Red</option>
                                        <option value="2" class="fa fa-bookmark yellow">Yellow</option>
                                        <option value="3" class="fa fa-bookmark blue">Blue</option>
                                        <option value="4" class="fa fa-bookmark green">Green</option>
                                        <option value="5" class="fa fa-bookmark black">Black</option>
                                        <option value="6" class="fa fa-bookmark white">White</option>
                                    </select>
                                </div>
                            </div>
                        </div>                                               
                    </div><!-- sorting-products Ends Here -->
                    
                    <ul class="products isotope">
                    <?php 
                        include("php/function.php");
                            $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
                            $limit = 10; //if you want to dispaly 10 records per page then you have to change here
                            $startpoint = ($page * $limit) - $limit;
                            $statement = "tableaux"; //you have to pass your query over here

                            $req_global = "SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}";
                            $sql_req = mysqli_query($link, $req_global);
                            while ($tableaux = mysqli_fetch_array($sql_req)) {
                            $vente_link = "shop-detail.php?id_tab=" . $tableaux['IdTableau'];
                    ?>
                        <li class="product-wrapper dt-sc-one-fifth"> <!-- **product-wrapper - Starts** -->
                            <!-- **product-container - Starts** -->   
                            <div class="product-container">
                                <a title="<?php echo ($tableaux['NomTab']) ?>" href="<?php echo $vente_link ?>" >
                                    <div class="product-thumb"> 
                                    <img data-u="image" src="<?php echo uplode ?>/<?php echo $tableaux["PhotoTab"]; ?>" />
                                    </div> 
                                </a>

                                <!-- **product-title - Starts** -->
                                <div class="product-title"> 
                                    <form id="create_user_form" action='php/add_to_cart.php' method="POST">
                                        <input type='hidden' name='id_client' value='<?php echo $_SESSION["IdClient"]?>' />
                                        <input type='hidden' name='id_tab' value='<?php echo $tableaux['IdTableau']?>' />
                                        <a href="" class="type1 dt-sc-button"> 
                                            <span class="fa fa-shopping-cart"></span>
                                            <input type="submit" id="submit" style="cursor:pointer" value="Add to Cart" name="submit" /> 
                                        </a>
                                        <a href="<?php echo $vente_link ?>" class="type1 dt-sc-button"> <span class="fa fa-unlink"></span> Options </a>
                                    </form>

                                    <script type="text/javascript">
                                        const form = document.getElementById('create_user_form');

                                        function onSubmit(event) 
                                        {
                                            console.log(event.target[0].value);
                                            console.log(form.submit); 
                                            HTMLFormElement.prototype.submit.call(form);
                                        }
                                            form.addEventListener('submit', onSubmit);
                                    </script>

                                    <p><?php echo ($tableaux['CouleurTab']) ?></p>
                                </div> <!-- **product-title - Ends** -->
                            </div> <!-- **product-container - Ends** --> 

                                <!-- **product-details - Starts** --> 
                                <div class="product-details"> 
                                    <h5> <a href="<?php echo $vente_link ?>"> <?php echo ($tableaux['NomTab']) ?> </a> </h5>
                                    <span class="amount">  $<?php echo ($tableaux['PrixTab']) ?> </span> 
                                </div> <!-- **product-details - Ends** --> 
                        </li>

                    <?php } ?>

                    </ul>
                
                    <div class="container">
                       <div class="container">
                
                    <div class="dt-sc-post-pagination">
                        <?php
                            echo "<div id='pagingg' >";
                            echo pagination($statement,$limit,$page);
                            echo "</div>";
                        ?>
                    </div>
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
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.perfectmasonry.min.js"></script>
    <script type="text/javascript" src="js/jquery.dropdown.js"></script>      
    <script src="js/jsplugins.js" type="text/javascript"></script>
    <script src="js/custom.js"></script>
        
</body>
</html>
