<?php include_once"function.php";

top(); ?>


<?php echo'<div class="nav_rule nomargin bd_padding" style="padding-top:10%;">';
if(check_admin_user()){
	
	
	display_admin_menu();
	
	echo'<div class="col-sm-7 col-sm-offset-1">
	
	<div class="col-sm-12 admin_header"><p>Add news</p></div>';
	add_news_form();
	echo'</div>';
} echo"</div>";


 foot();
?>