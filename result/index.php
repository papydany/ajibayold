<?php include_once("function/include.php");
include_once("function/headerTop.php"); 
top();
 ?>
 <style type="text/css">
.nav > li {
    
    
    
}
.nav-tabs > li.active > a{
	color: #C1AA5A;
	font-weight: bold;
}
a {
    color: #fff;
    font-weight: bold;
    }

    .nav-tabs {
    border-bottom: 1px solid #C1AA5A;
    border-radius: 3px;
}

 </style>
<div class="col-sm-12 nopaddling">
	<?php navigation();
	section1();?>

	

	<div class="row middlebody">
            
		<div class="col-sm-10 col-sm-offset-1 mid">
           <div class="col-sm-6">
				<img src="images/student.jpg" alt="school logo" />
		    </div>

		    <div class="col-sm-5 midlogin">
				<ul class="nav nav-tabs col-xs-12 " role="tablist" id="myTab" style="background-color:#C1AA5A;">
					<li role="presentation" class="midlog2" style="width:25%;">Login Here</li>
				  <li role="presentation" class="active" style="width:25%;"><a href="#student" aria-controls="student" role="tab" data-toggle="tab">Student</a></li>
				  <li role="presentation" style="width:25%;"><a href="#teacher" aria-controls="teacher" role="tab" data-toggle="tab">Teacher</a></li>
				  <li role="presentation" style="width:25%;"><a href="#admin" aria-controls="admin" role="tab" data-toggle="tab">Admin</a></li>
				</ul>

               <div class="tab-content">
                   <div class="col-sm-10 col-sm-offset-1 tab-pane active" id="student" style="padding-Top:8%;">
	                    <form class="form-group" method="post" action="studentloginquery.php">
                            
                          
		                   <div class="col-sm-12">
		                   	
			                   <label>Class Reg No</label>
			                   <input class="form-control" type="text" name="reg_no" id="reg_no" value="">
		                  </div>
		
                          <div class="col-sm-12">
			                  <label>PIN</label>
			                  <input class="form-control" type="password" name="pin" id="pin" value="">
		                  </div>
        
                         <div class="col-sm-6">
			
			                   <br/><input  type="submit" name="submit" value=" Student Login" id="submit_student" class="btn btn-danger btn-block">
		                  </div>
                       </form>
                 </div>

                <div class="col-sm-10 col-sm-offset-1 tab-pane" role="tabpanel"  id="teacher" style="padding-Top:8%;">

	                <form class="form-group" method="post" action="teacher/loginteacherQuery.php">
                        

                      
		               <div class="col-sm-12">
			                <label>Username</label>
			                <input class="form-control" type="text" name="username" id="t_username" value="">
		              </div>
		
                     <div class="col-sm-12">
			             <label>Password</label>
			             <input class="form-control" type="password" name="password" id="t_pin" value="">
		              </div>
        
                      <div class="col-sm-6">
			
			             <br/><input  type="submit" name="submit" value="Teacher Login" id="submit_teacher" class="btn btn-danger btn-block">
		             </div>
                  </form>
              </div>

              <div class="col-sm-10 col-sm-offset-1 tab-pane" id="admin" style="padding-Top:8%;">
	               <form class="form-group" method="post" action="cpanel/loginquery.php">
                       

		               
				        <div class="col-sm-12">
					        <label>Username</label>
					        <input class="form-control" type="text" name="username" id="a_username" value="">
				       </div>
				
		               <div class="col-sm-12">
					        <label>Password</label>
					        <input class="form-control" type="password" name="password" id="a_pin" value="">
				       </div>
		        
		                <div class="col-sm-6">
					
					        <br/><input  type="submit" name="submit" value=" Admin Login" id="submit_admin" class="btn btn-danger btn-block">
				       </div>
				   </form>
              </div>
          </div>
		</div>
	</div>
	
</div>
</div>




<?php
footer();
?>




<script type="text/javascript">

$(document).ready(function(){
	$("#submit_student").click(function(){
		if($("#reg_no").val() == ""){
			alert("Enter a value for Class Reg No.");
			return false;
		}
if($("#pin").val() == ""){
			alert("password field can not be empty.");
			return false;
		}
});  // end of click of student submit

$("#submit_teacher").click(function(){
		if($("#t_username").val() == ""){
			alert("username field is empty.");
			return false;
		}
if($("#t_pin").val() == ""){
			alert("password field can not be empty.");
			return false;
		}
});  // end of click of student submit

$("#submit_admin").click(function(){
		if($("#a_username").val() == ""){
			alert("username field is empty.");
			return false;
		}
if($("#a_pin").val() == ""){
			alert("password field can not be empty.");
			return false;
		}
});  // end of click of student submit


});  // end of ready

</script>