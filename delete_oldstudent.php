<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<?php
if(check_admin_user()){
	echo'<div class="row nav_rule nomargin bd_padding">';
	if(isset($_POST['id'])){
		$id=$_POST['id'];
		if(delete_oldstudent($id)){
			echo'<div class="col-sm-8 col-sm-offset-2 oldstudent"><p> Successfully deleted.</p></div>';
		}else{
			echo"<p class=\"rd\">Can not be deleted.</p>";
		}
	admin_do_url('ajibay.php','Go TO ADMIN');
	}
	}else{
	echo"<p class=\"message\">You are not authorised to view this page.</p>";
}
echo"</div>";
foot();
?>