<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<?php

echo'<div class="row nav_rule nomargin bd_padding">';

	
if(isset($_SESSION['admin_user'])){
	
	
	display_admin_menu();
	
	
	echo'<div class="col-sm-7 col-sm-offset-1">';
	$position=cleansql($_POST['position']);
	if($position){
		if(insert_position($position)){
			echo'<div class="col-sm-12 oldstudent"><p> Congrat.&nbsp;'.$position.'&nbsp;position has been created</p></div>';
		}else{
			echo'<div class="col-sm-12 oldstudent"><p>&nbsp;".$position."&nbsp;position can not be added now.</p></div>';}
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