<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<?php
if(check_admin_user()){
echo'<div class="row nav_rule nomargin bd_padding">';
if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['institution']) && isset($_POST['course'])){
	
	$name=cleansql($_POST['name']);
	$phone=cleansql($_POST['phone']);
	$email=cleansql($_POST['email']);
	$institution=cleansql($_POST['institution']);
	$course=cleansql($_POST['course']);
	$id=cleansql($_POST['id']);
}
	
			
			if(update_oldstudent($id,$name,$email,$phone,$institution,$course)){
				echo'<div class="col-sm-8 col-sm-offset-2 oldstudent"><p>update successfull</p></div>';

			}else{
				echo"<p class=\"rd\">update not successsfull now.try again.</p>";
			}
			admin_do_url('ajibay.php','Go TO ADMIN');
			
	}else{
	echo"<p class=\"rd\">You are not authorised to view this page.</p>";
}

			
	echo"</div>";

foot();