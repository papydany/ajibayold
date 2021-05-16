<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<?php
      
	  
if(isset($_SESSION['admin_user']))
	  $old=$_SESSION['admin_user'];
	  unset($_SESSION['admin_user']);
	  $result=session_destroy();
	

	
echo'<div class="row nav_rule nomargin bd_padding">
<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">';
if(!empty($old)){
		 if($result){
			display_admin_login();
			echo"</div></div>";
			foot();
			exit();
		 }else{
			 echo"<p class=\"message\"> you could not be logged out.</p>";
		 }
	 }else{
		 echo"<p class=\"message\">you did not log in before.</p>";
	display_admin_login();
	 }
	 echo"</div></div>";


foot();
?>