<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<?php
echo'<div class="row nav_rule nomargin bd_padding">';
if(check_admin_user()){
	
	display_admin_menu();
	
	echo'<div class="col-sm-8 col-sm-offset-1">
	<div class="col-sm-12 admin_header"><p>Upload   gallery picture </p></div>';

upload_form();
}
echo"</div>
</div>";
foot();
?>