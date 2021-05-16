<?php include_once"function.php";

top(); ?>
 
<?php echo'<div class="nav_rule nomargin bd_padding" style="padding-top:10%;">';
if(check_admin_user()){
	
	
	display_admin_menu();
	
	echo'<div class="col-sm-7 col-sm-offset-1">
	
	<div class="col-sm-12 admin_header"><p>Account</p></div>';?>
     <div class="col-xs-10 accountmargin"><a href="viewschoolfee.php" class="btn btn-primary btn-lg  btn-block">View School fee paid</a></div>
     <div class="col-xs-10 accountmargin"><a href="printoutaccount.php" class="btn btn-default btn-lg  btn-block">Print Out Account status</a></div>
      <div class="col-xs-10 accountmargin"><a href="manageaccountofficer.php" class="btn btn-danger btn-lg  btn-block">Manage Account Officer</a></div>
	<?php echo'</div>';
} echo"</div>";
foot();?>

