<?php include_once"function.php";

top(); ?>
<!-- **Breadcrumb Section** -->
            <div class="breadcrumb-section">
                  <div class="container">
	                  <h2>Contact Us</h2>
                      <div class="breadcrumb">
                      	<a href="index.php" title="">Home</a> / <span>contact Us</span>
                      </div>
                  </div>
            </div> <!-- **Breadcrumb Section Ends** -->
 <!-- **Content Main** -->
 <section class="content-main">     
     <!-- **Primary** -->
      
                   <div class="container">  
 <div class="content-full-width" id="primary"> 
                  
                        <div class="dt-sc-two-third column first">                                                        
                            <h2 class="hr-border-title"><span>Leave us a Message</span></h2>
                            <div id="ajax_contact_msg"></div>
                            <form method="post"  action="mail.php" >
                                <div class="dt-sc-one-half column first"><input type="text" name="name" placeholder="Your Name (required)" required> </div>
                                <div class="dt-sc-one-half column"><input type="email" name="email" placeholder="Your Email (required)" required></div>
                             
                                <div class="dt-sc-clear"></div>
                                <textarea name="message" placeholder="Your Message (required)" required></textarea>
                                <input type="submit" name="submit" value="Submit" class="dt-sc-button small">
                            </form>
                        </div>    
                                                    
                        <div class="dt-sc-one-third column">
                            <h2 class="hr-border-title"><span>Contact Info</span></h2>
                            <div class="contact-info">
                                <div class="textwidget"><h4 style="font-weight:bold;">Ajibay Nur, Pry & Academy School</h4>
                                <p>Ayetoro Road, Ayobo,Lagos.<br/>P.O.BOX 2455,Ipaja Lagos</p></div>
                                <div class="textwidget"><h4 style="font-weight:bold;">Ajbay Garden School</h4>
                                <p>Ajibay Estate, Ajibay Avenue Ayetoro.<br/>Itele,Ogun State.</p></div>
                                
                                <p> <i class="fa fa-phone"> </i> <span>Phone</span> :08023785283</p>
                                <p>  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;: 08033030117 </p>
                                <p> <i class="fa fa-envelope"> </i> <span>Email</span> : <a href="">info@ajibayschools.com.ng</a> </p>
                               
                            </div>
                        </div>    
                                            
                    </div> <!-- **Primary Ends** -->
                   
                   </div>
             
   </section>



<?php foot();?>