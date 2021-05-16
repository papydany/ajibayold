<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<?php


if(check_admin_user()){
	
	echo'<div class="row nav_rule nomargin bd_padding">';

	display_admin_menu();
	
	echo'<div class="col-sm-7 col-sm-offset-1">
	<div class="col-sm-12 admin_header"><p>Insert Old Student Infomation</p></div>
	<p>compulsary&nbsp;<span class="rd">*</span></p>';
	
	display_oldstudent_info();
	
}else{
	echo"<p>You are not allowed to view these page.</p>";
}
echo"</div>
</div>";

foot();

?>