<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
 <!-- **Breadcrumb Section** -->
            <div class="breadcrumb-section">
                  <div class="container">
	                  <h3>Old Students</h3>
                      <div class="breadcrumb">
                      	<a href="index.php" title="">Home</a> / <span>Old Students</span>
                      </div>
                  </div>
            </div> <!-- **Breadcrumb Section Ends** -->
            
            <!-- **Content Main** -->
            <section class="content-main"> 
            
            	<!-- **Container** -->                
                <div class="container">
                  <div class="content-full-width" id="primary">
<div class="col-xs-12 col-sm-4 col-md-3">        
<?php
$cat_array=get_oldstudent_year();
display_oldstudent_year($cat_array);

if(isset($_SESSION['admin_user'])){
	
	admin_do_url("ajibay.php","GO TO ADMIN");
	
}
?>
</div>

	<div class="col-xs-12 col-sm-8 col-md-8">
<h4 class="hdcl">Old Student Of Ajibay Academy</h4>
<p>Are you an oldstudent of our great institution ajibay academy,
	click on your year of graduation to  see the profiles of your formal class mate</p> 
</div>
</div>
</div>
</section>

     <?php foot();?>