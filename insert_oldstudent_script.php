<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<?php
echo'<div class="row nav_rule nomargin bd_padding">';
if(check_admin_user()){
	
	
	display_admin_menu();

	
	
	
	echo"<div class=col-sm-6 col-sm-offset-1>";
	$year=cleansql($_POST['year']);
	if($year){
		if(insert_year($year)){
			echo'<div class="col-sm-12 oldstudent"><p>Year&nbsp;'.$year.'&nbsp;sets has been added to database</p></div>';
		}else{
			echo'<div class="col-sm-12 oldstudent"><p>year&nbsp;'.$year.'&nbsp;sets can not be added now.</p></div>';}
	}else{
		echo'<div class="col-sm-12 oldstudent"><p>You have not filled the form correctly.</p></div>';
	}
	
}else{
	echo"<p>You are not authorised to view these page.</p>";
}

echo"</div>
</div>";




foot();
?>