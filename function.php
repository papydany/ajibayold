<?php  include_once('functions.php');
function top(){
?>
<!DOCTYPE HTML>
 <html lang="" class=""> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
<title>Ajibay Schools</title>

<!-- Favicon -->
	<link rel="shortcut icon" href="images/favicon.png" type="image/ico">

<!-- CSS Stylesheets -->
	<link id="default-css" rel="stylesheet" href="style.css" type="text/css">
    <link id="shortcodes-css" rel="stylesheet" href="css/shortcodes.css" type="text/css">
	<link id="responsive-css" rel="stylesheet" href="css/responsive.css" type="text/css">
	<link id="skin-css" rel="stylesheet" href="skins/electricblue/style.css" type="text/css">
    <link id="default-css" rel="stylesheet" href="css/mainstyle.css" type="text/css">
    <link id="shortcodes-css" rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<!-- Additional Stylesheets -->    
    <link rel="stylesheet" href="css/component.css" type="text/css">
    <link href="css/pace-theme-loading-bar.css" rel="stylesheet" media="all" />
    <link rel="stylesheet" href="css/isotope.css" type="text/css">
	<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css">
     


<!-- Font Awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

	<link rel="stylesheet" id="rs-plugin-settings-css"  href="css/settings.css" type="text/css" media="all" />    

    <script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script> 
    
<link rel="stylesheet" type="text/css" href="js/jquery-ui-1.11.2.custom/jquery-ui.min.css">

<script type="text/javascript" src="js/jquery-ui-1.11.2.custom/external/jquery/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.11.2.custom/jquery-ui.min.js"></script>
    <script type="text/javascript">
	var mytheme_urls = {
 		scroll : 'disable'
	};
	</script>     	

</head>

<body>
	<!-- **Wrapper** -->
 	<div class="wrapper">
    
       
    	<!-- **Header Top Bar** -->
	   	<div id="bbar-wrapper">

      
    <!-- header -->
    <div class="headstyle padding_RL">
      <div class="container ">
      <div class="col-xs-12 col-sm-2 alignleft">
        <img src="images/ajibaybag.png" class="img-responsive">
      </div>
      <div class="col-xs-12 col-sm-7 text-center">
        <img src="images/ajibaybanner.png" class="img-responsive">
       </div>
    
        	
            	
                
                <div class="column dt-sc-one-half alignright col-sm-2">
                	<div class="buttons">
                    <?php
                        if(isset($_SESSION['admin_user'])){
                              echo'<a href="ajibay.php" title="">Admin menu <i class="fa fa-caret-right"></i></a>';
                          }else{
                              echo'<a href="ajibay.php" title="">Login <i class="fa fa-caret-right"></i></a>';
                          }
                    ?>
                       
                        <a href="http://www.ajibayschools.com.ng/webmail" target="_blank" title="">Mail <i class="fa fa-caret-right"></i></a>
                    </div>
                </div>
        
	   	</div> 
        </div><!-- **Header Top Bar Ends** --> 
        
        <!-- **Header Wrapper** -->
        <div id="header-wrapper">        
        	<!-- **Header** -->
            <header id="header" class="header5">
                <div class="container">
                	
                    <!-- **Main-Menu Navigation** -->
                    <div id="primary-menu">
                        <div class="dt-menu-toggle" id="dt-menu-toggle">Menu<span class="dt-menu-toggle-icon"></span></div>                    
                        <nav id="main-menu">
                            <ul id="menu-main-menu" class="menu">
                                <li class=" menu-item-simple-parent menu-item-depth-0"> <a href="index.php" title=""> <span class="menu-icon fa fa-home"> </span> Home </a>                                    
                                                               
                                </li>          
                                
                                <li class="menu-item-simple-parent menu-item-depth-0"> <a href="about_us.php" title=""> <span class="menu-icon fa fa-book"> </span> About Us </a> 
                                                      
                                </li>
                                     
                                <li class="menu-item-megamenu-parent fullwidth megamenu-5-columns-group menu-item-depth-0"><a href="facility.php">Facility</a>
                                    
                                </li>                     
                                
                                <li class="menu-item-megamenu-parent megamenu-4-columns-group menu-item-depth-0"><a href="management.php">Management</a>
                                   
                                </li>                                                  
                                                                                                                   
                                <li class="menu-item-megamenu-parent megamenu-3-columns-group menu-item-depth-0 h"><a href="gallery.php">Gallery</a>
                                    
                                </li>
                                    <li class="menu-item-simple-parent menu-item-depth-0"> <a href="result" title="" target="_blank"> Result portal </a>
                                                             
                                </li>
                                     <li class="menu-item-simple-parent menu-item-depth-0"> <a href="registration.php" title="">  Registration</a>
                                                             
                                </li>
                                 <li class="menu-item-simple-parent menu-item-depth-0"> <a href="old_student.php" title="">  Old students </a>
                                                             
                                </li>                        
                                <li class="menu-item-simple-parent menu-item-depth-0"> <a href="contact_us.php" title=""> <span class="menu-icon fa fa-envelope"> </span> Contact </a>
                                                             
                                </li>
                                
                            </ul>
                        </nav>
                    </div> <!-- **Main-Menu Navigation Ends** -->                    
                </div>                
            </header> <!-- **Header Ends** -->
        </div> <!-- **Header Wrapper Ends** -->   

   <!-- **Main** -->        
		<div id="main">
<?php
}

function foot(){

	?>
</div> <!-- **Main Ends** --> 
 <!-- **Footer** -->
        <footer id="footer">
            <div class="container">
                <div class="column dt-sc-one-fourth first" style="font-size:14px;">
                    <aside class="widget textwidget">
                        <h4 class="widgettitle">  Ajibay Nur, Pry & Academy Schools<span></span></h4>
                        <p>Ayetoro Road,Ayobo,Lagos.<br/>P.O.BOX 2455,Ipaja lagos</p>
<hr/>
                            <h4 class="widgettitle"> Ajibay Garden School</h4>
                            <p>Ajibay Estate,Ajibay Avenue,<br/>Ayetoro.Itele,Ogun State.</p>
                    </aside>


                </div>
                
                <div class="column dt-sc-one-fourth">
                    <aside class="widget widget_links">
                        <h3 class="widgettitle">Links<span></span></h3>
                        <ul>
                            <li><a href="about_us.php" title="">About Us</a></li>
                            <li><a href="facility.php" title="">facilities</a></li>
                            <li><a href="registration.php" title="">Registration</a></li>
                            <li><a href="result" title="" target="_blank">Result</a></li>
                            <li><a href="old_student.php" title="">Old Student</a></li>
                            <li><a href="management.php" title="">Management</a></li>                            
                        </ul>
                    </aside>                
                </div>
                <div class="column dt-sc-one-fourth">
                    <aside class="widget widget_recent_entries">
                        <h3 class="widgettitle">Latest Posts<span></span></h3>
                        <ul>
                        <?php
                        $conn =db();

                        $query="SELECT * FROM news ORDER BY id DESC LIMIT 3";

                        $result= mysqli_query($conn,$query) or die(mysqli_error($conn));

                        
                     while($row = mysqli_fetch_assoc($result)) {
                         # code...
                   
                          echo'  <li>
                                <h5 class="entry-title"><a href="show_news.php?id='.$row['id'].'">'.strtolower($row['title']).' </a></h5>
                                <p class="show-meta">
                                    <span class="date-info"><i class="fa fa-clock-o"></i>'.$row['date'].'</span>
                                 
                                </p>
                            </li>';
                              }

                        ?>
                           
                        </ul>
                    </aside> 
                </div>
                
                <div class="column dt-sc-one-fourth">
                    <aside class="widget widget_newsletter">
                        <h3 class="widgettitle">Call Us<span></span></h3>
                        <p>08023785283</p>

                         <p>08033030117</p>
                 
                    </aside>
                    
                    <div class="widget textwidget">   
                        <ul class="dt-sc-social-icons">
                            <li class="facebook"><a class="fa fa-facebook" href="https://www.facebook.com/pages/Ajibay-Schools/276123149084040?ref=br_tf" target="_blank"></a></li>
                           <!-- <li class="google"><a class="fa fa-google-plus" href="#"> </a></li>
                            <li class="twitter"><a class="fa fa-twitter" href="#"></a></li>                           
                            <li class="linkedin"><a class="fa fa-linkedin" href="#"></a></li>
                            <li class="dribbble"><a class="fa fa-dribbble" href="#"></a></li>-->
                        </ul>                                   	
                   </div>     
                              
                </div>
            </div>
            
            <div class="copyright">        	
                <div class="container">
                    <p> Ajibay Schools.&nbsp;&nbsp;Copyright &copy; 2016, developed by <a href="https://www.facebook.com/Idosoft-551663951556044/" target="_blank">Idosoft</a>. &nbsp;&nbsp;All rights reserved. </p>        	
                </div>
            </div>              
        </footer> <!-- **Footer Ends** -->        
        
	</div> <!-- **Wrapper Ends --> 
    
	<!-- **jQuery** -->

	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
    
    <script type="text/javascript" src="js/pace.min.js"></script>    
    
    <script type="text/javascript" src="js/jquery.sticky.js"></script>    
    <script type="text/javascript" src="js/jquery.dlmenu.js"></script>
	<script type="text/javascript" src="js/inview.js"></script>
	<script type="text/javascript" src="js/jquery.tabs.min.js"></script>
    <script type="text/javascript" src="js/jquery.tipTip.minified.js"></script>
	<script type="text/javascript" src="js/jquery.donutchart.js"></script>
	<script type="text/javascript" src="js/jquery.ui.totop.min.js"></script>    
	<script type="text/javascript" src="js/twitter/jquery.tweet.min.js"></script>
    
	<script type="text/javascript" src="js/jquery-easing-1.3.js"></script>
	<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>

	<script type="text/javascript" src="js/jquery.carouFredSel-6.2.0-packed.js"></script>
	<script type="text/javascript" src="js/jquery.fitvids.js"></script>        
	<script type="text/javascript" src="js/jquery.bxslider.js"></script>
    
    <script type="text/javascript" src="js/jquery.animateNumber.min.js"></script>    
	<script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>    

    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    
	<script type="text/javascript" src="js/jquery.cookie.js"></script>
	          
    
	<script type="text/javascript" src="js/custom.js"></script>     
    
	<script type="text/javascript" src="js/revslider/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="js/revslider/jquery.themepunch.revolution.min.js"></script>      
      <script type='text/javascript' src='js/scripts/camera.js'></script>

</body>

       
</html>

<?php


}
?>