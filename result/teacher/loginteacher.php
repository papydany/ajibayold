<?php  include_once"../function/include.php";  
       include_once"teacherfunction.php";
include_once"../function/headerTop.php"; 
//if(isset($_SESSION['teacherlogin'])){  header('location:index.php');}

       
       top();
       linkh();
       navigation2();
       section2();  ?>



 <div class="row middlebody">
<div class="col-sm-4 col-sm-offset-4 thumbnail ">
	<div class="col-xs-12 studentloginheader">
	Teacher Login
	</div>

	<form class="form-group" method="post" action="loginteacherQuery.php">
		<div class="col-sm-12 form-group">
<input type="hidden" name="redirect" value="<?php if(isset($_GET['redirect'])) {echo $_GET['redirect']; }?>">

 <p class="text-danger text-center"> <?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?></p>
</div>
		<div class="col-sm-12 form-group">
			<label>Username</label>
			<input class="form-control" type="text" name="username" value="">
		</div>
		
        <div class="col-sm-12 form-group">
			<label>Password</label>
			<input class="form-control" type="password" name="password" value="">
		</div>
        
        <div class="col-sm-6">
			
			<input  type="submit" name="submit" value="Login" class="btn btn-danger btn-block">
		</div>
	</div>


	</form>





</div>





       <?php
       footer2();
       ?>