<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
 
<?php if(isset($_POST['username']) && isset($_POST['password'])){
	
	$username=cleansql($_POST['username']);
	$password=cleansql($_POST['password']);
	//$password=sha1($password);
	
	if(login ($username,$password)){
		$_SESSION['admin_user']=$username;
	}else{
		echo"<div class=\"row nav_rule nomargin bd_padding\">";
		echo'<div class="col-sm-5 col-sm-offset-3 col-md-3 col-md-offset-4 loginPage">';
		echo"<p class=\"message\">logged In  details is incorrect.</p>";
		display_admin_login();
		echo"</div></div>";
		  foot();
		exit();
	}
}
echo'<div class="row nav_rule nomargin bd_padding ">';

  
if(check_admin_user()){
	echo' <div class="col-xs-12 col-sm-8 col-sm-offset-4 oldstudent"> Welcome Admin</div>';
	display_admin_menu();
}else{
	echo'<p class="message">You are not authorized to enter the admistration area.</p>';
}
echo"</div>";


  foot();
?>