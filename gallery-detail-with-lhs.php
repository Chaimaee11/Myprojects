<?php session_start(); ?>
<!Doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Art Space - Gallery Details</title>
    
    <meta name="description" content="">
    <meta name="author" content="">
<?php
    include("./connexion.php");
    $req=$bd->query("SELECT * FROM `tableaux` inner JOIN categorie on categorie.IdCategorie=tableaux.IdCategorie ");
$nature=$bd->query("SELECT COUNT(tableaux.IdTableau), categorie.NomCategorie FROM tableaux INNER JOIN categorie on categorie.IdCategorie=tableaux.IdCategorie where NomCategorie='Nature' GROUP by categorie.NomCategorie");

$natr=$nature->fetch();
$people=$bd->query("SELECT COUNT(tableaux.IdTableau), categorie.NomCategorie FROM tableaux INNER JOIN categorie on categorie.IdCategorie=tableaux.IdCategorie where NomCategorie='People' GROUP by categorie.NomCategorie");

$people=$people->fetch();
$cpt=$bd->query("SELECT COUNT(tableaux.IdTableau), categorie.NomCategorie FROM tableaux INNER JOIN categorie on categorie.IdCategorie=tableaux.IdCategorie");

$cp=$cpt->fetch();
    $max=$bd->query("SELECT MAX(IdTableau ) FROM `tableaux` ");
        $max=$max->fetch();
    if(!isset($_GET['id']) || $_GET['id']<1 || $_GET['id']>$max[0]){
        $_GET['id']=$_SESSION['idlast'];
    }
        $req=$bd->query("SELECT * FROM `tableaux` inner JOIN categorie on categorie.IdCategorie=tableaux.IdCategorie INNER JOIN artistes on artistes.IdArtiste =tableaux.IdArtiste where IdTableau='".$_GET['id']."' ");
        $row=$req->fetch();
        $related=$bd->query("SELECT * FROM `tableaux` inner JOIN categorie on categorie.IdCategorie=tableaux.IdCategorie where NomCategorie='".$row['NomCategorie']."' limit 4 ");

     
        if(!isset($_SESSION['idlast'])){
            $last=$row['IdTableau'];

        }
        else{
            $last= $_SESSION['idlast'];
        }
        $gallerylast=$bd->query("SELECT * FROM `tableaux` inner JOIN categorie on categorie.IdCategorie=tableaux.IdCategorie INNER JOIN artistes on artistes.IdArtiste =tableaux.IdArtiste where IdTableau='".$last."' ");
        $rowlast=$gallerylast->fetch();
?>
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
                        <li class="current_page_item menu-item-simple-parent"><a href="gallery.php">Gallery</a>
                            <ul class="sub-menu">
                                <li class="current_page_item"><a href="gallery-detail-with-lhs.php">Gallery-detail</a></li>
                            </ul>
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
        
        <div id="main">
            <div class="container">
                <div class="dt-sc-hr-invisible-small"></div>
                <div class="main-title animate" data-animation="pullDown" data-delay="100">
                    <h3> Gallery Detail </h3>
                    <p>“I dream my painting, and then I paint my dream.” – Vincent Van Gogh.</p>
                </div>
                <section id="secondary" class="secondary-sidebar secondary-has-left-sidebar"><!-- **Secondary Starts Here** -->
                    <aside class="widget widget_search">
                        <div class="widgettitle sub-title">
                            <h3>Have you Lost ?</h3>
                        </div>
                        <form method="post" novalidate="novalidate" id="searchform" action="#"> 
                            <p class="input-text">
                               <input class="input-field" type="email" name="mc_email" value="" id="search" required/>
                               <label class="input-label">
                                        <i class="fa fa-search icon"></i>
                                        <span class="input-label-content">Hunt</span>
                                    </label>
                               <input type="button" name="submit" class="submit" value="Submit" onclick="checkInput()" />
                            </p>
                        </form>
                        
                        <div id="ajax_subscribe_msg"></div>                        
                    </aside>
                    <aside class="widget widget_categories">
                       <div class="widgettitle sub-title">
                            <h3> Categories </h3>
                        </div>
                        <ul>
                            <li class="cat-item"><a title="" href="gallery.php">All<span><?php echo $cp[0] ?></span></a></li>
                            <li class="cat-item"><a title="" href="gallery.php">Nature<span> <?php echo $natr[0] ?></span></a></li>
                            <li class="cat-item"><a title="" href="gallery.php">People<span><?php echo $people[0] ?></span></a></li>
                            <li class="cat-item"><a title="" href="gallery.php">Street<span>0</span></a></li>
                            <li class="cat-item"><a title="" href="gallery.php">Still life<span>0</span></a></li>
                        </ul>
                    </aside>
                    <aside class="widget widget_popular_entries">
                        <div class="widgettitle sub-title">
                            <h3> Latest Gallery</h3>
                        </div>
                        <div class="recent-gallery-widget">
                            <ul>
                                <li>
                                    <a class="entry-thumb" href="#"><img alt="Enjoy Life with Family" src="./admin/picTable/<?php echo $rowlast['PhotoTab'] ?>"></a>
                                    <h5><a href="./gallery-detail-with-lhs.php?id=<?php echo $rowlast['IdTableau'] ?>"><?php echo $rowlast['NomTab'] ?> </a></h5>
                                    <p><?php echo $rowlast['DescriptionTab'] ?></p>
                                </li>
                            </ul>
                        </div>
                    </aside>
                    <aside class="widget widget_tag_cloud">
                        <div class="widgettitle sub-title">
                            <h3> Tags </h3>
                        </div>
                        <div class="tagcloud type3">
                            <a title="1 topic" href="#">Sketch</a>
                            <a title="1 topic" href="#">Oil color</a>
                            <a title="1 topic" href="#">Acrylic</a>
                            <a title="1 topic" href="#">Sculpture</a>
                            <a title="1 topic" href="#">Crayons</a>
                            <a title="1 topic" href="#">Art</a>                                                        
                        </div>
                    </aside>                                                                            
                </section><!-- **Secondary Ends Here** -->            
                <section id="primary" class="with-sidebar with-left-sidebar">
                    <article>
                        <div class="dt-sc-one-column column first">
                            <div class="recent-gallery-container">
                                <ul class="recent-gallery">
                                    <li> <img src="./admin/picTable/<?php echo $row['PhotoTab'] ?>"/> </li>
                                    <!-- <li> <img src="images/acrilique3 (2).png" alt="image"/> </li> -->
                                    
                                  
                                </ul>
                                <!-- <div id="bx-pager">
                                    <a href="#" data-slide-index='0'><img src='images/acrilique3 (1).jpg' alt='image' /></a>
                                    <a href="#" data-slide-index='1'><img src='images/acrilique3 (2).png' alt='image' /></a>
                                   
                                    
                                </div>                               -->
                            </div>
                        </div>
                        <div class="dt-sc-hr-invisible-small"> </div>
                        <div class="dt-sc-two-third column first animate" data-animation="fadeInLeft" data-delay="100">
                            <h3><?php echo $row['NomTab'] ?></h3>
                            <p><?php echo $row['DescriptionTab'] ?> </p>                                                        
                        </div>
                        <div class="dt-sc-one-third column animate" data-animation="fadeInRight" data-delay="100">
                            <div class="dt-sc-project-details">
                                <h5>Other Details</h5>                            
                                <div class="enquiry-details">
                                    <p> <i class="fa fa-cab"></i><?php echo $row['AdresseArtiste'] ?> </p>
                                    <p><i class="fa fa-mortar-board"></i> <?php echo $row['NomArtiste']." ".$row['PrenomArtiste'] ?></p>
                                    <p><i class="fa fa-wrench"></i> <?php echo $row['TypeCategorie'] ?></p>
                                    <p> <i class="fa fa-tags"></i> <?php echo $row['SizeTab'] ?></p>                                                                                                            
                                    <p> <i class="fa fa-globe"></i> <a href="index.php"> ArtSpace.com </a> </p>
                                </div>
                                <h5>Social Sharing</h5>                                 
                                <ul class="type3 dt-sc-social-icons">
                                     <li class="twitter"><a href="https://twitter.com/Ihsane_abaali"><i class="fa fa-twitter"></i></a></li>
                                     <li class="facebook"><a href="https://fr-fr.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                     <li class="google"><a href="https://myaccount.google.com/u/1/?tab=kk"><i class="fa fa-google"></i></a></li>
                                     <li class="dribbble"><a href="https://dribbble.com/signup/new"> <i class="fa fa-dribbble"></i> </a></li>
                                </ul>                                
                            </div>
                        </div>
                        <div class="dt-sc-post-pagination">
                            <a class="dt-sc-button small type3 with-icon prev-post" href="./gallery-detail-with-lhs.php?id=<?php echo $row[0]-1 ?>"> <span> Previous Post </span> <i class="fa fa-hand-o-left"> </i> </a> 
                            <a class="dt-sc-button small type3 with-icon next-post" href="./gallery-detail-with-lhs.php?id=<?php echo $row[0]+1 ?>"><i class="fa fa-hand-o-right"> </i>  <span> Next Post </span> </a>
                        </div>                        
                    </article>
                </section>
                <div class="dt-sc-hr-invisible-small"></div>
            </div><!-- **Container Ends Here** -->
            <div class="container">
                <div class="main-title animate" data-animation="pullDown" data-delay="100">
                    <h3> Related Art </h3>
                </div>
            </div>
            <div class="portfolio-fullwidth"><!-- **portfolio-fullwidth Starts Here** -->
                <div class="portfolio-grid">
                    <div class="dt-sc-portfolio-container isotope"> <!-- **dt-sc-portfolio-container Starts Here** -->
                    <?php while($rowrelated=$related->fetch()){ 
                        
                         if($rowrelated['NomCategorie']=="Nature"){
                                            
                                            $cl="portfolio nature  dt-sc-one-fourth";
                                                } 
                                                elseif($rowrelated['NomCategorie']=="People"){
                                                   $cl="portfolio people  dt-sc-one-fourth";
                                                }
                                                elseif($rowrelated['NomCategorie']=="Street"){
                                                   $cl="portfolio street landscapes  dt-sc-one-fourth";
                                                }
                        ?>
                        <div class="<?php echo $cl ?>">
                            <figure>
                                <img src="./admin/picTable/<?php echo $rowrelated['PhotoTab'] ?>" alt="" title="">
                                <figcaption>
                                    <div class="portfolio-detail">
                                        <div class="views">
                                            <a class="fa fa-camera-retro" data-gal="prettyPhoto[gallery]" href="./admin/picTable/<?php echo $rowrelated['PhotoTab'] ?>"></a><span><?php echo $row['Stock'] ?></span>
                                        </div>
                                        <div class="portfolio-title">
                                            <h5><a href="gallery-detail-with-lhs.php?id=<?php echo $rowrelated[0] ?>"><?php echo  $rowrelated['NomTab'] ?></a></h5>
                                            <p><?php echo $rowrelated['TypeCategorie'] ?></p>
                                        </div>
                                    </div>
                                </figcaption>                                        
                           </figure>
                        </div>
                        <?php } ?>
                       
                    </div><!-- **dt-sc-portfolio-container Ends Here** -->
                </div>
            </div><!-- **portfolio-fullwidth Ends Here** -->
            
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
           
    <script>
         function checkInput() {
         var query = document.getElementById('search').value;
        window.find(query);
        return true;
                        }                 
    </script>
    <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>

    
    <script src="js/jquery.tabs.min.js"></script>
    <script type="text/javascript" src="js/jquery-migrate.min.js"></script>
    
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.perfectmasonry.min.js"></script>    
    
    <script src="js/jquery.prettyPhoto.js" type="text/javascript"></script>    
    
    <script src="js/jquery.validate.min.js" type="text/javascript"></script>
    
    <script src="js/jquery.bxslider.min.js" type="text/javascript"></script>        
    
    <script src="js/jsplugins.js" type="text/javascript"></script>    

    <script src="js/custom.js"></script>
    
        <?php
            $_SESSION['idlast']=$row['IdTableau'];
        ?>
</body>
</html>
