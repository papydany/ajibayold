<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<?php
echo'<div class="row nav_rule nomargin bd_padding">';

	
if(isset($_SESSION['admin_user'])){
	
	
	display_admin_menu();
	
 echo'<div class="col-sm-8 col-sm-offset-1">
    <div class="col-sm-12 admin_header"><p>INSERT MANAGEMENT TEAM INFORMATIONS</p></div>';
   managementTeamForm();

}else{
	echo"<p class=\"rd\"> You are not authorized to view this page</p>";
}
echo"</div></div>";
foot();
?>