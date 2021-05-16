<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<?php
if(check_admin_user()){
	echo'<div class="row nav_rule nomargin bd_padding">';
	display_admin_menu();
	
	echo'<div class="col-sm-8 col-sm-offset-1">
	<div class="col-sm-12 admin_header"><p>Change Password Form</p></div>';
	
	display_change_password();
	
	
}else{
	echo"<p class=\"message\">You are not allow to view these page.</p>";
}
echo"</div></div>";


foot();
?>