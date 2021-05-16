<?php include_once("function/include.php") ;
     //studentcheck();
      include_once"function/headerTop.php"; 
top();

 ?><?php navigation();
 section1();
 ?>
 <div class="row middlebody">
<div class="col-sm-4 col-sm-offset-4 thumbnail ">
	<div class="col-xs-12 studentloginheader">
	Student Login
	</div>
	                    <form class="form-group" method="post" action="studentloginquery.php">
                            
                          
		                   <div class="col-sm-12 form-group">
		                   	<input type="hidden" name="redirect" value="<?php if(isset($_GET['redirect'])){ echo $_GET['redirect'];} ?>">
		                   <p class="text-danger  text-center">	<?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>
		                  </div>
		                  <div class="col-sm-12 form-group">
			                   <label>Class Reg No</label>
			                   <input class="form-control" type="text" name="reg_no" value="">
		                  </div>
		
                          <div class="col-sm-12 form-group">
			                  <label>PIN</label>
			                  <input class="form-control" type="password" name="pin" value="">
		                  </div>
        
                         <div class="col-sm-6">
			
			                   <br/><input  type="submit" name="submit" value=" Student Login" class="btn btn-danger btn-block">
		                  </div>
                       </form>
                 </div>
             </div>

 <?php
footer2();
?>
