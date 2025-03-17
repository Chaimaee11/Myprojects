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
    
	<title>ArStpace - Blog</title>
	
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
                        <li class="current_page_item menu-item-simple-parent"><a href="blog.php">Blog</a></li>
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
                <div class="fullwidth-section"><!-- Full-width section Starts Here -->
                	<div class="container">
                        <div class="main-title animate" data-animation="pullDown" data-delay="100">
                            <h3> Art Blog </h3>
                            <p>To interact with artists and post news for art and interests. join us in our blog.</p>
                        </div>
                        <!-- Blog Post Starts Here -->
                        <div class="blog-items apply-isotope clear">
                            <div class="dt-sc-one-fourth column">
                                <article class="blog-entry">
                                    <div class="entry-thumb">
                                        <a href="#"><img src="images/b1.jpg" alt="" title=""></a>
                                    </div>
                                    <div class="entry-details">
                                        <div class="entry-title">
                                            <h4> <a href="blog.php">Abstract art</a> </h4>
                                        </div>
                                        
                                        <div class="entry-body">
                                            <p>In the rich history of art, abstraction was dominant throughout the twentieth century. Abstract art was born at the beginning of the 20th century, in a panorama marked by the majority presence of Fauvism, Cubism and Expressionism. Its plural and very vast variations are still relevant as its symbolic and aesthetic foundations open up different horizons of creation, allowing in a way a regeneration of this exciting approach to a fully figurative object. </p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="dt-sc-one-fourth column">
                                <article class="blog-entry">
                                    <div class="entry-thumb">
                                        <a href="#"><img src="images/b2.jpg" alt="" title=""></a>
                                    </div>
                                    <div class="entry-details">
                                        <div class="entry-title">
                                            <h4> <a href="blog.php">The Starry Night</a> </h4>
                                        </div>
                                       
                                        <div class="entry-body">
                                            <p>The Starry Night (in Dutch De sterrennacht) is a painting by the Dutch post-Impressionist painter Vincent van Gogh. The painting represents what Van Gogh could see and extrapolate from the room he occupied in the asylum of the Saint-Paul-de-Mausole monastery in Saint-Rémy-de-Provence in May 1889. Often presented as his great work, the painting has been reproduced many times. It has now been kept in the Museum of Modern Art (MOMA) in New York since 19411.

The painting notably inspired the composer Henri Dutilleux who subtitled Starry Night his symphony Timbres, space, movement2.</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="dt-sc-one-fourth column">
                                <article class="blog-entry">
                                    <div class="entry-details">
                                        <div class="entry-title">
                                            <h4> <a href="blog.php">The art of Edward Hopper</a> </h4>
                                        </div>
                                       
                                        <div class="entry-body">
                                            <p>A major artist of 20th century American realism, Edward Hopper draws inspiration in his paintings from the society around him, reinterpreting the universe and the lives of his compatriots in compositions that are both mysterious and subjugating, giving a large place to the viewer's imagination. He leaves behind him a pictorial heritage, Transforming the ordinary into the extraordinary, Hopper remains attentive to the representation of urban scenes which constitute his most obvious signature, even if he will also paint paintings closer to the natural environment.
Hopper paints on the spot, and the false appearance of calm and silence of his compositions ultimately reveals many torments, those of the torpor of an era imbued with a kind of pessimism barely inscribed in the watermark. </p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="dt-sc-one-fourth column">
                                <article class="blog-entry">
                                    <div class="entry-thumb">
                                        <audio controls="">
                                            <source type="audio/mpeg" src="video/small.mp3"/>
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                    <div class="entry-details">
                                        <div class="entry-title">
                                            <h4> <a href="blog.php">Can Music Inspire Your Paintings?</a> </h4>
                                        </div>
                                        
                                        <div class="entry-body">
                                            <p>Music impacts our mood, lifts us up, touches our hearts, makes our feet tap to the beat of the percussion.
Music is simply a compilation of notes interpreted by a musician. The musician plays the music, which in turn stimulates the tiny hairs in our ears, and our brain hears the auditory message. Once the brain hears the music, we evaluate the sound and respond with pleasure, sadness, or irritation, for example.
Artists — whether writing, painting, sculpting, acting, or playing music — use similar terms within their disciplines. Harmony, unity, rhythm, movement, balance, and emphasis are examples of terms and considerations within the arts. It is no wonder that we react and feel a connection to one another.
Understanding that music can produce such strong emotional responses can help artists with their creative process. Music can be very useful, guiding artistic intentions through brush marks and color choices.</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="dt-sc-one-fourth column">
                                <article class="blog-entry">
                                    <div class="entry-thumb">
                                        <a href="#"><img src="images/b3.jpeg" alt="" title=""></a>
                                    </div>
                                    <div class="entry-details">
                                        <div class="entry-title">
                                            <h4> <a href="blog.php">Sculpture</a> </h4>
                                        </div>
                                        
                                        <div class="entry-body">
                                            <p>Sculpture is an artistic activity that consists of designing and creating shapes in volume, in relief, either in the round (statuary), in high relief, in low relief, by modeling, by direct carving, by welding or assembly. . The term sculpture also refers to the object resulting from this activity.

The word sculpture comes etymologically from the Latin "sculpere" which means "to carve" or "to remove pieces from a stone". This definition, which distinguishes “sculpture” and “modeling”, illustrates the importance given to the size of stone in Roman civilization. In the 10th century, we speak of "ymagier" and most of the time, the work of the sculptor is a teamwork with a master and stonemasons, as it is treated in Romanesque art and Romanesque architecture. . Several teams are working simultaneously on major cathedral construction sites.</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="dt-sc-one-fourth column">
                                <article class="blog-entry">
                                <div class="entry-thumb">
                                        <a href="#"><img src="images/b4.jpg" alt="" title=""></a>
                                    </div>
                                    <div class="entry-details">
                                        <div class="entry-title">
                                            <h4> <a href="blog.php">L'Art comme expérience <br>John Dewey</a> </h4>
                                        </div>
                                      
                                        <div class="entry-body">
                                            <p>A pragmatist philosopher, the American John Dewey approaches ethical, political and aesthetic questions in a spirit of experimentation.

It is not a question of defining art but of questioning the role of aesthetic experience and works of art in society. In short, to understand how the aesthetic experience participates in daily life.<br>We do experiments every day. Trivial, ordinary or surprising experiences. They are what define our relationship to the world, are the fruit of our interactions with the environment. But can one say of an experience that it is only useful, aesthetic, intellectual? Can we categorize experiences?

A man engaged in poking wood in the hearth may consider that his action is aimed at fanning the fire; but the fact remains that he is fascinated by this colorful drama of change that is playing out before his eyes and that he takes part in it in his imagination. He does not remain indifferent to this spectacle 1.

According to a holistic approach, John Dewey envisages a continuity of the human experience. Lived experience builds on our past experiences and informs our future experiences. It is not isolated but takes part in a combination of movements which draw the rhythm of existence.</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="dt-sc-one-fourth column">
                                <article class="blog-entry">
                                    <div class="entry-thumb">
                                        <video controls>
                        
                                            <source src="video/impasto.mp4" type='video/mp4;codecs="avc1.42E01E, mp4a.40.2"' />
                                            Your browser does not support the video element.
                                        </video>
                                    </div>
                                    <div class="entry-details">
                                        <div class="entry-title">
                                            <h4> <a href="blog.php">Impasto painting technique</a> </h4>
                                        </div>
                                        
                                        <div class="entry-body">
                                            <p>In fine art, the Italian word 'Impasto' refers to the technique in which undiluted paint is applied thickly to the canvas either with a knife or with a brush. Using this impasto technique, the artist often blends the paint on the canvas to achieve the desired color.
 Oil paint is more suited to the impasto method, due to its viscosity and drying time, although acrylic paint or even gouache can be applied with this technique.
 The textured surface of the paint causes different reflections of light which the artist controls to give particular effects. Expressionist painters (notably Van Gogh) used Impasto to convey their feelings and emotions. Impastos can give a three-dimensional impression. Finally, the rough texture can draw attention to certain points or aspects of a composition.</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="dt-sc-one-fourth column">
                                <article class="blog-entry">
                                    <div class="entry-thumb">
                                        <video controls>
                                            <source type="video/mp4" src="video/encaustic.mp4"/>
                                            Your browser does not support the audio element.
                                        </video>
                                    </div>
                                    <div class="entry-details">
                                        <div class="entry-title">
                                            <h4> <a href="blog.php">Encaustic painting technique</a> </h4>
                                        </div>
                                        
                                        <div class="entry-body">
                                            <p>Encaustic painting, painting technique in which pigments are mixed with hot liquid wax. Artists can change the paint’s consistency by adding resin or oil (the latter for use on canvas) to the wax. After the paint has been applied to the support, which is usually made of wood, plaster, or canvas, a heating element is passed over the surface until the individual brush or spatula marks fuse into a uniform film. This “burning in” of the colours is an essential element of the true encaustic technique.
Encaustic wax has many of the properties of oil paint: it can give a very brilliant and attractive effect and offers great scope for elegant and expressive brushwork. </p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <!-- Blog Post Ends Here -->
                        <div class="post-nav-container blog"> <!-- **Post-Nav-container Starts Here** -->
                            <div class="post-prev-link hidden">
                            	<a data-page="1"  class="dt-sc-button small type3 with-icon" href="#"> <span> Previous Post </span> <i class="fa fa-hand-o-left"> </i> </a>
                            </div>
                                          
                        </div><!-- **Post-Nav-container Ends Here** -->                    
					</div>
                </div><!-- Full-width section Ends Here -->           	
            </section>
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

    <script src="js/jquery.inview.js" type="text/javascript"></script>
    <script src="js/jquery.viewport.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.perfectmasonry.min.js"></script>
    
	<script src="js/jquery.scrollTo.js" type="text/javascript"></script>    
    
	<script src="js/jsplugins.js" type="text/javascript"></script>    
    
    <script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
	
	<script src="js/custom.js"></script>
        
</body>
</html>
